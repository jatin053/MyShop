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
            $stmt = $pdo->prepare('SELECT `id`, `FullName`, `Email`, `RegisterAs`, `createdat` FROM `register` WHERE `id` = ? LIMIT 1');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) {
                respond(404, ['ok' => false, 'error' => 'User not found']);
            }
            respond(200, ['ok' => true, 'user' => $row]);
        }

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 200;
        $limit = max(1, min(500, $limit));
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
        $offset = max(0, $offset);

        $stmt = $pdo->prepare(
            'SELECT `id`, `FullName`, `Email`, `RegisterAs`, `createdat`
             FROM `register`
             ORDER BY `id` DESC
             LIMIT ' . $limit . ' OFFSET ' . $offset
        );
        $stmt->execute();
        $rows = $stmt->fetchAll();
        respond(200, ['ok' => true, 'users' => $rows, 'limit' => $limit, 'offset' => $offset]);
    }

    if ($method === 'POST') {
        $data = read_json_body();

        $fullName = trim((string)($data['full_name'] ?? ''));
        $email = trim((string)($data['email'] ?? ''));
        $password = (string)($data['password'] ?? '');
        $role = 'User';

        if ($fullName === '') {
            respond(422, ['ok' => false, 'error' => 'full_name is required']);
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            respond(422, ['ok' => false, 'error' => 'Valid email is required']);
        }
        if (strlen($password) < 6) {
            respond(422, ['ok' => false, 'error' => 'Password must be at least 6 characters']);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO `register` (`FullName`, `Email`, `Password`, `RegisterAs`, `createdat`) VALUES (?, ?, ?, ?, NOW())');
        try {
            $stmt->execute([$fullName, $email, $hash, $role]);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Email already registered']);
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

        $fields = [];
        $params = [];

        if (array_key_exists('full_name', $data)) {
            $fullName = trim((string)$data['full_name']);
            if ($fullName === '') {
                respond(422, ['ok' => false, 'error' => 'full_name cannot be empty']);
            }
            $fields[] = '`FullName` = ?';
            $params[] = $fullName;
        }

        if (array_key_exists('email', $data)) {
            $email = trim((string)$data['email']);
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                respond(422, ['ok' => false, 'error' => 'Valid email is required']);
            }
            $fields[] = '`Email` = ?';
            $params[] = $email;
        }

        if (array_key_exists('password', $data)) {
            $password = (string)$data['password'];
            if (strlen($password) < 6) {
                respond(422, ['ok' => false, 'error' => 'Password must be at least 6 characters']);
            }
            $fields[] = '`Password` = ?';
            $params[] = password_hash($password, PASSWORD_DEFAULT);
        }

        if (!$fields) {
            respond(422, ['ok' => false, 'error' => 'Nothing to update']);
        }

        $params[] = $id;
        $sql = 'UPDATE `register` SET ' . implode(', ', $fields) . ' WHERE `id` = ?';
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute($params);
        } catch (Throwable $e) {
            if (is_mysql_duplicate_key($e)) {
                respond(409, ['ok' => false, 'error' => 'Email already registered']);
            }
            throw $e;
        }

        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'User not found']);
        }
        respond(200, ['ok' => true]);
    }

    if ($method === 'DELETE') {
        $data = read_json_body();
        $id = $id ?: (int)($data['id'] ?? 0);
        if ($id <= 0) {
            respond(422, ['ok' => false, 'error' => 'ID is required']);
        }

        $primaryAdminId = primary_admin_id($pdo);
        if ($primaryAdminId !== null && $id === $primaryAdminId) {
            respond(409, ['ok' => false, 'error' => 'Cannot delete admin user']);
        }

        $stmt = $pdo->prepare('DELETE FROM `register` WHERE `id` = ?');
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            respond(404, ['ok' => false, 'error' => 'User not found']);
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
