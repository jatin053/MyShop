<?php
declare(strict_types=1);

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/auth_helpers.php';
require_once __DIR__ . '/includes/roles.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors = [];
$fullName = '';
$email = '';

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $fullName = trim((string)($_POST['full_name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $confirmPassword = (string)($_POST['confirm_password'] ?? '');

    if ($fullName === '') {
        $errors[] = 'Full name is required.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters.';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Password and confirm password do not match.';
    }

    if (!$errors) {
        try {
            $pdo = db();
            $registerAs = role_for_new_registration($pdo);

            $check = $pdo->prepare('SELECT `id` FROM `register` WHERE `Email` = ? LIMIT 1');
            $check->execute([$email]);

            if ($check->fetch()) {
                $errors[] = 'This email is already registered.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $insert = $pdo->prepare(
                    'INSERT INTO `register` (`FullName`, `Email`, `Password`, `RegisterAs`, `createdat`) VALUES (?, ?, ?, ?, NOW())'
                );
                $insert->execute([$fullName, $email, $hash, $registerAs]);

                $newUserId = (int)$pdo->lastInsertId();
                $role = ($registerAs === 'Admin') ? 'Admin' : 'User';

                $_SESSION['user_id'] = $newUserId;
                $_SESSION['full_name'] = $fullName;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                $claims = [
                    'sub' => $newUserId,
                    'email' => $email,
                    'name' => $fullName,
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
                ? 'Could not create account (DB error): ' . $e->getMessage()
                : 'Could not create account. Please check database connection/settings.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body class="page-register">

<div class="register-container">
    <h2>Register In My Shop.</h2>
    <p>Register To Continue Shopping.</p>

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
            <label>Full Name</label>
            <input
                type="text"
                name="full_name"
                placeholder="Enter full name"
                required
                value="<?= htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Enter email"
                required
                value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="register-btn">Register</button>
    </form>

    <div class="extra">
        <p>Already have an account? <a href="/Shop/admin/login.php">Login</a></p>
    </div>
</div>

<script src="assets/js/admin.js"></script>
</body>
</html>