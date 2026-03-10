<?php
declare(strict_types=1);

require_once __DIR__ . '/_tokens.php';

require_method('POST');

$token = bearer_token();
if (!$token) {
    $data = read_json_body();
    $token = (string)($data['token'] ?? '');
}

if (!$token) {
    respond(401, ['ok' => false, 'error' => 'Missing token']);
}

try {
    $pdo = db();
    $revoked = revoke_token($pdo, $token);
    respond(200, ['ok' => true, 'revoked' => $revoked]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}
