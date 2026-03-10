<?php
declare(strict_types=1);

require_once __DIR__ . '/jwt.php';

function admin_cookie_secure_flag(): bool
{
    return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
}

function admin_set_admin_jwt_cookie(string $jwt, int $expiresAt): void
{
    setcookie('admin_jwt', $jwt, [
        'expires' => $expiresAt,
        'path' => cookie_base_path(),
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => admin_cookie_secure_flag(),
    ]);
}

function admin_clear_admin_jwt_cookie(): void
{
    setcookie('admin_jwt', '', [
        'expires' => time() - 3600,
        'path' => cookie_base_path(),
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => admin_cookie_secure_flag(),
    ]);
}

function admin_forget_auth(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();

    admin_clear_admin_jwt_cookie();
}

