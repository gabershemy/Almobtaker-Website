<?php

namespace App\Contracts;

/**
 * Interface AuthInterface
 * Authentication and authorization contract
 */
interface AuthInterface
{
    /**
     * Check if current user is authenticated as admin
     *
     * @return bool
     */
    public function isAuthenticated(): bool;

    /**
     * Authenticate admin by username and password
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login(string $username, string $password): bool;

    /**
     * Destroy current session and logout
     *
     * @return void
     */
    public function logout(): void;

    /**
     * Get details of currently logged in admin
     *
     * @return array
     */
    public function getUser(): array;

    /**
     * Enforce authentication, redirecting to login page if unauthorized
     *
     * @param string $redirectUrl
     * @return void
     */
    public function requireAuth(string $redirectUrl = 'index.php'): void;
}
