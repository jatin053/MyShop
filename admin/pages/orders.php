<?php
declare(strict_types=1);

$page = 'orders';
$title = 'Orders';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;
$rows = [];
$total = 0;

$q = admin_get_string('q');
$status = admin_get_string('status');
$from = admin_get_string('from');
$to = admin_get_string('to');
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

$allowedStatuses = ['Pending', 'Paid', 'Shipped', 'Delivered', 'Cancelled', 'Refunded'];
if ($status !== '' && !in_array($status, $allowedStatuses, true)) {
    $status = '';
}

try {
    $where = [];

    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        if (ctype_digit($q)) {
            $where[] = 'o.`id` = ' . (int)$q;
        } else {
            $where[] = "(r.`Email` LIKE '%{$qEsc}%' OR r.`FullName` LIKE '%{$qEsc}%')";
        }
    }
    if ($status !== '') {
        $stEsc = mysqli_real_escape_string($conn, $status);
        $where[] = "o.`status` = '{$stEsc}'";
    }

    if ($from !== '' && preg_match('/^\\d{4}-\\d{2}-\\d{2}$/', $from) === 1) {
        $fromEsc = mysqli_real_escape_string($conn, $from . ' 00:00:00');
        $where[] = "o.`created_at` >= '{$fromEsc}'";
    }
    if ($to !== '' && preg_match('/^\\d{4}-\\d{2}-\\d{2}$/', $to) === 1) {
        $toEsc = mysqli_real_escape_string($conn, $to . ' 23:59:59');
        $where[] = "o.`created_at` <= '{$toEsc}'";
    }

    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query(
        $conn,
        'SELECT COUNT(*)
         FROM `orders` o
         LEFT JOIN `register` r ON r.`id` = o.`user_id`' . $whereSql
    );
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $sql = 'SELECT o.*, r.`Email` AS `user_email`, r.`FullName` AS `user_full_name`
            FROM `orders` o
            LEFT JOIN `register` r ON r.`id` = o.`user_id`'
        . $whereSql
        . ' ORDER BY o.`id` DESC'
        . ' LIMIT ' . (int)$limit . ' OFFSET ' . (int)$offset;

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

$totalPages = $limit > 0 ? (int)max(1, (int)ceil($total / $limit)) : 1;
$pageNum = min($pageNum, $totalPages);

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<form method="GET" class="form-inline">
    <input type="text" name="q" placeholder="Order ID or user email/name..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
    <select name="status" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <option value="">Any status</option>
        <?php foreach ($allowedStatuses as $s): ?>
            <option value="<?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?>" <?= $status === $s ? 'selected' : '' ?>><?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?></option>
        <?php endforeach; ?>
    </select>
    <label style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
        From
        <input type="date" name="from" value="<?= htmlspecialchars($from, ENT_QUOTES, 'UTF-8') ?>" style="min-width:auto;">
    </label>
    <label style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
        To
        <input type="date" name="to" value="<?= htmlspecialchars($to, ENT_QUOTES, 'UTF-8') ?>" style="min-width:auto;">
    </label>
    <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <?php foreach ([10, 20, 50, 100] as $opt): ?>
            <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    <a class="btn" href="orders.php" style="background:#6b7280;">Reset</a>
</form>

<?php if ($dbError): ?>
    <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>

<?php if (!$rows): ?>
    <div class="alert alert-warn">No orders found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td>#<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?= htmlspecialchars((string)($row['user_full_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                    <?php if (!empty($row['user_email'])): ?>
                        <div style="color:#6b7280;font-size:12px;"><?= htmlspecialchars((string)$row['user_email'], ENT_QUOTES, 'UTF-8') ?></div>
                    <?php else: ?>
                        <div style="color:#6b7280;font-size:12px;">User #<?= htmlspecialchars((string)$row['user_id'], ENT_QUOTES, 'UTF-8') ?></div>
                    <?php endif; ?>
                </td>
                <td>&#8377;<?= htmlspecialchars((string)$row['total'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?php
                    $st = (string)($row['status'] ?? '');
                    $badgeClass = match ($st) {
                        'Delivered', 'Shipped' => 'badge-success',
                        'Paid' => 'badge-info',
                        'Cancelled', 'Refunded' => 'badge-danger',
                        default => 'badge-warn',
                    };
                    ?>
                    <span class="badge <?= htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($st, ENT_QUOTES, 'UTF-8') ?></span>
                </td>
                <td><?= htmlspecialchars((string)$row['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="table-actions">
                    <a href="order_view.php?id=<?= urlencode((string)$row['id']) ?>">View</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination" style="margin-top:16px;display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
            <?php if ($pageNum > 1): ?>
                <a class="btn" href="<?= htmlspecialchars('orders.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> orders)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('orders.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php admin_layout_end(); ?>
