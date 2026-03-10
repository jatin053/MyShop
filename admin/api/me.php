<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

require_method('GET');

try {
    $pdo = db();
    $user = require_auth($pdo);

    respond(200, [
        'ok' => true,
        'user' => [
            'id' => (int)$user['id'],
            'full_name' => (string)$user['full_name'],
            'email' => (string)$user['email'],
            'role' => (string)$user['role'],
            'auth_via' => (string)$user['auth_via'],
        ],
    ]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}

