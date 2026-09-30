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
