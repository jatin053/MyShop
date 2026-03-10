<?php
declare(strict_types=1);

$page = 'products';
$title = 'Products';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

function load_categories(mysqli $conn): array
{
    try {
        $res = mysqli_query($conn, 'SELECT `id`, `name` FROM `categories` ORDER BY `name` ASC');
        return $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
    } catch (mysqli_sql_exception $e) {
        return [];
    }
}

$categories = load_categories($conn);

$q = admin_get_string('q');
$status = admin_get_string('status');
$categoryId = admin_get_int('category_id', 0, 0);
$lowStock = admin_get_int('low_stock', 0, 0, 1) === 1;
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

$errors = [];
$dbError = null;
$rows = [];
$total = 0;

$allowedStatuses = ['Active', 'Inactive'];
if ($status !== '' && !in_array($status, $allowedStatuses, true)) {
    $status = '';
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['bulk_action'])) {
    $action = trim((string)($_POST['bulk_action'] ?? ''));
    $idsRaw = $_POST['ids'] ?? [];
    $ids = [];
    if (is_array($idsRaw)) {
        foreach ($idsRaw as $v) {
            $id = (int)$v;
            if ($id > 0) {
                $ids[$id] = $id;
            }
        }
    }
    $ids = array_values($ids);

    if (!$ids) {
        $errors[] = 'Select at least one product.';
    } elseif (!in_array($action, ['activate', 'deactivate', 'delete'], true)) {
        $errors[] = 'Invalid bulk action.';
    } else {
        $in = implode(',', array_map('intval', $ids));
        try {
	            if ($action === 'activate' || $action === 'deactivate') {
	                $newStatus = $action === 'activate' ? 'Active' : 'Inactive';
	                mysqli_query($conn, "UPDATE `products` SET `status` = '" . mysqli_real_escape_string($conn, $newStatus) . "' WHERE `id` IN ({$in})");
	            } else {
                $images = [];
                $imgRes = mysqli_query($conn, "SELECT `image` FROM `products` WHERE `id` IN ({$in})");
                if ($imgRes) {
                    while ($r = mysqli_fetch_assoc($imgRes)) {
                        if (is_array($r) && !empty($r['image'])) {
                            $images[] = (string)$r['image'];
                        }
                    }
                }
	                mysqli_query($conn, "DELETE FROM `products` WHERE `id` IN ({$in})");
	                foreach ($images as $img) {
	                    $path = __DIR__ . '/../uploads/' . $img;
	                    if (is_file($path)) {
	                        @unlink($path);
	                    }
	                }
	            }

            header('Location: products.php' . admin_qs(['page' => 1]));
            exit;
        } catch (mysqli_sql_exception $e) {
            $dbError = $e->getMessage();
        }
    }
}

try {
    $where = [];

    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "p.`name` LIKE '%{$qEsc}%'";
    }
    if ($categoryId > 0) {
        $where[] = 'p.`category_id` = ' . (int)$categoryId;
    }
    if ($status !== '') {
        $statusEsc = mysqli_real_escape_string($conn, $status);
        $where[] = "p.`status` = '{$statusEsc}'";
    }
    if ($lowStock) {
        $where[] = 'p.`stock` <= 5';
    }

    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query($conn, 'SELECT COUNT(*) FROM `products` p' . $whereSql);
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $sql = 'SELECT p.*, c.`name` AS `category_name`
            FROM `products` p
            LEFT JOIN `categories` c ON c.`id` = p.`category_id`'
        . $whereSql
        . ' ORDER BY p.`id` DESC'
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

<div style="display:flex;gap:10px;justify-content:space-between;align-items:center;flex-wrap:wrap;margin-bottom:14px;">
    <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
        <a href="add_product.php" class="btn btn-primary">+ Add Product</a>
        <a href="products_export.php<?= htmlspecialchars(admin_qs(), ENT_QUOTES, 'UTF-8') ?>" class="btn" style="background:#6b7280;">Export CSV</a>
    </div>

	    <form id="bulkProductsForm" method="POST" action="products.php<?= htmlspecialchars(admin_qs(), ENT_QUOTES, 'UTF-8') ?>" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
	        <select name="bulk_action" required style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
	            <option value="">Bulk action...</option>
	            <option value="activate">Set Active</option>
	            <option value="deactivate">Set Inactive</option>
            <option value="delete">Delete</option>
        </select>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Apply bulk action?')">Apply</button>
    </form>
</div>

<form method="GET" class="form-inline">
    <input type="text" name="q" placeholder="Search products..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
    <select name="category_id" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <option value="">All categories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= (int)$cat['id'] ?>" <?= (int)$categoryId === (int)$cat['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars((string)$cat['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select name="status" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <option value="">Any status</option>
        <?php foreach ($allowedStatuses as $s): ?>
            <option value="<?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?>" <?= $status === $s ? 'selected' : '' ?>><?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?></option>
        <?php endforeach; ?>
    </select>
    <label style="display:flex;align-items:center;gap:6px;font-size:13px;color:#374151;">
        <input type="checkbox" name="low_stock" value="1" <?= $lowStock ? 'checked' : '' ?>>
        Low stock
    </label>
    <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
        <?php foreach ([10, 20, 50, 100] as $opt): ?>
            <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    <a class="btn" href="products.php" style="background:#6b7280;">Reset</a>
</form>

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

<?php if (!$rows): ?>
    <div class="alert alert-warn">No products found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width:28px;">
                <input id="selectAllProducts" type="checkbox" title="Select all">
            </th>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td>
                    <input class="product-checkbox" type="checkbox" name="ids[]" form="bulkProductsForm" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
                </td>
                <td><?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?php if (!empty($row['image'])): ?>
                        <img src="../uploads/<?= htmlspecialchars((string)$row['image'], ENT_QUOTES, 'UTF-8') ?>" width="50" alt="">
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars((string)$row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($row['category_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                <td>&#8377;<?= htmlspecialchars((string)$row['price'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?= htmlspecialchars((string)$row['stock'], ENT_QUOTES, 'UTF-8') ?>
                    <?php if ((int)($row['stock'] ?? 0) <= 5): ?>
                        <span class="badge badge-warn" style="margin-left:6px;">Low</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php
                    $st = (string)($row['status'] ?? '');
                    $badgeClass = $st === 'Active' ? 'badge-success' : 'badge-danger';
                    ?>
                    <span class="badge <?= htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($st, ENT_QUOTES, 'UTF-8') ?></span>
                </td>
                <td class="table-actions">
	                    <a href="edit_product.php?id=<?= urlencode((string)$row['id']) ?>">Edit</a>
	                    <span class="sep">|</span>
	                    <form method="POST" action="delete_product.php" style="display:inline;" onsubmit="return confirm('Delete?')">
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
                <a class="btn" href="<?= htmlspecialchars('products.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> products)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('products.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script>
        (function () {
            const selectAll = document.getElementById('selectAllProducts');
            if (!selectAll) return;
            selectAll.addEventListener('change', function () {
                document.querySelectorAll('.product-checkbox').forEach(function (cb) {
                    cb.checked = selectAll.checked;
                });
            });
        })();
    </script>
<?php endif; ?>

<?php admin_layout_end(); ?>
