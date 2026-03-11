<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config.php';

function respond_json(int $status, array $data): void
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function make_image_url(?string $image): string
{
    $image = trim((string)$image);

    if ($image === '') {
        return 'https://via.placeholder.com/600x400?text=No+Image';
    }

    if (preg_match('~^https?://~i', $image)) {
        return $image;
    }

    return '/SHOP/admin/uploads/' . ltrim($image, '/');
}

try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
    $limit = max(1, min(200, $limit));

    if ($id > 0) {
        $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                LEFT JOIN categories c ON c.id = p.category_id
                WHERE p.id = ? AND p.status = 'Active'
                LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            respond_json(500, ['ok' => false, 'error' => 'Prepare failed']);
        }

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = $result ? mysqli_fetch_assoc($result) : null;

        if (!$product) {
            respond_json(404, ['ok' => false, 'error' => 'Product not found']);
        }

        $product['image_url'] = make_image_url($product['image'] ?? '');

        respond_json(200, [
            'ok' => true,
            'product' => $product
        ]);
    }

    if ($categoryId > 0) {
        $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                LEFT JOIN categories c ON c.id = p.category_id
                WHERE p.category_id = ? AND p.status = 'Active'
                ORDER BY p.id DESC
                LIMIT {$limit}";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            respond_json(500, ['ok' => false, 'error' => 'Prepare failed']);
        }

        mysqli_stmt_bind_param($stmt, 'i', $categoryId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                LEFT JOIN categories c ON c.id = p.category_id
                WHERE p.status = 'Active'
                ORDER BY p.id DESC
                LIMIT {$limit}";
        $result = mysqli_query($conn, $sql);
    }

    $products = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['image_url'] = make_image_url($row['image'] ?? '');
            $products[] = $row;
        }
    }

    respond_json(200, [
        'ok' => true,
        'products' => $products
    ]);
} catch (Throwable $e) {
    respond_json(500, [
        'ok' => false,
        'error' => 'Server error',
        'message' => $e->getMessage()
    ]);
}
