<?php
declare(strict_types=1);

$page = 'coupons';
$title = 'Coupons';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;
$errors = [];

if (isset($_POST['add'])) {
    $code = strtoupper(trim((string)($_POST['code'] ?? '')));
    $discount = (int)($_POST['discount'] ?? 0);
    if ($code !== '' && $discount > 0) {
	        try {
	            $stmt = mysqli_prepare($conn, 'INSERT INTO coupons(`code`, `discount`) VALUES (?, ?)');
	            mysqli_stmt_bind_param($stmt, 'si', $code, $discount);
	            mysqli_stmt_execute($stmt);
	            header('Location: coupons.php');
	            exit;
	        } catch (mysqli_sql_exception $e) {
	            $dbError = $e->getMessage();
	        }
    } else {
        $errors[] = 'Valid code and discount are required.';
    }
}

$q = admin_get_string('q');
$active = admin_get_string('active');
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

if ($active !== '' && !in_array($active, ['1', '0'], true)) {
    $active = '';
}

$total = 0;
$rows = [];

try {
    $where = [];
    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "`code` LIKE '%{$qEsc}%'";
    }
    if ($active !== '') {
        $where[] = '`is_active` = ' . (int)$active;
    }
    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query($conn, 'SELECT COUNT(*) FROM `coupons`' . $whereSql);
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $res = mysqli_query(
        $conn,
        'SELECT * FROM `coupons`' . $whereSql . ' ORDER BY `id` DESC'
        . ' LIMIT ' . (int)$limit . ' OFFSET ' . (int)$offset
    );
    if ($res) {
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $e) {
    $dbError = $dbError ?? $e->getMessage();
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

<form method="POST" class="form-inline">
    <input type="text" name="code" placeholder="Coupon Code" required>
    <input type="number" name="discount" placeholder="Discount %" required min="1" max="100">
    <button type="submit" name="add" class="btn btn-primary">Create</button>
</form>

<form method="GET" class="form-inline">
    <input type="text" name="q" placeholder="Search code..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
    <select name="active" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <option value="">Any</option>
        <option value="1" <?= $active === '1' ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= $active === '0' ? 'selected' : '' ?>>Inactive</option>
    </select>
    <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <?php foreach ([10, 20, 50, 100] as $opt): ?>
            <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    <a class="btn" href="coupons.php" style="background:#6b7280;">Reset</a>
</form>

<?php if ($errors): ?>
    <div class="alert alert-error">
        <ul style="margin-left:18px;">
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($dbError): ?>
    <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>

<?php if (!$rows): ?>
    <div class="alert alert-warn">No coupons found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Discount</th>
            <th>Active</th>
            <th>Used</th>
            <th>Starts</th>
            <th>Ends</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['code'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['discount'], ENT_QUOTES, 'UTF-8') ?>%</td>
                <td>
                    <?php if (!empty($row['is_active'])): ?>
                        <span class="badge badge-success">Yes</span>
                    <?php else: ?>
                        <span class="badge badge-danger">No</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?= htmlspecialchars((string)($row['used_count'] ?? '0'), ENT_QUOTES, 'UTF-8') ?>
                    <?php if (!empty($row['max_uses'])): ?>
                        /<?= htmlspecialchars((string)$row['max_uses'], ENT_QUOTES, 'UTF-8') ?>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars((string)($row['starts_at'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($row['ends_at'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td class="table-actions">
	                    <a href="edit_coupon.php?id=<?= urlencode((string)$row['id']) ?>">Edit</a>
	                    <span class="sep">|</span>
	                    <form method="POST" action="delete_coupon.php" style="display:inline;" onsubmit="return confirm('Delete?')">
	                        <input type="hidden" name="id" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
	                        <button type="submit" class="btn" style="padding:0;background:transparent;color:var(--primary);">Delete</button>
	                    </form>
	                </td>
	            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination" style="margin-top:16px;display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
            <?php if ($pageNum > 1): ?>
                <a class="btn" href="<?= htmlspecialchars('coupons.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> coupons)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('coupons.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php admin_layout_end(); ?>
