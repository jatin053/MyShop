<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

require_method('GET');

try {
    $pdo = db();
    require_admin($pdo);

    $totalUsers = (int)$pdo->query('SELECT COUNT(*) FROM `register`')->fetchColumn();
    $totalOrders = (int)$pdo->query('SELECT COUNT(*) FROM `orders`')->fetchColumn();
    $totalProducts = (int)$pdo->query('SELECT COUNT(*) FROM `products`')->fetchColumn();
    $totalRevenue = (string)$pdo->query('SELECT COALESCE(SUM(`total`),0) FROM `orders`')->fetchColumn();

    respond(200, [
        'ok' => true,
        'summary' => [
            'total_users' => $totalUsers,
            'total_orders' => $totalOrders,
            'total_products' => $totalProducts,
            'total_revenue' => $totalRevenue,
        ],
    ]);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}

