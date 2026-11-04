<?php

declare(strict_types=1);

/**
 * Frontend-only application helpers.
 */

function e(mixed $value): string
{
    return htmlspecialchars(
        (string) ($value ?? ''),
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

function app_url(string $path = ''): string
{
    $baseUrl = rtrim(
        (string) (getenv('APP_BASE_URL') ?: '/student-management-system'),
        '/'
    );

    $path = ltrim($path, '/');

    return $path === ''
        ? $baseUrl . '/'
        : $baseUrl . '/' . $path;
}