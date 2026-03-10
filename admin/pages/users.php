<?php
declare(strict_types=1);

$page = 'users';
$title = 'Users';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$dbError = null;
$rows = [];
$total = 0;

$q = admin_get_string('q');
$role = admin_get_string('role');
$limit = admin_get_int('limit', 20, 5, 100);
$pageNum = admin_get_int('page', 1, 1, 100000);
$offset = ($pageNum - 1) * $limit;

$allowedRoles = ['Admin', 'User'];
if ($role !== '' && !in_array($role, $allowedRoles, true)) {
    $role = '';
}

try {
    $where = [];
    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "(`FullName` LIKE '%{$qEsc}%' OR `Email` LIKE '%{$qEsc}%')";
    }
    if ($role !== '') {
        $roleEsc = mysqli_real_escape_string($conn, $role);
        $where[] = "`RegisterAs` = '{$roleEsc}'";
    }

    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $countRes = mysqli_query($conn, 'SELECT COUNT(*) FROM `register`' . $whereSql);
    if ($countRes) {
        $total = (int)mysqli_fetch_row($countRes)[0];
    }

    $res = mysqli_query(
        $conn,
        'SELECT `id`, `FullName`, `Email`, `RegisterAs`, `createdat`
         FROM `register`' . $whereSql . ' ORDER BY `id` DESC'
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

$currentUserId = (int)($_SESSION['user_id'] ?? 0);
?>

<div style="display:flex;gap:10px;justify-content:space-between;align-items:center;flex-wrap:wrap;margin-bottom:14px;">
    <form method="GET" class="form-inline" style="margin-bottom:0;">
        <input type="text" name="q" placeholder="Search name/email..." value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
        <select name="role" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
            <option value="">Any role</option>
            <?php foreach ($allowedRoles as $r): ?>
                <option value="<?= htmlspecialchars($r, ENT_QUOTES, 'UTF-8') ?>" <?= $role === $r ? 'selected' : '' ?>><?= htmlspecialchars($r, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>
        <select name="limit" style="padding:10px 12px;border-radius:8px;border:1px solid #d1d5db;background:#ffffff;">
            <?php foreach ([10, 20, 50, 100] as $opt): ?>
                <option value="<?= (int)$opt ?>" <?= $limit === (int)$opt ? 'selected' : '' ?>><?= (int)$opt ?>/page</option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a class="btn" href="users.php" style="background:#6b7280;">Reset</a>
    </form>

    <a href="users_export.php<?= htmlspecialchars(admin_qs(), ENT_QUOTES, 'UTF-8') ?>" class="btn" style="background:#6b7280;">Export CSV</a>
</div>

<?php if ($dbError): ?>
    <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>

<?php if (!$rows): ?>
    <div class="alert alert-warn">No users found.</div>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) { ?>
            <?php
            $rowId = (int)($row['id'] ?? 0);
            $rowRole = (string)($row['RegisterAs'] ?? '');
            $canDelete = ($rowId > 0) && ($rowId !== $currentUserId) && (strcasecmp($rowRole, 'Admin') !== 0);
            ?>
            <tr>
                <td><?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['FullName'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string)$row['Email'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?php
                    $badgeClass = (strcasecmp($rowRole, 'Admin') === 0) ? 'badge-info' : 'badge-muted';
                    ?>
                    <span class="badge <?= htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars((string)$row['RegisterAs'], ENT_QUOTES, 'UTF-8') ?></span>
                    <?php if ($rowId === $currentUserId): ?>
                        <span class="badge badge-success" style="margin-left:6px;">You</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars((string)$row['createdat'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="table-actions">
                    <a href="edit_user.php?id=<?= urlencode((string)$row['id']) ?>">Edit</a>
                    <?php if ($canDelete): ?>
	                        <span class="sep">|</span>
	                        <form method="POST" action="delete_user.php" style="display:inline;" onsubmit="return confirm('Delete user?')">
	                            <input type="hidden" name="id" value="<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?>">
	                            <button type="submit" class="btn" style="padding:0;background:transparent;color:var(--primary);">Delete</button>
	                        </form>
	                    <?php endif; ?>
	                </td>
	            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination" style="margin-top:16px;display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
            <?php if ($pageNum > 1): ?>
                <a class="btn" href="<?= htmlspecialchars('users.php' . admin_qs(['page' => $pageNum - 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Prev</a>
            <?php endif; ?>
            <div style="color:#6b7280;font-size:13px;">
                Page <?= (int)$pageNum ?> / <?= (int)$totalPages ?> (<?= (int)$total ?> users)
            </div>
            <?php if ($pageNum < $totalPages): ?>
                <a class="btn" href="<?= htmlspecialchars('users.php' . admin_qs(['page' => $pageNum + 1]), ENT_QUOTES, 'UTF-8') ?>" style="background:#6b7280;">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php admin_layout_end(); ?>
