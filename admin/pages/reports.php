<?php
declare(strict_types=1);

$page = 'reports';
$title = 'Reports';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

function safe_scalar(mysqli $conn, string $sql): ?string
{
    try {
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            return null;
        }
        $row = mysqli_fetch_row($res);
        return $row ? (string)$row[0] : null;
    } catch (mysqli_sql_exception $e) {
        return null;
    }
}

$totalUsers = safe_scalar($conn, 'SELECT COUNT(*) FROM `register`') ?? '0';
$totalOrders = safe_scalar($conn, 'SELECT COUNT(*) FROM `orders`') ?? '0';
$totalProducts = safe_scalar($conn, 'SELECT COUNT(*) FROM `products`') ?? '0';
$totalRevenue = safe_scalar($conn, 'SELECT COALESCE(SUM(total),0) FROM `orders`') ?? '0';

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<div class="grid">
    <div class="card">
        <h4>Total Users</h4>
        <h2><?= htmlspecialchars($totalUsers, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
    <div class="card">
        <h4>Total Orders</h4>
        <h2><?= htmlspecialchars($totalOrders, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
    <div class="card">
        <h4>Total Products</h4>
        <h2><?= htmlspecialchars($totalProducts, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
    <div class="card">
        <h4>Total Revenue</h4>
        <h2>&#8377;<?= htmlspecialchars($totalRevenue, ENT_QUOTES, 'UTF-8') ?></h2>
    </div>
</div>

<?php admin_layout_end(); ?>
