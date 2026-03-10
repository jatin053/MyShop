<?php
declare(strict_types=1);

$page = 'orders';
$title = 'Order Details';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: orders.php');
    exit;
}

$dbError = null;
$errors = [];

$allowedStatuses = ['Pending', 'Paid', 'Shipped', 'Delivered', 'Cancelled', 'Refunded'];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['update_status'])) {
    $status = trim((string)($_POST['status'] ?? ''));
    if (!in_array($status, $allowedStatuses, true)) {
        $errors[] = 'Invalid status.';
    } else {
	        try {
	            $stmt = mysqli_prepare($conn, 'UPDATE `orders` SET `status` = ? WHERE `id` = ?');
	            mysqli_stmt_bind_param($stmt, 'si', $status, $id);
	            mysqli_stmt_execute($stmt);
	            header('Location: order_view.php?id=' . urlencode((string)$id));
	            exit;
	        } catch (mysqli_sql_exception $e) {
	            $dbError = $e->getMessage();
        }
    }
}

$order = null;
$items = [];
try {
    $stmt = mysqli_prepare(
        $conn,
        'SELECT o.*, r.`Email` AS `user_email`, r.`FullName` AS `user_full_name`, c.`code` AS `coupon_code`
         FROM `orders` o
         LEFT JOIN `register` r ON r.`id` = o.`user_id`
         LEFT JOIN `coupons` c ON c.`id` = o.`coupon_id`
         WHERE o.`id` = ?
         LIMIT 1'
    );
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $order = $res ? mysqli_fetch_assoc($res) : null;

    $iStmt = mysqli_prepare($conn, 'SELECT * FROM `order_items` WHERE `order_id` = ? ORDER BY `id` ASC');
    mysqli_stmt_bind_param($iStmt, 'i', $id);
    mysqli_stmt_execute($iStmt);
    $iRes = mysqli_stmt_get_result($iStmt);
    if ($iRes) {
        $items = mysqli_fetch_all($iRes, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

if (!$order) {
    header('Location: orders.php');
    exit;
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

<div class="card">
    <h4 style="margin-bottom:10px;">Order #<?= htmlspecialchars((string)$order['id'], ENT_QUOTES, 'UTF-8') ?></h4>

    <table class="table" style="margin-top:0;">
        <tbody>
        <tr>
            <th style="width:220px;">User</th>
            <td>
                <?= htmlspecialchars((string)($order['user_full_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                <?php if (!empty($order['user_email'])): ?>
                    (<?= htmlspecialchars((string)$order['user_email'], ENT_QUOTES, 'UTF-8') ?>)
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= htmlspecialchars((string)$order['status'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <th>Subtotal</th>
            <td>&#8377;<?= htmlspecialchars((string)$order['subtotal'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
            <th>Discount</th>
            <td>&#8377;<?= htmlspecialchars((string)$order['discount_total'], ENT_QUOTES, 'UTF-8') ?> <?= !empty($order['coupon_code']) ? '(' . htmlspecialchars((string)$order['coupon_code'], ENT_QUOTES, 'UTF-8') . ')' : '' ?></td>
        </tr>
        <tr>
            <th>Total</th>
            <td><strong>&#8377;<?= htmlspecialchars((string)$order['total'], ENT_QUOTES, 'UTF-8') ?></strong></td>
        </tr>
        <tr>
            <th>Created</th>
            <td><?= htmlspecialchars((string)$order['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        </tbody>
    </table>

	<form method="POST" class="form-inline" style="margin-top:16px;">
	        <input type="hidden" name="update_status" value="1">
	        <label style="font-weight:600;">Update Status</label>
	        <select name="status" required>
            <?php foreach ($allowedStatuses as $s): ?>
                <option value="<?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?>" <?= (string)$order['status'] === $s ? 'selected' : '' ?>><?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn" onclick="window.print()" style="background:#6b7280;">Print</button>
        <a class="btn" href="orders.php" style="background:#6b7280;">Back</a>
    </form>
</div>

<div class="card">
    <h4 style="margin-bottom:10px;">Items</h4>
    <?php if (!$items): ?>
        <div class="alert alert-warn">No order items found.</div>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Line Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $idx => $it): ?>
                <tr>
                    <td><?= (int)$idx + 1 ?></td>
                    <td><?= htmlspecialchars((string)$it['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>&#8377;<?= htmlspecialchars((string)$it['unit_price'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$it['quantity'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>&#8377;<?= htmlspecialchars((string)$it['line_total'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php admin_layout_end(); ?>
