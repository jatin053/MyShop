<?php
declare(strict_types=1);

$page = 'dashboard';
$title = 'Dashboard';
$assetPrefix = 'assets';
$sidebarBase = '';

require_once __DIR__ . '/includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/config.php';

function safe_scalar(mysqli $conn, string $sql, string $default = '0'): string
{
    try {
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            return $default;
        }
        $row = mysqli_fetch_row($res);
        return $row ? (string)$row[0] : $default;
    } catch (mysqli_sql_exception $e) {
        return $default;
    }
}

$totalOrders = safe_scalar($conn, 'SELECT COUNT(*) FROM `orders`', '0');
$totalRevenue = safe_scalar($conn, 'SELECT COALESCE(SUM(`total`),0) FROM `orders`', '0');
$totalProducts = safe_scalar($conn, 'SELECT COUNT(*) FROM `products`', '0');
$totalUsers = safe_scalar($conn, 'SELECT COUNT(*) FROM `register`', '0');

$todayOrders = safe_scalar($conn, 'SELECT COUNT(*) FROM `orders` WHERE DATE(`created_at`) = UTC_DATE()', '0');
$todayRevenue = safe_scalar($conn, 'SELECT COALESCE(SUM(`total`),0) FROM `orders` WHERE DATE(`created_at`) = UTC_DATE()', '0');
$lowStockCount = safe_scalar($conn, 'SELECT COUNT(*) FROM `products` WHERE `stock` <= 5', '0');
$pendingReviews = safe_scalar($conn, "SELECT COUNT(*) FROM `reviews` WHERE `status` = 'Pending'", '0');

$dbError = null;
$latestOrders = null;
try {
    $latestOrders = mysqli_query($conn, 'SELECT `id`, `user_id`, `total`, `status`, `created_at` FROM `orders` ORDER BY `id` DESC LIMIT 5');
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

$recentUsers = [];
try {
    $res = mysqli_query($conn, 'SELECT `id`, `FullName`, `Email`, `RegisterAs`, `createdat` FROM `register` ORDER BY `id` DESC LIMIT 5');
    if ($res) {
        $recentUsers = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $ignored) {
    $recentUsers = [];
}

$lowStockProducts = [];
try {
    $res = mysqli_query($conn, "SELECT `id`, `name`, `stock`, `status` FROM `products` WHERE `stock` <= 5 ORDER BY `stock` ASC, `id` DESC LIMIT 5");
    if ($res) {
        $lowStockProducts = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $ignored) {
    $lowStockProducts = [];
}

$pendingReviewRows = [];
try {
    $res = mysqli_query(
        $conn,
        "SELECT rv.`id`, rv.`rating`, rv.`status`, rv.`created_at`, p.`name` AS `product_name`
         FROM `reviews` rv
         LEFT JOIN `products` p ON p.`id` = rv.`product_id`
         WHERE rv.`status` = 'Pending'
         ORDER BY rv.`id` DESC
         LIMIT 5"
    );
    if ($res) {
        $pendingReviewRows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $ignored) {
    $pendingReviewRows = [];
}

$topProducts = [];
try {
    $res = mysqli_query(
        $conn,
        'SELECT `product_name`, SUM(`quantity`) AS `qty`
         FROM `order_items`
         GROUP BY `product_name`
         ORDER BY `qty` DESC
         LIMIT 5'
    );
    if ($res) {
        $topProducts = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
} catch (mysqli_sql_exception $ignored) {
    $topProducts = [];
}

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<div class="grid">
    <div class="card">
        <h4>Total Orders</h4>
        <h2><?= htmlspecialchars($totalOrders, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Total Revenue</h4>
        <h2>&#8377;<?= htmlspecialchars($totalRevenue, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Total Products</h4>
        <h2><?= htmlspecialchars($totalProducts, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Total Users</h4>
        <h2><?= htmlspecialchars($totalUsers, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
</div>

<div class="grid">
    <div class="card">
        <h4>Today Orders (UTC)</h4>
        <h2><?= htmlspecialchars($todayOrders, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Today Revenue (UTC)</h4>
        <h2>&#8377;<?= htmlspecialchars($todayRevenue, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Low Stock (≤ 5)</h4>
        <h2><?= htmlspecialchars($lowStockCount, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>

    <div class="card">
        <h4>Pending Reviews</h4>
        <h2><?= htmlspecialchars($pendingReviews, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
</div>

<div class="card">
    <h4 style="margin-bottom:10px;">Latest Orders</h4>

    <?php if ($dbError): ?>
        <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
    <?php elseif (!$latestOrders || mysqli_num_rows($latestOrders) === 0): ?>
        <div class="alert alert-warn">No recent orders found.</div>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($latestOrders)) { ?>
                <tr>
                    <td>#<?= htmlspecialchars((string)$row['id'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$row['user_id'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>&#8377;<?= htmlspecialchars((string)$row['total'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$row['status'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$row['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="grid">
    <div class="card">
        <h4 style="margin-bottom:10px;">Recent Users</h4>
        <?php if (!$recentUsers): ?>
            <div class="alert alert-warn">No users found.</div>
        <?php else: ?>
            <table class="table" style="margin-top:0;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recentUsers as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)($u['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($u['FullName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($u['Email'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($u['createdat'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;">
                <a class="btn btn-primary" href="pages/users.php" style="padding:6px 12px;font-size:13px;">Manage Users</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <h4 style="margin-bottom:10px;">Low Stock Products</h4>
        <?php if (!$lowStockProducts): ?>
            <div class="alert alert-warn">No low stock products.</div>
        <?php else: ?>
            <table class="table" style="margin-top:0;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lowStockProducts as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)($p['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($p['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($p['stock'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($p['status'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;">
                <a class="btn btn-primary" href="pages/products.php" style="padding:6px 12px;font-size:13px;">Manage Products</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="grid">
    <div class="card">
        <h4 style="margin-bottom:10px;">Top Products</h4>
        <?php if (!$topProducts): ?>
            <div class="alert alert-warn">No sales data yet.</div>
        <?php else: ?>
            <table class="table" style="margin-top:0;">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($topProducts as $tp): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)($tp['product_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($tp['qty'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="card">
        <h4 style="margin-bottom:10px;">Pending Reviews</h4>
        <?php if (!$pendingReviewRows): ?>
            <div class="alert alert-warn">No pending reviews.</div>
        <?php else: ?>
            <table class="table" style="margin-top:0;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Rating</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pendingReviewRows as $rv): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)($rv['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($rv['product_name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($rv['rating'] ?? ''), ENT_QUOTES, 'UTF-8') ?>/5</td>
                        <td><?= htmlspecialchars((string)($rv['created_at'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div style="margin-top:10px;">
                <a class="btn btn-primary" href="pages/reviews.php" style="padding:6px 12px;font-size:13px;">Moderate Reviews</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php admin_layout_end(); ?>
