<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

$method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));

try {
    $pdo = db();
    require_admin($pdo);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($method === 'GET') {
        if ($id) {
            $stmt = $pdo->prepare('SELECT * FROM `coupons` WHERE `id` = ? LIMIT 1');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) {
                respond(404, ['ok' => false, 'error' => 'Coupon not found']);
            }
            respond(200, ['ok' => true, 'coupon' => $row]);
        }

        $rows = $pdo->query('SELECT * FROM `coupons` ORDER BY `id` DESC')->fetchAll();
        respond(200, ['ok' => true, 'coupons' => $rows]);
    }

    if ($method === 'POST') {
        $data = read_json_body();
        $code = strtoupper(trim((string)($data['code'] ?? '')));
        $discount = (int)($data['discount'] ?? 0);
        $isActive = isset($data['is_active']) ? (int)((bool)$data['is_active']) : 1;

        if ($code === '') {
            respond(422, ['ok' => false, 'error' => 'Code is required']);
        }
        if ($discount <= 0 || $discount > 100) {
            respond(422, ['ok' => false, 'error' => 'Discount must be 1-100']);
        }

        $stmt = $pdo->prepare('INSERT INTO `coupons` (`code`, `discount`, `is_active`) VALUES (?, ?, ?)');
        try {
            $stmt->execute([$code, $discount, $isActive]);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Coupon code already exists']);
            }
            throw $e;
        }

        respond(201, ['ok' => true, 'id' => (int)$pdo->lastInsertId()]);
    }

    if ($method === 'PUT') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $code = strtoupper(trim((string)($data['code'] ?? '')));
        $discount = isset($data['discount']) ? (int)$data['discount'] : null;
        $isActive = array_key_exists('is_active', $data) ? (int)((bool)$data['is_active']) : null;

        $fields = [];
        $params = [];

        if ($code !== '') {
            $fields[] = '`code` = ?';
            $params[] = $code;
        }
        if ($discount !== null) {
            if ($discount <= 0 || $discount > 100) {
                respond(422, ['ok' => false, 'error' => 'Discount must be 1-100']);
            }
            $fields[] = '`discount` = ?';
            $params[] = $discount;
        }
        if ($isActive !== null) {
            $fields[] = '`is_active` = ?';
            $params[] = $isActive;
        }

        if (!$fields) {
            respond(422, ['ok' => false, 'error' => 'Nothing to update']);
        }

        $params[] = $id;

        $sql = 'UPDATE `coupons` SET ' . implode(', ', $fields) . ' WHERE `id` = ?';
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Coupon code already exists']);
            }
            throw $e;
        }

        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Coupon not found']);
        }
        respond(200, ['ok' => true]);
    }

    if ($method === 'DELETE') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $stmt = $pdo->prepare('DELETE FROM `coupons` WHERE `id` = ?');
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Coupon not found']);
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

