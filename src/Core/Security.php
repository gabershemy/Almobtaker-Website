<?php

namespace App\Core;

/**
 * Class Security
 * Enterprise Security Manager (CSRF, XSS, Rate Limiting, Headers, Session Hardening)
 */
class Security
{
    /**
     * Start and harden PHP session with secure cookie flags
     */
    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        $isHttps = (
            (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
            (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ||
            (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
        );

        // Security session parameters
        ini_set('session.use_only_cookies', '1');
        ini_set('session.use_strict_mode', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.cookie_samesite', 'Lax');

        if ($isHttps) {
            ini_set('session.cookie_secure', '1');
        }

        session_start();
    }

    /**
     * Send Enterprise Security HTTP Headers
     */
    public static function sendSecurityHeaders(): void
    {
        if (headers_sent()) {
            return;
        }

        header("X-Content-Type-Options: nosniff");
        header("X-Frame-Options: SAMEORIGIN");
        header("X-XSS-Protection: 1; mode=block");
        header("Referrer-Policy: strict-origin-when-cross-origin");
        header("Permissions-Policy: geolocation=(), camera=(), microphone=()");
    }

    /**
     * Get or generate a secure CSRF token
     *
     * @return string
     */
    public static function getCsrfToken(): string
    {
        self::startSession();

        if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    /**
     * Verify CSRF token using timing-safe comparison
     *
     * @param string|null $token
     * @return bool
     */
    public static function verifyCsrfToken(?string $token): bool
    {
        self::startSession();

        if (empty($token) || empty($_SESSION['csrf_token'])) {
            return false;
        }

        return hash_equals($_SESSION['csrf_token'], $token);
    }

    /**
     * Sanitize plain string for safe output / storage (XSS protection)
     *
     * @param string|null $input
     * @return string
     */
    public static function sanitizeString(?string $input): string
    {
        if ($input === null) {
            return '';
        }
        return htmlspecialchars(trim($input), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Sanitize and validate email
     *
     * @param string|null $email
     * @return string
     */
    public static function sanitizeEmail(?string $email): string
    {
        if ($email === null) {
            return '';
        }
        $clean = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        return filter_var($clean, FILTER_VALIDATE_EMAIL) ? $clean : '';
    }

    /**
     * Sanitize phone number
     *
     * @param string|null $phone
     * @return string
     */
    public static function sanitizePhone(?string $phone): string
    {
        if ($phone === null) {
            return '';
        }
        return preg_replace('/[^\d\+\-\s\(\)]/', '', trim($phone));
    }

    /**
     * Rate Limiting check based on action key and cooldown duration
     *
     * @param string $actionKey Unique action identifier (e.g., 'contact_submit', 'admin_login')
     * @param int $maxAttempts Max allowed attempts
     * @param int $decaySeconds Window in seconds
     * @return bool True if within limits, False if rate limited
     */
    public static function checkRateLimit(string $actionKey, int $maxAttempts = 5, int $decaySeconds = 60): bool
    {
        self::startSession();

        $now = time();
        $key = 'rate_limit_' . $actionKey;

        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = [
                'attempts'    => 1,
                'first_try'   => $now,
                'locked_until'=> 0
            ];
            return true;
        }

        $record = &$_SESSION[$key];

        // Check if currently locked
        if ($record['locked_until'] > $now) {
            return false;
        }

        // Reset if decay window passed
        if (($now - $record['first_try']) > $decaySeconds) {
            $record = [
                'attempts'    => 1,
                'first_try'   => $now,
                'locked_until'=> 0
            ];
            return true;
        }

        $record['attempts']++;

        if ($record['attempts'] > $maxAttempts) {
            $record['locked_until'] = $now + $decaySeconds;
            return false;
        }

        return true;
    }

    /**
     * Reset rate limit for a specific action (e.g. after successful login)
     *
     * @param string $actionKey
     * @return void
     */
    public static function resetRateLimit(string $actionKey): void
    {
        self::startSession();
        unset($_SESSION['rate_limit_' . $actionKey]);
    }
}
