<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

$method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));

try {
    $pdo = db();
    $user = require_auth($pdo);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($method === 'GET') {
        if (($user['role'] ?? '') !== 'Admin') {
            respond(403, ['ok' => false, 'error' => 'Forbidden']);
        }

        if ($id) {
            $stmt = $pdo->prepare('SELECT * FROM `reviews` WHERE `id` = ? LIMIT 1');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) {
                respond(404, ['ok' => false, 'error' => 'Review not found']);
            }
            respond(200, ['ok' => true, 'review' => $row]);
        }

        $status = trim((string)($_GET['status'] ?? ''));
        $productId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : null;

        $where = [];
        $params = [];
        if ($status !== '') {
            $where[] = '`status` = ?';
            $params[] = $status;
        }
        if ($productId) {
            $where[] = '`product_id` = ?';
            $params[] = $productId;
        }

        $sql = 'SELECT * FROM `reviews`';
        if ($where) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' ORDER BY `id` DESC';

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        respond(200, ['ok' => true, 'reviews' => $rows]);
    }

    if ($method === 'POST') {
        $data = read_json_body();

        $productId = (int)($data['product_id'] ?? 0);
        $rating = (int)($data['rating'] ?? 0);
        $comment = trim((string)($data['comment'] ?? ''));

        if ($productId <= 0) {
            respond(422, ['ok' => false, 'error' => 'product_id is required']);
        }
        if ($rating < 1 || $rating > 5) {
            respond(422, ['ok' => false, 'error' => 'rating must be 1-5']);
        }

        // Ensure product exists
        $pstmt = $pdo->prepare('SELECT `id` FROM `products` WHERE `id` = ? LIMIT 1');
        $pstmt->execute([$productId]);
        if (!$pstmt->fetch()) {
            respond(404, ['ok' => false, 'error' => 'Product not found']);
        }

        $stmt = $pdo->prepare('INSERT INTO `reviews` (`product_id`, `user_id`, `rating`, `comment`, `status`) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$productId, (int)$user['id'], $rating, $comment !== '' ? $comment : null, 'Pending']);

        respond(201, ['ok' => true, 'id' => (int)$pdo->lastInsertId()]);
    }

    if ($method === 'PUT') {
        if (($user['role'] ?? '') !== 'Admin') {
            respond(403, ['ok' => false, 'error' => 'Forbidden']);
        }

        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $status = trim((string)($data['status'] ?? ''));
        if ($status === '') {
            respond(422, ['ok' => false, 'error' => 'Status is required']);
        }

        $stmt = $pdo->prepare('UPDATE `reviews` SET `status` = ? WHERE `id` = ?');
        $stmt->execute([$status, $id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Review not found']);
        }
        respond(200, ['ok' => true]);
    }

    if ($method === 'DELETE') {
        if (($user['role'] ?? '') !== 'Admin') {
            respond(403, ['ok' => false, 'error' => 'Forbidden']);
        }

        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $stmt = $pdo->prepare('DELETE FROM `reviews` WHERE `id` = ?');
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Review not found']);
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

