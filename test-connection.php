<?php

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/config/database-connection.php';

echo "Database connected successfully." . PHP_EOL;

?>
