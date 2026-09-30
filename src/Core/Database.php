<?php

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

/**
 * Class Database
 * Singleton PDO Database Manager (Single Responsibility Principle)
 */
class Database
{
    /**
     * @var PDO|null Database connection instance
     */
    private static ?PDO $instance = null;

    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct()
    {
    }

    /**
     * Get active PDO database connection
     *
     * @return PDO
     * @throws RuntimeException
     */
    public static function getConnection(): PDO
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        $driver = Config::get('db_driver', 'sqlite');

        try {
            if ($driver === 'mysql') {
                $host = Config::get('db_host', 'localhost');
                $name = Config::get('db_name', 'almobtaker_db');
                $user = Config::get('db_user', 'root');
                $pass = Config::get('db_pass', '');

                $dsn = "mysql:host={$host};dbname={$name};charset=utf8mb4";
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
                ]);
            } else {
                $sqliteFile = Config::get('sqlite_file');
                $sqliteDir = dirname($sqliteFile);
                
                if (!is_dir($sqliteDir)) {
                    @mkdir($sqliteDir, 0755, true);
                }

                self::$instance = new PDO("sqlite:" . $sqliteFile);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$instance->exec("PRAGMA foreign_keys = ON;");
            }

            // Auto-initialize schema & initial seeds
            Seeder::ensureInitialized(self::$instance);

            return self::$instance;
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            throw new RuntimeException("تعذر الاتصال بقاعدة البيانات: " . $e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    /**
     * Reset connection instance (useful for testing or switching DBs)
     */
    public static function reset(): void
    {
        self::$instance = null;
    }
}
