<?php
declare(strict_types=1);

require_once __DIR__ . '/_tokens.php';
require_once __DIR__ . '/../includes/roles.php';

require_method('POST');
$data = read_json_body();

$email = trim((string)($data['email'] ?? ''));
$password = (string)($data['password'] ?? '');

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(422, ['ok' => false, 'error' => 'Valid email is required']);
}
if ($password === '') {
    respond(422, ['ok' => false, 'error' => 'Password is required']);
}

try {
    $pdo = db();
    $primaryAdminId = enforce_single_admin($pdo);
    $stmt = $pdo->prepare('SELECT `id`, `FullName`, `Email`, `Password`, `RegisterAs` FROM `register` WHERE `Email` = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        respond(401, ['ok' => false, 'error' => 'Invalid credentials']);
    }

    $storedPassword = (string)($user['Password'] ?? '');
    $passwordOk = password_verify($password, $storedPassword);
    if (!$passwordOk && $storedPassword !== '' && hash_equals($storedPassword, $password)) {
        // Legacy/plaintext password fallback (dev only). Upgrade to hash.
        $passwordOk = true;
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        $upd = $pdo->prepare('UPDATE `register` SET `Password` = ? WHERE `id` = ?');
        $upd->execute([$newHash, (int)$user['id']]);
    }
    if (!$passwordOk) {
        respond(401, ['ok' => false, 'error' => 'Invalid credentials']);
    }

    $role = ($primaryAdminId !== null && (int)$user['id'] === (int)$primaryAdminId) ? 'Admin' : 'User';

    $tokenInfo = issue_token($pdo, (int)$user['id'], $role);

    respond(200, [
        'ok' => true,
        'token' => $tokenInfo['token'],
        'token_type' => $tokenInfo['token_type'],
        'expires_at' => $tokenInfo['expires_at'],
        'user' => [
            'id' => (int)$user['id'],
            'full_name' => (string)$user['FullName'],
            'email' => (string)$user['Email'],
            'role' => $role,
        ],
    ]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}
