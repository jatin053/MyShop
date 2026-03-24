<?php
declare(strict_types=1);

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/auth_helpers.php';
require_once __DIR__ . '/includes/roles.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors = [];
$email = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }

    if ($password === '') {
        $errors[] = 'Password is required.';
    }

    if (!$errors) {
        try {
            $pdo = db();
            $primaryAdminId = enforce_single_admin($pdo);

            $stmt = $pdo->prepare('SELECT `id`, `FullName`, `Email`, `Password`, `RegisterAs` FROM `register` WHERE `Email` = ? LIMIT 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if (!$user) {
                $errors[] = 'Invalid credentials.';
            } else {
                $storedPassword = (string)($user['Password'] ?? '');
                $passwordOk = password_verify($password, $storedPassword);

                if (!$passwordOk && $storedPassword !== '' && hash_equals($storedPassword, $password)) {
                    $passwordOk = true;
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $upd = $pdo->prepare('UPDATE `register` SET `Password` = ? WHERE `id` = ?');
                    $upd->execute([$newHash, (int)$user['id']]);
                }

                if (!$passwordOk) {
                    $errors[] = 'Invalid credentials.';
                }
            }

            if (!$errors) {
                $role = ($primaryAdminId !== null && (int)$user['id'] === (int)$primaryAdminId) ? 'Admin' : 'User';

                $_SESSION['user_id'] = (int)$user['id'];
                $_SESSION['full_name'] = (string)$user['FullName'];
                $_SESSION['email'] = (string)$user['Email'];
                $_SESSION['role'] = $role;

                $claims = [
                    'sub' => (int)$user['id'],
                    'email' => (string)$user['Email'],
                    'name' => (string)$user['FullName'],
                    'role' => $role,
                    'iat' => time(),
                    'exp' => time() + 60 * 60 * 24,
                ];

                $jwt = jwt_sign_hs256($claims, jwt_secret());
                admin_set_admin_jwt_cookie($jwt, (int)$claims['exp']);

                if ($role === 'Admin') {
                    header('Location: /Shop/admin/index.php');
                    exit;
                }

                header('Location: /Shop/frontend/index.php');
                exit;
            }
        } catch (Throwable $e) {
            $debug = (getenv('APP_DEBUG') ?: '1') === '1';
            $errors[] = $debug
                ? 'Login failed (DB error): ' . $e->getMessage()
                : 'Login failed. Please check database connection.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="page-login">

<div class="login-container">
    <h2>Welcome to MyShop</h2>
    <p>Shop better, faster, and smarter every day.</p>

    <?php if ($errors): ?>
        <div style="margin-bottom:14px;padding:12px;border-radius:10px;background:#fef2f2;color:#991b1b;border:1px solid #fecaca;">
            <ul style="margin-left:18px;">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email" required value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="extra">
        <p>New user? <a href="/Shop/admin/register.php">Register</a></p>
    </div>
</div>

<script src="assets/js/admin.js"></script>
</body>
</html>