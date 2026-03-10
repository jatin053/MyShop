<?php
declare(strict_types=1);

$page = 'reviews';
$title = 'Reviews';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;
$errors = [];

$q = admin_get_string('q');
$status = admin_get_string('status');
$rating = admin_get_int('rating', 0, 0, 5);
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

$allowedStatuses = ['Pending', 'Approved', 'Rejected'];
if ($status !== '' && !in_array($status, $allowedStatuses, true)) {
    $status = '';
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    try {
        if (isset($_POST['bulk_action'])) {
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
	                $errors[] = 'Select at least one review.';
	            } elseif (!in_array($action, ['approve', 'reject', 'delete'], true)) {
	                $errors[] = 'Invalid bulk action.';
	            } else {
	                $in = implode(',', array_map('intval', $ids));
	                if ($action === 'delete') {
	                    mysqli_query($conn, "DELETE FROM `reviews` WHERE `id` IN ({$in})");
	                } else {
	                    $newStatus = $action === 'approve' ? 'Approved' : 'Rejected';
	                    $stEsc = mysqli_real_escape_string($conn, $newStatus);
	                    mysqli_query($conn, "UPDATE `reviews` SET `status` = '{$stEsc}' WHERE `id` IN ({$in})");
	                }
	                header('Location: reviews.php' . admin_qs(['page' => 1]));
	                exit;
	            }
        } elseif (isset($_POST['review_action'])) {
            $action = isset($_POST['review_action']) ? (string)$_POST['review_action'] : '';
            $actionId = isset($_POST['id']) ? (int)$_POST['id'] : 0;
	            if ($actionId > 0 && in_array($action, ['approve', 'reject', 'delete'], true)) {
	                if ($action === 'delete') {
	                    $stmt = mysqli_prepare($conn, 'DELETE FROM `reviews` WHERE `id` = ?');
	                    mysqli_stmt_bind_param($stmt, 'i', $actionId);
	                    mysqli_stmt_execute($stmt);
	                } else {
	                    $newStatus = $action === 'approve' ? 'Approved' : 'Rejected';
	                    $stmt = mysqli_prepare($conn, 'UPDATE `reviews` SET `status` = ? WHERE `id` = ?');
	                    mysqli_stmt_bind_param($stmt, 'si', $newStatus, $actionId);
	                    mysqli_stmt_execute($stmt);
	                }
	                header('Location: reviews.php');
	                exit;
	            }
        }
    } catch (mysqli_sql_exception $e) {
        $dbError = $e->getMessage();
    }
}

$rows = [];
$total = 0;
try {
    $where = [];
    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "(p.`name` LIKE '%{$qEsc}%' OR r.`Email` LIKE '%{$qEsc}%' OR rv.`comment` LIKE '%{$qEsc}%')";
    }
    if ($status !== '') {
        $stEsc = mysqli_real_escape_string($conn, $status);
        $where[] = "rv.`status` = '{$stEsc}'";
    }
    if ($rating > 0) {
        $where[] = 'rv.`rating` = ' . (int)$rating;
    }

    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query(
        $conn,
        'SELECT COUNT(*)
         FROM `reviews` rv
         LEFT JOIN `products` p ON p.`id` = rv.`product_id`
         LEFT JOIN `register` r ON r.`id` = rv.`user_id`' . $whereSql
    );
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $res = mysqli_query(
        $conn,
        'SELECT rv.*, p.`name` AS `product_name`, r.`Email` AS `user_email`
         FROM `reviews` rv
         LEFT JOIN `products` p ON p.`id` = rv.`product_id`
         LEFT JOIN `register` r ON r.`id` = rv.`user_id`'
        . $whereSql
        . ' ORDER BY rv.`id` DESC'
        . ' LIMIT ' . (int)$limit . ' OFFSET ' . (int)$offset
    );
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
    <form method="GET" class="form-inline" style="margin-bottom:0;">
        <input type="text" name="q" placeholder="Search product/user/comment..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
        <select name="status" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
            <option value="">Any status</option>
            <?php foreach ($allowedStatuses as $s): ?>
                <option value="<?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?>" <?= $status === $s ? 'selected' : '' ?>><?= htmlspecialchars($s, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>
        <select name="rating" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
            <option value="">Any rating</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= (int)$i ?>" <?= $rating === $i ? 'selected' : '' ?>><?= (int)$i ?>/5</option>
            <?php endfor; ?>
        </select>
        <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
            <?php foreach ([10, 20, 50, 100] as $opt): ?>
                <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a class="btn" href="reviews.php" style="background:#6b7280;">Reset</a>
    </form>

	    <form id="bulkReviewsForm" method="POST" action="reviews.php<?= htmlspecialchars(admin_qs(), ENT_QUOTES, 'UTF-8') ?>" style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
	        <select name="bulk_action" required style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
	            <option value="">Bulk action...</option>
	            <option value="approve">Approve</option>
	            <option value="reject">Reject</option>
            <option value="delete">Delete</option>
        </select>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Apply bulk action?')">Apply</button>
    </form>
</div>

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
    <div class="alert alert-warn">No reviews found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width:28px;">
                <input id="selectAllReviews" type="checkbox" title="Select all">
            </th>
            <th>ID</th>
            <th>Product</th>
            <th>User</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td>
                    <input class="review-checkbox" type="checkbox" name="ids[]" form="bulkReviewsForm" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
                </td>
                <td><?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($row['product_name'] ?? $row['product_id']), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)($row['user_email'] ?? $row['user_id']), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['rating'], ENT_QUOTES, 'UTF-8') ?>/5</td>
                <td>
                    <?php
                    $st = (string)($row['status'] ?? '');
                    $badgeClass = match ($st) {
                        'Approved' => 'badge-success',
                        'Rejected' => 'badge-danger',
                        default => 'badge-warn',
                    };
                    ?>
                    <span class="badge <?= htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($st, ENT_QUOTES, 'UTF-8') ?></span>
                </td>
	                <td><?= htmlspecialchars((string)$row['comment'], ENT_QUOTES, 'UTF-8') ?></td>
	                <td class="table-actions">
	                    <form method="POST" action="reviews.php" style="display:inline;">
	                        <input type="hidden" name="review_action" value="approve">
	                        <input type="hidden" name="id" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
	                        <button type="submit" class="btn" style="padding:0;background:transparent;color:var(--primary);">Approve</button>
	                    </form>
	                    <span class="sep">|</span>
	                    <form method="POST" action="reviews.php" style="display:inline;">
	                        <input type="hidden" name="review_action" value="reject">
	                        <input type="hidden" name="id" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
	                        <button type="submit" class="btn" style="padding:0;background:transparent;color:var(--primary);">Reject</button>
	                    </form>
	                    <span class="sep">|</span>
	                    <form method="POST" action="reviews.php" style="display:inline;" onsubmit="return confirm('Delete?')">
	                        <input type="hidden" name="review_action" value="delete">
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
                <a class="btn" href="<?= htmlspecialchars('reviews.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> reviews)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('reviews.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script>
        (function () {
            const selectAll = document.getElementById('selectAllReviews');
            if (!selectAll) return;
            selectAll.addEventListener('change', function () {
                document.querySelectorAll('.review-checkbox').forEach(function (cb) {
                    cb.checked = selectAll.checked;
                });
            });
        })();
    </script>
<?php endif; ?>

<?php admin_layout_end(); ?>
