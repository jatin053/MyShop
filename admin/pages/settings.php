<?php
declare(strict_types=1);

$page = 'settings';
$title = 'Settings';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;

if (isset($_POST['save'])) {
    $name = trim((string)($_POST['site_name'] ?? ''));
    $email = trim((string)($_POST['admin_email'] ?? ''));
    $currency = trim((string)($_POST['currency'] ?? ''));

    try {
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('Invalid admin email.');
        }
        if ($currency === '') {
            $currency = 'INR';
        }

        $stmt = mysqli_prepare(
            $conn,
            'INSERT INTO `settings` (`id`, `site_name`, `admin_email`, `currency`)
             VALUES (1, ?, ?, ?)
             ON DUPLICATE KEY UPDATE
               `site_name` = VALUES(`site_name`),
               `admin_email` = VALUES(`admin_email`),
               `currency` = VALUES(`currency`)'
	        );
	        mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $currency);
	        mysqli_stmt_execute($stmt);
	        header('Location: settings.php');
	        exit;
	    } catch (Throwable $e) {
	        $dbError = $e->getMessage();
    }
}

$data = ['site_name' => '', 'admin_email' => '', 'currency' => ''];
try {
    $result = mysqli_query($conn, 'SELECT * FROM `settings` WHERE `id` = 1 LIMIT 1');
    $row = $result ? mysqli_fetch_assoc($result) : null;
    if (is_array($row)) {
        $data = array_merge($data, $row);
    }
} catch (mysqli_sql_exception $e) {
    $dbError = $dbError ?? $e->getMessage();
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

<form method="POST" class="form">
    <label>Site Name</label>
    <input type="text" name="site_name" value="<?= htmlspecialchars((string)$data['site_name'], ENT_QUOTES, 'UTF-8') ?>">

    <label>Admin Email</label>
    <input type="email" name="admin_email" value="<?= htmlspecialchars((string)$data['admin_email'], ENT_QUOTES, 'UTF-8') ?>">

    <label>Currency</label>
    <input type="text" name="currency" value="<?= htmlspecialchars((string)$data['currency'], ENT_QUOTES, 'UTF-8') ?>">

    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
</form>

<?php admin_layout_end(); ?>
