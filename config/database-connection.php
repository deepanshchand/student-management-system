<?php

declare(strict_types=1);

require_once __DIR__ . '/app.php';

/**
 * Student Management System
 * Database Connection
 *
 * Local:   config/local.php
 * Hosting: config/hosting.php
 */

// Detect whether the application is running locally.
$hostName = strtolower(
    (string) ($_SERVER['HTTP_HOST'] ?? 'localhost')
);

$isLocal = in_array(
    $hostName,
    ['localhost', '127.0.0.1', 'localhost:80', 'localhost:8080'],
    true
);

// Load the appropriate database configuration.
$configFile = __DIR__ . (
    $isLocal ? '/local.php' : '/hosting.php'
);

if (!is_file($configFile)) {
    error_log('Database configuration file is missing.');

    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}

$config = require $configFile;

if (!is_array($config)) {
    error_log('Database configuration must return an array.');

    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}

// Read configuration, allowing environment variables to override it.
$host = (string) (
    getenv('DB_HOST') ?: ($config['host'] ?? '')
);

$username = (string) (
    getenv('DB_USERNAME') ?: ($config['username'] ?? '')
);

$password = (string) (
    getenv('DB_PASSWORD') !== false
    ? getenv('DB_PASSWORD')
    : ($config['password'] ?? '')
);

$database = (string) (
    getenv('DB_DATABASE') ?: ($config['database'] ?? '')
);

// Verify required connection settings.
if (
    $host === ''
    || $username === ''
    || $database === ''
) {
    error_log('Database configuration is incomplete.');

    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}

// Check whether MySQLi is available.
if (!extension_loaded('mysqli')) {
    error_log('The MySQLi PHP extension is unavailable.');

    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}

// Enable strict MySQLi error reporting.
mysqli_report(
    MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT
);

// Establish the database connection.
try {
    $conn = new mysqli(
        $host,
        $username,
        $password,
        $database
    );

    $conn->set_charset('utf8mb4');
} catch (Throwable $exception) {
    // Keep database credentials and technical details out of public output.
    error_log(
        'Student Management System database connection failed: '
            . $exception->getMessage()
    );

    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}