<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

$method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));

function money(string|float|int $v): string
{
    return number_format((float)$v, 2, '.', '');
}

try {
    $pdo = db();
    $user = require_auth($pdo);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($method === 'GET') {
        if (($user['role'] ?? '') !== 'Admin') {
            respond(403, ['ok' => false, 'error' => 'Forbidden']);
        }

        if ($id) {
            $stmt = $pdo->prepare(
                'SELECT o.*, r.`Email` AS `user_email`, r.`FullName` AS `user_full_name`
                 FROM `orders` o
                 LEFT JOIN `register` r ON r.`id` = o.`user_id`
                 WHERE o.`id` = ?
                 LIMIT 1'
            );
            $stmt->execute([$id]);
            $order = $stmt->fetch();
            if (!$order) {
                respond(404, ['ok' => false, 'error' => 'Order not found']);
            }

            $itemsStmt = $pdo->prepare('SELECT * FROM `order_items` WHERE `order_id` = ? ORDER BY `id` ASC');
            $itemsStmt->execute([$id]);
            $items = $itemsStmt->fetchAll();

            respond(200, ['ok' => true, 'order' => $order, 'items' => $items]);
        }

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
        $limit = max(1, min(200, $limit));
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
        $offset = max(0, $offset);

        $stmt = $pdo->prepare(
            'SELECT o.`id`, o.`user_id`, r.`Email` AS `user_email`, o.`total`, o.`status`, o.`created_at`
             FROM `orders` o
             LEFT JOIN `register` r ON r.`id` = o.`user_id`
             ORDER BY o.`id` DESC
             LIMIT ' . $limit . ' OFFSET ' . $offset
        );
        $stmt->execute();
        $orders = $stmt->fetchAll();

        respond(200, ['ok' => true, 'orders' => $orders, 'limit' => $limit, 'offset' => $offset]);
    }

    if ($method === 'POST') {
        $data = read_json_body();

        $items = $data['items'] ?? null;
        if (!is_array($items) || !$items) {
            respond(422, ['ok' => false, 'error' => 'Items are required']);
        }

        $requestedUserId = isset($data['user_id']) ? (int)$data['user_id'] : null;
        $userId = $requestedUserId ?: (int)$user['id'];

        if (($user['role'] ?? '') !== 'Admin' && $userId !== (int)$user['id']) {
            respond(403, ['ok' => false, 'error' => 'Cannot create order for another user']);
        }

        $couponCode = strtoupper(trim((string)($data['coupon_code'] ?? '')));

        $normalizedItems = [];
        $productIds = [];
        foreach ($items as $it) {
            if (!is_array($it)) {
                respond(422, ['ok' => false, 'error' => 'Invalid item']);
            }
            $pid = (int)($it['product_id'] ?? 0);
            $qty = (int)($it['quantity'] ?? 0);
            if ($pid <= 0 || $qty <= 0) {
                respond(422, ['ok' => false, 'error' => 'Each item needs product_id and quantity > 0']);
            }
            $normalizedItems[] = ['product_id' => $pid, 'quantity' => $qty];
            $productIds[$pid] = true;
        }

        $productIds = array_keys($productIds);

        $pdo->beginTransaction();
        try {
            // Lock products for stock updates
            $in = implode(',', array_fill(0, count($productIds), '?'));
            $pstmt = $pdo->prepare('SELECT `id`, `name`, `price`, `stock`, `status` FROM `products` WHERE `id` IN (' . $in . ') FOR UPDATE');
            $pstmt->execute($productIds);
            $products = [];
            foreach ($pstmt->fetchAll() as $p) {
                $products[(int)$p['id']] = $p;
            }

            $orderItems = [];
            $subtotal = 0.0;

            foreach ($normalizedItems as $it) {
                $pid = $it['product_id'];
                $qty = $it['quantity'];
                $p = $products[$pid] ?? null;
                if (!$p) {
                    respond(404, ['ok' => false, 'error' => "Product not found: {$pid}"]);
                }
                if (strcasecmp((string)$p['status'], 'Active') !== 0) {
                    respond(409, ['ok' => false, 'error' => "Product not active: {$pid}"]);
                }

                $stock = (int)$p['stock'];
                if ($stock < $qty) {
                    respond(409, ['ok' => false, 'error' => "Insufficient stock for product: {$pid}"]);
                }

                $unitPrice = (float)$p['price'];
                $lineTotal = $unitPrice * $qty;
                $subtotal += $lineTotal;

                $orderItems[] = [
                    'product_id' => $pid,
                    'product_name' => (string)$p['name'],
                    'unit_price' => money($unitPrice),
                    'quantity' => $qty,
                    'line_total' => money($lineTotal),
                ];
            }

            $couponId = null;
            $discountTotal = 0.0;

            if ($couponCode !== '') {
                $cstmt = $pdo->prepare('SELECT * FROM `coupons` WHERE `code` = ? AND `is_active` = 1 LIMIT 1');
                $cstmt->execute([$couponCode]);
                $coupon = $cstmt->fetch();
                if (!$coupon) {
                    respond(404, ['ok' => false, 'error' => 'Coupon not found']);
                }
                if (!empty($coupon['starts_at']) && strtotime((string)$coupon['starts_at'] . ' UTC') > time()) {
                    respond(409, ['ok' => false, 'error' => 'Coupon not started yet']);
                }
                if (!empty($coupon['ends_at']) && strtotime((string)$coupon['ends_at'] . ' UTC') <= time()) {
                    respond(409, ['ok' => false, 'error' => 'Coupon expired']);
                }
                if (!empty($coupon['max_uses']) && (int)$coupon['used_count'] >= (int)$coupon['max_uses']) {
                    respond(409, ['ok' => false, 'error' => 'Coupon usage limit reached']);
                }
                if (!empty($coupon['min_order_total']) && (float)$subtotal < (float)$coupon['min_order_total']) {
                    respond(409, ['ok' => false, 'error' => 'Order total too low for this coupon']);
                }

                $couponId = (int)$coupon['id'];
                $discountPct = (int)$coupon['discount'];
                $discountTotal = round($subtotal * ($discountPct / 100), 2);
            }

            $total = max(0.0, round($subtotal - $discountTotal, 2));

            $status = 'Pending';
            if (($user['role'] ?? '') === 'Admin' && isset($data['status'])) {
                $status = trim((string)$data['status']);
                if ($status === '') {
                    $status = 'Pending';
                }
            }

            $ostmt = $pdo->prepare(
                'INSERT INTO `orders` (`user_id`, `coupon_id`, `subtotal`, `discount_total`, `total`, `status`)
                 VALUES (?, ?, ?, ?, ?, ?)'
            );
            $ostmt->execute([$userId, $couponId, money($subtotal), money($discountTotal), money($total), $status]);
            $orderId = (int)$pdo->lastInsertId();

            $iStmt = $pdo->prepare(
                'INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `unit_price`, `quantity`, `line_total`)
                 VALUES (?, ?, ?, ?, ?, ?)'
            );
            foreach ($orderItems as $it) {
                $iStmt->execute([$orderId, $it['product_id'], $it['product_name'], $it['unit_price'], $it['quantity'], $it['line_total']]);
            }

            // Update stock
            $uStmt = $pdo->prepare('UPDATE `products` SET `stock` = `stock` - ? WHERE `id` = ?');
            foreach ($normalizedItems as $it) {
                $uStmt->execute([$it['quantity'], $it['product_id']]);
            }

            // Increment coupon usage
            if ($couponId !== null) {
                $pdo->prepare('UPDATE `coupons` SET `used_count` = `used_count` + 1 WHERE `id` = ?')->execute([$couponId]);
            }

            $pdo->commit();

            respond(201, ['ok' => true, 'order_id' => $orderId, 'total' => money($total)]);
        } catch (Throwable $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            throw $e;
        }
    }

    if ($method === 'PUT') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }
        if (($user['role'] ?? '') !== 'Admin') {
            respond(403, ['ok' => false, 'error' => 'Forbidden']);
        }

        $status = trim((string)($data['status'] ?? ''));
        if ($status === '') {
            respond(422, ['ok' => false, 'error' => 'Status is required']);
        }

        $stmt = $pdo->prepare('UPDATE `orders` SET `status` = ? WHERE `id` = ?');
        $stmt->execute([$status, $id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Order not found']);
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

