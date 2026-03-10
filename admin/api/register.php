<?php
declare(strict_types=1);

require_once __DIR__ . '/_tokens.php';
require_once __DIR__ . '/../includes/roles.php';

require_method('POST');
$data = read_json_body();

$fullName = trim((string)($data['full_name'] ?? ''));
$email = trim((string)($data['email'] ?? ''));
$password = (string)($data['password'] ?? '');
$confirm = (string)($data['confirm_password'] ?? '');

if ($fullName === '') {
    respond(422, ['ok' => false, 'error' => 'Full name is required']);
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(422, ['ok' => false, 'error' => 'Valid email is required']);
}
if (strlen($password) < 6) {
    respond(422, ['ok' => false, 'error' => 'Password must be at least 6 characters']);
}
if ($password !== $confirm) {
    respond(422, ['ok' => false, 'error' => 'Password confirmation does not match']);
}

try {
    $pdo = db();
    $role = role_for_new_registration($pdo);

    $check = $pdo->prepare('SELECT `id` FROM `register` WHERE `Email` = ? LIMIT 1');
    $check->execute([$email]);
    if ($check->fetch()) {
        respond(409, ['ok' => false, 'error' => 'Email already registered']);
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare('INSERT INTO `register` (`FullName`, `Email`, `Password`, `RegisterAs`, `createdat`) VALUES (?, ?, ?, ?, NOW())');
    $insert->execute([$fullName, $email, $hash, $role]);

    $userId = (int)$pdo->lastInsertId();
    $tokenInfo = issue_token($pdo, $userId, $role);

    respond(201, [
        'ok' => true,
        'message' => 'Registered successfully',
        'token' => $tokenInfo['token'],
        'token_type' => $tokenInfo['token_type'],
        'expires_at' => $tokenInfo['expires_at'],
        'user' => [
            'id' => $userId,
            'full_name' => $fullName,
            'email' => $email,
            'role' => $role,
        ],
    ]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}
