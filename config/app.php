<?php

declare(strict_types=1);

/**
 * Common application helpers.
 */

// Initialize the session before any page output.
if (PHP_SAPI !== 'cli' && session_status() === PHP_SESSION_NONE) {
    if (headers_sent($file, $line)) {
        error_log(
            "Session initialization failed: output started in {$file} on line {$line}"
        );
    } else {
        session_name('student_management_session');

        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'httponly' => true,
            'secure' => !empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off',
            'samesite' => 'Lax',
        ]);

        session_start();
    }
}

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

function redirect(string $path): never
{
    header('Location: ' . app_url($path));
    exit;
}

function csrf_token(): string
{
    if (
        empty($_SESSION['csrf_token'])
        || !is_string($_SESSION['csrf_token'])
    ) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="'
        . e(csrf_token())
        . '">';
}

function verify_csrf_token(): bool
{
    $submittedToken = $_POST['csrf_token'] ?? '';

    return is_string($submittedToken)
        && isset($_SESSION['csrf_token'])
        && is_string($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $submittedToken);
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function get_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    return is_array($flash) ? $flash : null;
}

function is_logged_in(): bool
{
    return isset($_SESSION['user_id'])
        && filter_var(
            $_SESSION['user_id'],
            FILTER_VALIDATE_INT
        ) !== false;
}

function current_user_name(): string
{
    return is_logged_in()
        ? (string) ($_SESSION['user_name'] ?? 'Administrator')
        : '';
}

function require_login(): void
{
    if (!is_logged_in()) {
        set_flash(
            'error',
            'Please log in to access the dashboard.'
        );

        redirect('home/navbar/login.php');
    }
}