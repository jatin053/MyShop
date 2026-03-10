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
            $stmt = $pdo->prepare('SELECT `id`, `name`, `created_at` FROM `categories` WHERE `id` = ? LIMIT 1');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) {
                respond(404, ['ok' => false, 'error' => 'Category not found']);
            }
            respond(200, ['ok' => true, 'category' => $row]);
        }

        $rows = $pdo->query('SELECT `id`, `name`, `created_at` FROM `categories` ORDER BY `id` DESC')->fetchAll();
        respond(200, ['ok' => true, 'categories' => $rows]);
    }

    if ($method === 'POST') {
        $data = read_json_body();
        $name = trim((string)($data['name'] ?? ''));
        if ($name === '') {
            respond(422, ['ok' => false, 'error' => 'Name is required']);
        }

        $stmt = $pdo->prepare('INSERT INTO `categories` (`name`) VALUES (?)');
        try {
            $stmt->execute([$name]);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Category already exists']);
            }
            throw $e;
        }

        respond(201, [
            'ok' => true,
            'id' => (int)$pdo->lastInsertId(),
        ]);
    }

    if ($method === 'PUT') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        $name = trim((string)($data['name'] ?? ''));
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }
        if ($name === '') {
            respond(422, ['ok' => false, 'error' => 'Name is required']);
        }

        $stmt = $pdo->prepare('UPDATE `categories` SET `name` = ? WHERE `id` = ?');
        try {
            $stmt->execute([$name, $id]);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Category name already exists']);
            }
            throw $e;
        }

        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Category not found']);
        }
        respond(200, ['ok' => true]);
    }

    if ($method === 'DELETE') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $stmt = $pdo->prepare('DELETE FROM `categories` WHERE `id` = ?');
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'Category not found']);
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

