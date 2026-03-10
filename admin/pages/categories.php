<?php
declare(strict_types=1);

$page = 'categories';
$title = 'Categories';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;
$errors = [];

if (isset($_POST['add'])) {
    $cat = trim((string)($_POST['category'] ?? ''));
    if ($cat !== '') {
	        try {
	            $stmt = mysqli_prepare($conn, 'INSERT INTO categories(`name`) VALUES (?)');
	            mysqli_stmt_bind_param($stmt, 's', $cat);
	            mysqli_stmt_execute($stmt);
	            header('Location: categories.php');
	            exit;
	        } catch (mysqli_sql_exception $e) {
	            $dbError = $e->getMessage();
	        }
    } else {
        $errors[] = 'Category name is required.';
    }
}

$q = admin_get_string('q');
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

$total = 0;
$rows = [];

try {
    $where = [];
    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "`name` LIKE '%{$qEsc}%'";
    }
    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query($conn, 'SELECT COUNT(*) FROM `categories`' . $whereSql);
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $res = mysqli_query(
        $conn,
        'SELECT * FROM `categories`' . $whereSql . ' ORDER BY `id` DESC'
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
    <input type="text" name="category" placeholder="New Category" required>
    <button type="submit" name="add" class="btn btn-primary">Add</button>
</form>

<form method="GET" class="form-inline">
    <input type="text" name="q" placeholder="Search categories..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
    <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <?php foreach ([10, 20, 50, 100] as $opt): ?>
            <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    <a class="btn" href="categories.php" style="background:#6b7280;">Reset</a>
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
    <div class="alert alert-warn">No categories found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="table-actions">
	                    <a href="edit_category.php?id=<?= urlencode((string)$row['id']) ?>">Edit</a>
	                    <span class="sep">|</span>
	                    <form method="POST" action="delete_category.php" style="display:inline;" onsubmit="return confirm('Delete?')">
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
                <a class="btn" href="<?= htmlspecialchars('categories.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> categories)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('categories.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php admin_layout_end(); ?>
