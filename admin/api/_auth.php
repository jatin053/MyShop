<?php
declare(strict_types=1);

require_once __DIR__ . '/_helpers.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/jwt.php';
require_once __DIR__ . '/../includes/roles.php';

function is_mysql_duplicate_key(Throwable $e): bool
{
    if (!($e instanceof PDOException)) {
        return false;
    }
    $code = $e->errorInfo[1] ?? null; // driver-specific error code (e.g. 1062)
    return (int)$code === 1062;
}

function token_auth_user(PDO $pdo, string $token): ?array
{
    $hash = hash('sha256', $token);
    $stmt = $pdo->prepare(
        'SELECT t.`user_id`, t.`role`, t.`expires_at`, t.`revoked_at`,
                r.`Email` AS `email`, r.`FullName` AS `full_name`
         FROM `auth_tokens` t
         JOIN `register` r ON r.`id` = t.`user_id`
         WHERE t.`token_hash` = ?
         LIMIT 1'
    );
    $stmt->execute([$hash]);
    $row = $stmt->fetch();
    if (!$row) {
        return null;
    }

    if (!empty($row['revoked_at'])) {
        return null;
    }

    if (!empty($row['expires_at'])) {
        $expires = strtotime((string)$row['expires_at'] . ' UTC');
        if ($expires !== false && time() >= $expires) {
            return null;
        }
    }

    return [
        'id' => (int)$row['user_id'],
        'email' => (string)$row['email'],
        'full_name' => (string)$row['full_name'],
        'role' => ucfirst(strtolower((string)$row['role'])),
        'auth_via' => 'token',
    ];
}

function jwt_cookie_auth_user(): ?array
{
    $jwt = $_COOKIE['admin_jwt'] ?? '';
    if (!is_string($jwt) || $jwt === '') {
        return null;
    }

    $claims = jwt_verify_hs256($jwt, jwt_secret());
    if (!is_array($claims)) {
        return null;
    }

    $role = ucfirst(strtolower((string)($claims['role'] ?? '')));
    $userId = (int)($claims['sub'] ?? 0);
    if ($userId <= 0 || $role === '') {
        return null;
    }

    return [
        'id' => $userId,
        'email' => (string)($claims['email'] ?? ''),
        'full_name' => (string)($claims['name'] ?? ''),
        'role' => $role,
        'auth_via' => 'cookie_jwt',
    ];
}

function api_current_user(PDO $pdo): ?array
{
    $token = bearer_token();
    if (is_string($token) && $token !== '') {
        $u = token_auth_user($pdo, $token);
        if ($u) {
            try {
                $primaryAdminId = enforce_single_admin($pdo);
                $u['role'] = ($primaryAdminId !== null && (int)$u['id'] === (int)$primaryAdminId) ? 'Admin' : 'User';
            } catch (Throwable $ignored) {
                $u['role'] = 'User';
            }
            return $u;
        }
    }

    $u = jwt_cookie_auth_user();
    if (!$u) {
        return null;
    }
    try {
        $primaryAdminId = enforce_single_admin($pdo);
        $u['role'] = ($primaryAdminId !== null && (int)$u['id'] === (int)$primaryAdminId) ? 'Admin' : 'User';
    } catch (Throwable $ignored) {
        $u['role'] = 'User';
    }
    return $u;
}

function require_auth(PDO $pdo): array
{
    $user = api_current_user($pdo);
    if (!$user) {
        respond(401, ['ok' => false, 'error' => 'Unauthorized']);
    }
    return $user;
}

function require_admin(PDO $pdo): array
{
    $user = require_auth($pdo);
    if (($user['role'] ?? '') !== 'Admin') {
        respond(403, ['ok' => false, 'error' => 'Forbidden']);
    }

    $primaryAdminId = enforce_single_admin($pdo);
    if ($primaryAdminId === null || (int)$user['id'] !== (int)$primaryAdminId) {
        respond(403, ['ok' => false, 'error' => 'Forbidden']);
    }

    return $user;
}
