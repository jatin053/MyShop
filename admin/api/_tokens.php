<?php
declare(strict_types=1);

require_once __DIR__ . '/_helpers.php';
require_once __DIR__ . '/../config/db.php';

function issue_token(PDO $pdo, int $userId, string $role, int $ttlSeconds = 604800): array
{
    $token = base64url_encode(random_bytes(32));
    $hash = hash('sha256', $token);
    $expiresAt = now_plus_seconds($ttlSeconds);

    $stmt = $pdo->prepare('INSERT INTO `auth_tokens` (`user_id`, `token_hash`, `role`, `expires_at`) VALUES (?, ?, ?, ?)');
    $stmt->execute([$userId, $hash, $role, $expiresAt]);

    return [
        'token' => $token,
        'token_type' => 'Bearer',
        'expires_at' => $expiresAt . 'Z',
    ];
}

function revoke_token(PDO $pdo, string $token): bool
{
    $hash = hash('sha256', $token);
    $stmt = $pdo->prepare('UPDATE `auth_tokens` SET `revoked_at` = UTC_TIMESTAMP() WHERE `token_hash` = ? AND `revoked_at` IS NULL');
    $stmt->execute([$hash]);
    return $stmt->rowCount() > 0;
}
