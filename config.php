<?php
/**
 * Configuration & Backward Compatibility Bridge
 * Connects legacy helper calls directly to the new SOLID & OOP architecture
 */

// 1. Database Configuration Constants
if (!defined('DB_DRIVER')) {
    define('DB_DRIVER', 'sqlite'); // 'mysql' أو 'sqlite'
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'almobtaker_db');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}
if (!defined('SQLITE_FILE')) {
    define('SQLITE_FILE', __DIR__ . '/database.sqlite');
}

// 2. Load Bootstrap and Autoloader
require_once __DIR__ . '/bootstrap.php';

// 3. Backward Compatibility Helper Functions (Delegating to Repositories & Core)

/**
 * Get active PDO connection
 *
 * @return PDO
 */
function getDB(): PDO {
    return \App\Core\Database::getConnection();
}

/**
 * Get a specific setting
 *
 * @param string $key
 * @param string $default
 * @return string
 */
function getSetting(string $key, string $default = ''): string {
    static $settingRepo = null;
    if ($settingRepo === null) {
        $settingRepo = new \App\Repositories\SettingRepository();
    }
    return $settingRepo->get($key, $default);
}

/**
 * Get all settings as key-value map
 *
 * @return array
 */
function getAllSettings(): array {
    static $settingRepo = null;
    if ($settingRepo === null) {
        $settingRepo = new \App\Repositories\SettingRepository();
    }
    return $settingRepo->getAllAsMap();
}

/**
 * Get all projects
 *
 * @return array
 */
function getAllProjects(): array {
    static $projectRepo = null;
    if ($projectRepo === null) {
        $projectRepo = new \App\Repositories\ProjectRepository();
    }
    return $projectRepo->getAll();
}

/**
 * Get all services
 *
 * @return array
 */
function getAllServices(): array {
    static $serviceRepo = null;
    if ($serviceRepo === null) {
        $serviceRepo = new \App\Repositories\ServiceRepository();
    }
    return $serviceRepo->getAll();
}

/**
 * Get all team members
 *
 * @return array
 */
function getAllTeam(): array {
    static $teamRepo = null;
    if ($teamRepo === null) {
        $teamRepo = new \App\Repositories\TeamRepository();
    }
    return $teamRepo->getAll();
}

/**
 * Get all FAQs
 *
 * @return array
 */
function getAllFaqs(): array {
    static $faqRepo = null;
    if ($faqRepo === null) {
        $faqRepo = new \App\Repositories\FaqRepository();
    }
    return $faqRepo->getAll();
}

/**
 * Get all gallery screenshots
 *
 * @return array
 */
function getAllGallery(): array {
    static $galleryRepo = null;
    if ($galleryRepo === null) {
        $galleryRepo = new \App\Repositories\GalleryRepository();
    }
    return $galleryRepo->getAll();
}

/**
 * Get CSRF Token
 *
 * @return string
 */
function getCsrfToken(): string {
    return \App\Core\Security::getCsrfToken();
}

/**
 * Verify CSRF Token
 *
 * @param string|null $token
 * @return bool
 */
function verifyCsrfToken(?string $token): bool {
    return \App\Core\Security::verifyCsrfToken($token);
}
