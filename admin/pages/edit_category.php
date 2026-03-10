<?php
declare(strict_types=1);

$page = 'categories';
$title = 'Edit Category';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: categories.php');
    exit;
}

$dbError = null;
$errors = [];

$category = null;
try {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM `categories` WHERE `id` = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $category = $res ? mysqli_fetch_assoc($res) : null;
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

if (!$category) {
    header('Location: categories.php');
    exit;
}

$name = trim((string)($category['name'] ?? ''));

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $name = trim((string)($_POST['name'] ?? ''));
    if ($name === '') {
        $errors[] = 'Name is required.';
    }

    if (!$errors) {
	        try {
	            $stmt = mysqli_prepare($conn, 'UPDATE `categories` SET `name` = ? WHERE `id` = ?');
	            mysqli_stmt_bind_param($stmt, 'si', $name, $id);
	            mysqli_stmt_execute($stmt);
	            header('Location: categories.php');
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
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" required>

    <div style="margin-top:14px;display:flex;gap:10px;">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn" href="categories.php" style="background:#6b7280;">Cancel</a>
    </div>
</form>

<?php admin_layout_end(); ?>
