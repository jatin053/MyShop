<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

$method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));

function parse_decimal(mixed $value): ?string
{
    if (is_int($value) || is_float($value)) {
        return number_format((float)$value, 2, '.', '');
    }
    if (!is_string($value)) {
        return null;
    }
    $v = trim($value);
    if ($v === '') {
        return null;
    }
    if (!preg_match('/^\d+(\.\d{1,2})?$/', $v)) {
        return null;
    }
    return number_format((float)$v, 2, '.', '');
}

try {
    $pdo = db();
    require_admin($pdo);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($method === 'GET') {
        if ($id) {
            $stmt = $pdo->prepare(
                'SELECT p.*, c.`name` AS `category_name`
                 FROM `products` p
                 LEFT JOIN `categories` c ON c.`id` = p.`category_id`
                 WHERE p.`id` = ?
                 LIMIT 1'
            );
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) {
                respond(404, ['ok' => false, 'error' => 'Product not found']);
            }
            respond(200, ['ok' => true, 'product' => $row]);
        }

        $q = trim((string)($_GET['q'] ?? ''));
        $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $status = trim((string)($_GET['status'] ?? ''));

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
        $limit = max(1, min(200, $limit));
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
        $offset = max(0, $offset);

        $where = [];
        $params = [];

        if ($q !== '') {
            $where[] = 'p.`name` LIKE ?';
            $params[] = '%' . $q . '%';
        }
        if ($categoryId) {
            $where[] = 'p.`category_id` = ?';
            $params[] = $categoryId;
        }
        if ($status !== '') {
            $where[] = 'p.`status` = ?';
            $params[] = $status;
        }

        $sql = 'SELECT p.*, c.`name` AS `category_name`
                FROM `products` p
                LEFT JOIN `categories` c ON c.`id` = p.`category_id`';
        if ($where) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' ORDER BY p.`id` DESC LIMIT ' . $limit . ' OFFSET ' . $offset;

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        respond(200, ['ok' => true, 'products' => $rows, 'limit' => $limit, 'offset' => $offset]);
    }

    if ($method === 'POST') {
        $data = read_json_body();

        $name = trim((string)($data['name'] ?? ''));
        $description = trim((string)($data['description'] ?? ''));
        $price = parse_decimal($data['price'] ?? null);
        $stock = isset($data['stock']) ? (int)$data['stock'] : null;
        $status = trim((string)($data['status'] ?? 'Active'));
        $categoryId = isset($data['category_id']) ? (int)$data['category_id'] : null;
        $image = trim((string)($data['image'] ?? ''));

        if ($name === '') {
            respond(422, ['ok' => false, 'error' => 'Name is required']);
        }
        if ($price === null) {
            respond(422, ['ok' => false, 'error' => 'Valid price is required']);
        }
        if ($stock === null || $stock < 0) {
            respond(422, ['ok' => false, 'error' => 'Valid stock is required']);
        }
        if ($status === '') {
            $status = 'Active';
        }

        $stmt = $pdo->prepare(
            'INSERT INTO `products` (`category_id`, `name`, `description`, `price`, `stock`, `status`, `image`)
             VALUES (?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $categoryId ?: null,
            $name,
            $description !== '' ? $description : null,
            $price,
            $stock,
            $status,
            $image !== '' ? $image : null,
        ]);

        respond(201, ['ok' => true, 'id' => (int)$pdo->lastInsertId()]);
    }

    if ($method === 'PUT') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $fields = [];
        $params = [];

        if (array_key_exists('category_id', $data)) {
            $categoryId = (int)($data['category_id'] ?? 0);
            $fields[] = '`category_id` = ?';
            $params[] = $categoryId > 0 ? $categoryId : null;
        }

        if (array_key_exists('name', $data)) {
            $name = trim((string)$data['name']);
            if ($name === '') {
                respond(422, ['ok' => false, 'error' => 'Name cannot be empty']);
            }
            $fields[] = '`name` = ?';
            $params[] = $name;
        }

        if (array_key_exists('description', $data)) {
            $description = trim((string)$data['description']);
            $fields[] = '`description` = ?';
            $params[] = $description !== '' ? $description : null;
        }

        if (array_key_exists('price', $data)) {
            $price = parse_decimal($data['price']);
            if ($price === null) {
                respond(422, ['ok' => false, 'error' => 'Invalid price']);
            }
            $fields[] = '`price` = ?';
            $params[] = $price;
        }

        if (array_key_exists('stock', $data)) {
            $stock = (int)$data['stock'];
            if ($stock < 0) {
                respond(422, ['ok' => false, 'error' => 'Invalid stock']);
            }
            $fields[] = '`stock` = ?';
            $params[] = $stock;
        }

        if (array_key_exists('status', $data)) {
            $status = trim((string)$data['status']);
            if ($status === '') {
                respond(422, ['ok' => false, 'error' => 'Invalid status']);
            }
            $fields[] = '`status` = ?';
            $params[] = $status;
        }

        if (array_key_exists('image', $data)) {
            $image = trim((string)$data['image']);
            $fields[] = '`image` = ?';
            $params[] = $image !== '' ? $image : null;
        }

        if (!$fields) {
            respond(422, ['ok' => false, 'error' => 'Nothing to update']);
        }

        $params[] = $id;
        $sql = 'UPDATE `products` SET ' . implode(', ', $fields) . ' WHERE `id` = ?';

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Product not found']);
        }
        respond(200, ['ok' => true]);
    }

    if ($method === 'DELETE') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $stmt = $pdo->prepare('DELETE FROM `products` WHERE `id` = ?');
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Product not found']);
        }
        respond(200, ['ok' => true]);
    }

    respond(405, ['ok' => false, 'error' => 'Method not allowed']);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}

