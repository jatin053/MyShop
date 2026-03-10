<?php
declare(strict_types=1);

$page = 'coupons';
$title = 'Edit Coupon';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: coupons.php');
    exit;
}

$dbError = null;
$errors = [];

$coupon = null;
	        try {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM `coupons` WHERE `id` = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $coupon = $res ? mysqli_fetch_assoc($res) : null;
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

if (!$coupon) {
    header('Location: coupons.php');
    exit;
}

function dt_local_from_db(?string $db): string
{
    if (!$db) {
        return '';
    }
    // Expect: YYYY-MM-DD HH:MM:SS -> YYYY-MM-DDTHH:MM
    return str_replace(' ', 'T', substr($db, 0, 16));
}

function dt_db_from_local(string $local): ?string
{
    $local = trim($local);
    if ($local === '') {
        return null;
    }
    $local = str_replace('T', ' ', $local);
    if (preg_match('/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/', $local) === 1) {
        return $local . ':00';
    }
    if (preg_match('/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/', $local) === 1) {
        return $local;
    }
    return null;
}

$values = [
    'code' => (string)($coupon['code'] ?? ''),
    'discount' => (string)($coupon['discount'] ?? ''),
    'is_active' => !empty($coupon['is_active']) ? '1' : '0',
    'starts_at' => dt_local_from_db(isset($coupon['starts_at']) ? (string)$coupon['starts_at'] : null),
    'ends_at' => dt_local_from_db(isset($coupon['ends_at']) ? (string)$coupon['ends_at'] : null),
    'min_order_total' => (string)($coupon['min_order_total'] ?? ''),
    'max_uses' => (string)($coupon['max_uses'] ?? ''),
];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $values['code'] = strtoupper(trim((string)($_POST['code'] ?? '')));
    $values['discount'] = trim((string)($_POST['discount'] ?? ''));
    $values['is_active'] = isset($_POST['is_active']) && (string)$_POST['is_active'] === '1' ? '1' : '0';
    $values['starts_at'] = trim((string)($_POST['starts_at'] ?? ''));
    $values['ends_at'] = trim((string)($_POST['ends_at'] ?? ''));
    $values['min_order_total'] = trim((string)($_POST['min_order_total'] ?? ''));
    $values['max_uses'] = trim((string)($_POST['max_uses'] ?? ''));

    if ($values['code'] === '') {
        $errors[] = 'Code is required.';
    }
    $discount = (int)$values['discount'];
    if ($discount <= 0 || $discount > 100) {
        $errors[] = 'Discount must be 1-100.';
    }

    $startsAt = dt_db_from_local($values['starts_at']);
    $endsAt = dt_db_from_local($values['ends_at']);
    if ($values['starts_at'] !== '' && $startsAt === null) {
        $errors[] = 'Invalid Starts At date/time.';
    }
    if ($values['ends_at'] !== '' && $endsAt === null) {
        $errors[] = 'Invalid Ends At date/time.';
    }
    if ($startsAt && $endsAt && strtotime($startsAt . ' UTC') >= strtotime($endsAt . ' UTC')) {
        $errors[] = 'Ends At must be after Starts At.';
    }

    $minOrderTotal = null;
    if ($values['min_order_total'] !== '') {
        if (!is_numeric($values['min_order_total']) || (float)$values['min_order_total'] < 0) {
            $errors[] = 'Invalid Min Order Total.';
        } else {
            $minOrderTotal = (float)$values['min_order_total'];
        }
    }

    $maxUses = null;
    if ($values['max_uses'] !== '') {
        if (!ctype_digit($values['max_uses']) || (int)$values['max_uses'] < 0) {
            $errors[] = 'Invalid Max Uses.';
        } else {
            $maxUses = (int)$values['max_uses'];
        }
    }

    if (!$errors) {
        try {
            $isActive = $values['is_active'] === '1' ? 1 : 0;
            $stmt = mysqli_prepare(
                $conn,
                'UPDATE `coupons`
                 SET `code` = ?, `discount` = ?, `is_active` = ?, `starts_at` = ?, `ends_at` = ?, `min_order_total` = ?, `max_uses` = ?
                 WHERE `id` = ?'
            );
            mysqli_stmt_bind_param(
                $stmt,
                'siissdii',
                $values['code'],
                $discount,
                $isActive,
                $startsAt,
                $endsAt,
                $minOrderTotal,
                $maxUses,
                $id
	            );
	            mysqli_stmt_execute($stmt);
	            header('Location: coupons.php');
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
    <label>Code</label>
    <input type="text" name="code" value="<?= htmlspecialchars($values['code'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Discount (%)</label>
    <input type="number" name="discount" min="1" max="100" value="<?= htmlspecialchars($values['discount'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Active</label>
    <select name="is_active">
        <option value="1" <?= $values['is_active'] === '1' ? 'selected' : '' ?>>Yes</option>
        <option value="0" <?= $values['is_active'] === '0' ? 'selected' : '' ?>>No</option>
    </select>

    <label>Starts At</label>
    <input type="datetime-local" name="starts_at" value="<?= htmlspecialchars($values['starts_at'], ENT_QUOTES, 'UTF-8') ?>">

    <label>Ends At</label>
    <input type="datetime-local" name="ends_at" value="<?= htmlspecialchars($values['ends_at'], ENT_QUOTES, 'UTF-8') ?>">

    <label>Min Order Total</label>
    <input type="number" name="min_order_total" step="0.01" min="0" value="<?= htmlspecialchars($values['min_order_total'], ENT_QUOTES, 'UTF-8') ?>">

    <label>Max Uses</label>
    <input type="number" name="max_uses" min="0" value="<?= htmlspecialchars($values['max_uses'], ENT_QUOTES, 'UTF-8') ?>">

    <div style="margin-top:14px;display:flex;gap:10px;">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn" href="coupons.php" style="background:#6b7280;">Cancel</a>
    </div>
</form>

<?php admin_layout_end(); ?>
