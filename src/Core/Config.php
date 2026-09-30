<?php

namespace App\Core;

/**
 * Class Config
 * Centralized Configuration Manager (Single Responsibility Principle)
 */
class Config
{
    /**
     * @var array Configuration registry
     */
    private static array $settings = [];

    /**
     * Initialize default configurations
     */
    public static function init(): void
    {
        if (!empty(self::$settings)) {
            return;
        }

        self::$settings = [
            'db_driver'     => defined('DB_DRIVER') ? DB_DRIVER : 'sqlite',
            'db_host'       => defined('DB_HOST') ? DB_HOST : 'localhost',
            'db_name'       => defined('DB_NAME') ? DB_NAME : 'almobtaker_db',
            'db_user'       => defined('DB_USER') ? DB_USER : 'root',
            'db_pass'       => defined('DB_PASS') ? DB_PASS : '',
            'sqlite_file'   => defined('SQLITE_FILE') ? SQLITE_FILE : dirname(__DIR__, 2) . '/database.sqlite',
            'app_name'      => 'المبتكر العربي للبرمجيات',
            'app_url'       => 'https://mobtakeraraby.com',
            'session_ttl'   => 86400, // 24 hours
            'login_max_try' => 5,     // Max failed login attempts before cooldown
            'login_decay'   => 900,   // Cooldown in seconds (15 mins)
        ];
    }

    /**
     * Get a configuration value
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        self::init();
        return self::$settings[$key] ?? $default;
    }

    /**
     * Set a configuration value at runtime
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, $value): void
    {
        self::init();
        self::$settings[$key] = $value;
    }
}
