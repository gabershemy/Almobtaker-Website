<?php

namespace App\Core;

use App\Contracts\AuthInterface;
use PDO;

/**
 * Class Auth
 * Admin Authentication & Authorization Manager (Single Responsibility Principle)
 */
class Auth implements AuthInterface
{
    /**
     * Check if admin is currently authenticated
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        Security::startSession();
        return !empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    /**
     * Authenticate admin user
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        Security::startSession();

        $maxAttempts = (int)Config::get('login_max_try', 5);
        $decaySec = (int)Config::get('login_decay', 900);

        if (!Security::checkRateLimit('admin_login', $maxAttempts, $decaySec)) {
            return false;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        $hash = $admin['password_hash'] ?? $admin['password'] ?? '';

        if ($admin && !empty($hash) && password_verify($password, $hash)) {
            // Check if user is active
            if (isset($admin['status']) && (int)$admin['status'] === 0) {
                return false;
            }

            // Prevent Session Fixation attack
            session_regenerate_id(true);

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id']        = $admin['id'];
            $_SESSION['admin_username']  = $admin['username'];
            $_SESSION['admin_name']      = $admin['full_name'] ?? 'إدارة المبتكر العربي';
            $_SESSION['admin_email']     = $admin['email'] ?? 'gabershemy@gmail.com';
            $_SESSION['admin_role']      = $admin['role'] ?? 'super_admin';
            $_SESSION['admin_permissions']= $admin['permissions'] ?? '["all"]';
            $_SESSION['admin_login_at']  = time();

            // Refresh CSRF token for the new privileged session
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            // Reset rate limit on success
            Security::resetRateLimit('admin_login');
            return true;
        }

        return false;
    }

    /**
     * Destroy admin session and logout
     *
     * @return void
     */
    public function logout(): void
    {
        Security::startSession();

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }

    /**
     * Get logged-in admin user info
     *
     * @return array
     */
    public function getUser(): array
    {
        Security::startSession();

        return [
            'id'          => $_SESSION['admin_id'] ?? 0,
            'username'    => $_SESSION['admin_username'] ?? 'admin',
            'full_name'   => $_SESSION['admin_name'] ?? 'إدارة المبتكر العربي',
            'email'       => $_SESSION['admin_email'] ?? 'gabershemy@gmail.com',
            'role'        => $_SESSION['admin_role'] ?? 'super_admin',
            'permissions' => $_SESSION['admin_permissions'] ?? '["all"]'
        ];
    }

    /**
     * Check if current user has permission for a specific module
     *
     * @param string $module Module key (e.g., 'projects', 'services', 'messages', 'settings', 'users')
     * @return bool
     */
    public function hasPermission(string $module): bool
    {
        $user = $this->getUser();
        if (($user['role'] ?? '') === 'super_admin') {
            return true;
        }

        $perms = json_decode($user['permissions'] ?? '[]', true);
        if (!is_array($perms)) {
            return false;
        }

        return in_array('all', $perms) || in_array($module, $perms);
    }

    /**
     * Enforce authentication, redirecting to login if not logged in
     *
     * @param string $redirectUrl
     * @return void
     */
    public function requireAuth(string $redirectUrl = 'index.php'): void
    {
        if (!$this->isAuthenticated()) {
            header("Location: {$redirectUrl}");
            exit;
        }
    }
}
