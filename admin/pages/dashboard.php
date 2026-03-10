<?php
declare(strict_types=1);

$page = 'dashboard';
$title = 'Dashboard';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

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

// Fetch metrics
$totalOrders = safe_scalar($conn, 'SELECT COUNT(*) FROM `orders`', '0');
$totalUsers = safe_scalar($conn, 'SELECT COUNT(*) FROM `register`', '0');
$totalProducts = safe_scalar($conn, 'SELECT COUNT(*) FROM `products`', '0');
$totalRevenue = safe_scalar($conn, 'SELECT COALESCE(SUM(`total`),0) FROM `orders`', '0');

// Latest orders
$dbError = null;
$result = null;
try {
    $result = mysqli_query($conn, 'SELECT * FROM orders ORDER BY id DESC LIMIT 5');
} catch (mysqli_sql_exception $e) {
    $dbError = $e->getMessage();
}

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<div class="dashboard">
    <h1>Admin Dashboard</h1>

    <!-- Metrics Widgets -->
    <div class="metrics">
        <div class="card">
            <h2>Total Orders</h2>
            <p><?= htmlspecialchars($totalOrders, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="card">
            <h2>Total Users</h2>
            <p><?= htmlspecialchars($totalUsers, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="card">
            <h2>Total Products</h2>
            <p><?= htmlspecialchars($totalProducts, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="card">
            <h2>Total Revenue</h2>
            <p>&#8377;<?= htmlspecialchars($totalRevenue, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    </div>

    <!-- Latest Orders Table -->
    <h2>Latest Orders</h2>

    <?php if ($dbError): ?>
        <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
    <?php elseif (!$result || mysqli_num_rows($result) === 0): ?>
        <div class="alert alert-warn">No recent orders found.</div>
    <?php else: ?>
        <table class="dashboard-table">
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
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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

<?php admin_layout_end(); ?>
