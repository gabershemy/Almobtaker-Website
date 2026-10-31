<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeployWebhookController extends Controller
{
    /**
     * Handle incoming GitHub auto-deploy webhook request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        // 1. Enforce POST Method (Strict OWASP standard)
        if (!$request->isMethod('POST')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Method Not Allowed: Webhook strictly accepts POST requests only.'
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        }

        // 2. Fetch secret strictly from configuration bound to .env
        $configuredSecret = config('services.deploy.secret') ?: env('DEPLOY_SECRET');

        if (empty($configuredSecret)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server Configuration Error: DEPLOY_SECRET is not configured in .env'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // 3. Authenticate request using HMAC-SHA256 signature or secret token
        if (!$this->isAuthorized($request, (string) $configuredSecret)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized: Invalid GitHub webhook signature or secret.'
            ], Response::HTTP_FORBIDDEN);
        }

        // 4. Handle GitHub Ping Event (initial webhook configuration check)
        if ($request->header('X-GitHub-Event') === 'ping') {
            return response()->json([
                'status' => 'success',
                'message' => 'GitHub ping event received successfully. Webhook is active and healthy.'
            ], Response::HTTP_OK);
        }

        // 5. Branch Filtering: Only deploy on pushes to the main branch
        $ref = $request->input('ref');
        if ($ref && $ref !== 'refs/heads/main') {
            return response()->json([
                'status' => 'ignored',
                'message' => "Push event ignored: Branch '{$ref}' is not 'refs/heads/main'."
            ], Response::HTTP_OK);
        }

        // 6. Concurrency Protection: Non-blocking atomic file lock
        $lockFile = storage_path('framework/deploy.lock');
        $lockHandle = @fopen($lockFile, 'w+');

        if (!$lockHandle || !flock($lockHandle, LOCK_EX | LOCK_NB)) {
            return response()->json([
                'status' => 'busy',
                'message' => 'Another deployment is currently running. Please try again shortly.'
            ], Response::HTTP_TOO_MANY_REQUESTS);
        }

        // 7. Execute Deployment Commands (< 3 seconds execution)
        $baseDir = base_path();
        $startTime = microtime(true);

        $commands = [
            "cd \"{$baseDir}\"",
            "git pull origin main 2>&1",
            "php artisan migrate --force 2>&1",
            "php artisan optimize:clear 2>&1"
        ];

        $commandStr = implode(' && ', $commands);
        $output = shell_exec($commandStr);

        $executionTimeMs = round((microtime(true) - $startTime) * 1000, 2);

        // Release Concurrency Lock
        flock($lockHandle, LOCK_UN);
        fclose($lockHandle);

        return response()->json([
            'status' => 'success',
            'message' => 'Deployment executed successfully',
            'project_path' => $baseDir,
            'output' => $output,
            'duration_ms' => $executionTimeMs,
            'timestamp' => now()->toIso8601String(),
        ], Response::HTTP_OK);
    }

    /**
     * Verify whether the incoming request has a valid GitHub signature or secret token.
     *
     * @param  Request  $request
     * @param  string   $secret
     * @return bool
     */
    protected function isAuthorized(Request $request, string $secret): bool
    {
        $rawPayload = $request->getContent();

        // Check 1: GitHub HMAC-SHA256 signature (X-Hub-Signature-256 header)
        $hubSignature = $request->header('X-Hub-Signature-256') ?: $request->header('X-Hub-Signature');
        if ($hubSignature && !empty($rawPayload)) {
            $expectedSignature = 'sha256=' . hash_hmac('sha256', $rawPayload, $secret);
            if (hash_equals($expectedSignature, $hubSignature)) {
                return true;
            }
        }

        // Check 2: Custom Header (X-Deploy-Secret)
        $headerSecret = $request->header('X-Deploy-Secret');
        if ($headerSecret && hash_equals($secret, (string) $headerSecret)) {
            return true;
        }

        // Check 3: Body or Query Parameter Secret (Timing-safe comparison)
        $providedSecret = $request->input('secret') ?: $request->query('secret');
        if ($providedSecret && hash_equals($secret, (string) $providedSecret)) {
            return true;
        }

        return false;
    }
}
