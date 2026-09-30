<?php
/**
 * Application Bootstrap & Class Autoloader
 * Follows PSR-4 Autoloading standards and SOLID architecture
 */

// 1. PSR-4 Class Autoloader
spl_autoload_register(function (string $class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

// 2. Initialize Security & Session
\App\Core\Security::startSession();
\App\Core\Security::sendSecurityHeaders();

// 3. Initialize Configurations
\App\Core\Config::init();
