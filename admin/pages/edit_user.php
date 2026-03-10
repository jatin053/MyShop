<?php
declare(strict_types=1);

$page = 'users';
$title = 'Edit User';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: users.php');
    exit;
}

$dbError = null;
$errors = [];

$user = null;
	        try {
    $stmt = mysqli_prepare($conn, 'SELECT `id`, `FullName`, `Email`, `RegisterAs` FROM `register` WHERE `id` = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $user = $res ? mysqli_fetch_assoc($res) : null;
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

if (!$user) {
    header('Location: users.php');
    exit;
}

$values = [
    'full_name' => (string)($user['FullName'] ?? ''),
    'email' => (string)($user['Email'] ?? ''),
    'role' => (string)($user['RegisterAs'] ?? 'User'),
    'password' => '',
];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $values['full_name'] = trim((string)($_POST['full_name'] ?? ''));
    $values['email'] = trim((string)($_POST['email'] ?? ''));
    $values['password'] = (string)($_POST['password'] ?? '');

    if ($values['full_name'] === '') {
        $errors[] = 'Full name is required.';
    }
    if ($values['email'] === '' || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }
    if ($values['password'] !== '' && strlen($values['password']) < 6) {
        $errors[] = 'Password must be at least 6 characters (or leave blank).';
    }

    if (!$errors) {
        try {
            if ($values['password'] !== '') {
                $hash = password_hash($values['password'], PASSWORD_DEFAULT);
                $stmt = mysqli_prepare($conn, 'UPDATE `register` SET `FullName` = ?, `Email` = ?, `Password` = ? WHERE `id` = ?');
                mysqli_stmt_bind_param($stmt, 'sssi', $values['full_name'], $values['email'], $hash, $id);
            } else {
                $stmt = mysqli_prepare($conn, 'UPDATE `register` SET `FullName` = ?, `Email` = ? WHERE `id` = ?');
                mysqli_stmt_bind_param($stmt, 'ssi', $values['full_name'], $values['email'], $id);
	            }
	            mysqli_stmt_execute($stmt);
	            header('Location: users.php');
	            exit;
	        } catch (mysqli_sql_exception $e) {
	            $dbError = $e->getMessage();
	        }
    }
}

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<?php if ($dbError): ?>
    <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>

<?php if ($errors): ?>
    <div class="alert alert-error">
        <ul style="margin-left:18px;">
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" class="form">
    <label>Full Name</label>
    <input type="text" name="full_name" value="<?= htmlspecialchars($values['full_name'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($values['email'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Role</label>
    <div style="padding:10px 12px;border:1px solid #e5e7eb;border-radius:10px;background:#f9fafb;">
        <?= htmlspecialchars($values['role'], ENT_QUOTES, 'UTF-8') ?>
    </div>

    <label>Reset Password (optional)</label>
    <input type="password" name="password" placeholder="Leave blank to keep current password">

    <div style="margin-top:14px;display:flex;gap:10px;">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn" href="users.php" style="background:#6b7280;">Cancel</a>
    </div>
</form>

<?php admin_layout_end(); ?>
