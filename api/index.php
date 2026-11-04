<?php

declare(strict_types=1);

$root = realpath(dirname(__DIR__));
$homeRoot = realpath($root . DIRECTORY_SEPARATOR . 'home');

$path = rawurldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/'
);

// Support existing XAMPP project URL prefix
$basePrefix = '/student-management-system';

if (
    $path === $basePrefix ||
    str_starts_with($path, $basePrefix . '/')
) {
    $path = substr($path, strlen($basePrefix));
}

if ($path === '') {
    $path = '/';
}

// Homepage
if ($path === '/') {
    header('Location: /home/home.php');
    exit;
}

// Disable all form submissions and backend operations
if (
    $_SERVER['REQUEST_METHOD'] !== 'GET' &&
    $_SERVER['REQUEST_METHOD'] !== 'HEAD'
) {
    http_response_code(405);
    exit('Backend operations are disabled.');
}

// Resolve requested file safely
$target = realpath(
    $root . DIRECTORY_SEPARATOR . ltrim($path, '/')
);

// Allow files only inside home directory
if (
    $target === false ||
    !str_starts_with($target, $homeRoot . DIRECTORY_SEPARATOR) ||
    !is_file($target)
) {
    http_response_code(404);
    exit('Page not found');
}

$extension = strtolower(pathinfo($target, PATHINFO_EXTENSION));

// Static frontend assets
$mimeTypes = [
    'css'   => 'text/css',
    'js'    => 'application/javascript',
    'png'   => 'image/png',
    'jpg'   => 'image/jpeg',
    'jpeg'  => 'image/jpeg',
    'webp'  => 'image/webp',
    'svg'   => 'image/svg+xml',
    'ico'   => 'image/x-icon',
    'woff'  => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf'   => 'font/ttf',
    'otf'   => 'font/otf'
];

if (isset($mimeTypes[$extension])) {
    header('Content-Type: ' . $mimeTypes[$extension]);
    readfile($target);
    exit;
}

// Only execute PHP files inside home
if ($extension !== 'php') {
    http_response_code(404);
    exit('File type not allowed');
}

// Never execute backend action handlers
$blockedFiles = [
    'delete-student.php',
    'logout.php'
];

if (in_array(basename($target), $blockedFiles, true)) {
    http_response_code(403);
    exit('This operation is disabled.');
}

require $target;