<?php

declare(strict_types=1);

require_once __DIR__ . '/app.php';

$localConfig = [];
$localConfigPath = __DIR__ . '/local.php';

if (is_file($localConfigPath)) {
    $loadedConfig = require $localConfigPath;
    $localConfig = is_array($loadedConfig) ? $loadedConfig : [];
}

function database_config(string $key, string $environmentName, string $default = ''): string
{
    $environmentValue = getenv($environmentName);
    if ($environmentValue !== false && $environmentValue !== '') {
        return $environmentValue;
    }

    global $localConfig;

    return isset($localConfig[$key]) ? (string) $localConfig[$key] : $default;
}

$host = database_config('host', 'DB_HOST', 'localhost');
$username = database_config('username', 'DB_USERNAME', 'root');
$password = database_config('password', 'DB_PASSWORD');
$database = database_config('database', 'DB_DATABASE', 'student_management_system');

if (!extension_loaded('mysqli')) {
    error_log('Student Management System database connection failed: mysqli extension is unavailable.');
    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $username, $password, $database);
    $conn->set_charset('utf8mb4');
} catch (Throwable $exception) {
    error_log('Student Management System database connection failed: ' . $exception->getMessage());
    http_response_code(503);
    exit('The service is temporarily unavailable. Please try again later.');
}
