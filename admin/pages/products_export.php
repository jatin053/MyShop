<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin('../');

require __DIR__ . '/../config.php';

$q = admin_get_string('q');
$status = admin_get_string('status');
$categoryId = admin_get_int('category_id', 0, 0);
$lowStock = admin_get_int('low_stock', 0, 0, 1) === 1;

$allowedStatuses = ['Active', 'Inactive'];
if ($status !== '' && !in_array($status, $allowedStatuses, true)) {
    $status = '';
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
        $stEsc = mysqli_real_escape_string($conn, $status);
        $where[] = "p.`status` = '{$stEsc}'";
    }
    if ($lowStock) {
        $where[] = 'p.`stock` <= 5';
    }

    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $sql = 'SELECT p.`id`, p.`name`, c.`name` AS `category_name`, p.`price`, p.`stock`, p.`status`, p.`created_at`
            FROM `products` p
            LEFT JOIN `categories` c ON c.`id` = p.`category_id`'
        . $whereSql
        . ' ORDER BY p.`id` DESC';

	    $res = mysqli_query($conn, $sql);
	    $rows = $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
	} catch (mysqli_sql_exception $e) {
	    http_response_code(500);
	    echo 'Database error: ' . $e->getMessage();
	    exit;
	}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="products.csv"');

$out = fopen('php://output', 'wb');
if ($out === false) {
    exit;
}

fputcsv($out, ['id', 'name', 'category', 'price', 'stock', 'status', 'created_at']);
foreach ($rows as $r) {
    fputcsv($out, [
        $r['id'] ?? '',
        $r['name'] ?? '',
        $r['category_name'] ?? '',
        $r['price'] ?? '',
        $r['stock'] ?? '',
        $r['status'] ?? '',
        $r['created_at'] ?? '',
    ]);
}
fclose($out);
exit;
