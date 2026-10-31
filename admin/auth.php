<?php
/**
 * Admin Authentication Bridge
 * Delegates authentication logic to App\Core\Auth
 */

require_once __DIR__ . '/../bootstrap.php';

function getAuthService(): \App\Core\Auth {
    static $auth = null;
    if ($auth === null) {
        $auth = new \App\Core\Auth();
    }
    return $auth;
}

function requireAdminAuth(string $redirectUrl = 'index.php'): void {
    getAuthService()->requireAuth($redirectUrl);
}

function getLoggedInAdmin(): array {
    return getAuthService()->getUser();
}

function hasAdminPermission(string $module): bool {
    return getAuthService()->hasPermission($module);
}

function refreshAdminSession(int $adminId): void {
    $pdo = getDB();
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ? LIMIT 1");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch();
    if ($admin) {
        $_SESSION['admin_username']   = $admin['username'];
        $_SESSION['admin_name']       = $admin['full_name'] ?? 'إدارة المبتكر العربي';
        $_SESSION['admin_email']      = $admin['email'] ?? 'gabershemy@gmail.com';
        $_SESSION['admin_role']       = $admin['role'] ?? 'super_admin';
        $_SESSION['admin_permissions'] = $admin['permissions'] ?? '["all"]';
    }
}
