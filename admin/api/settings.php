<?php
declare(strict_types=1);

require_once __DIR__ . '/_auth.php';

$method = strtoupper((string)($_SERVER['REQUEST_METHOD'] ?? 'GET'));

try {
    $pdo = db();
    require_admin($pdo);

    if ($method === 'GET') {
        $stmt = $pdo->query('SELECT `id`, `site_name`, `admin_email`, `currency`, `updated_at` FROM `settings` WHERE `id` = 1 LIMIT 1');
        $row = $stmt->fetch();
        if (!$row) {
            $row = ['id' => 1, 'site_name' => '', 'admin_email' => '', 'currency' => 'INR', 'updated_at' => null];
        }
        respond(200, ['ok' => true, 'settings' => $row]);
    }

    if ($method === 'POST' || $method === 'PUT') {
        $data = read_json_body();
        $siteName = trim((string)($data['site_name'] ?? ''));
        $adminEmail = trim((string)($data['admin_email'] ?? ''));
        $currency = trim((string)($data['currency'] ?? ''));

        if ($adminEmail !== '' && !filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
            respond(422, ['ok' => false, 'error' => 'Invalid admin_email']);
        }
        if ($currency === '') {
            $currency = 'INR';
        }

        $stmt = $pdo->prepare(
            'INSERT INTO `settings` (`id`, `site_name`, `admin_email`, `currency`)
             VALUES (1, ?, ?, ?)
             ON DUPLICATE KEY UPDATE
               `site_name` = VALUES(`site_name`),
               `admin_email` = VALUES(`admin_email`),
               `currency` = VALUES(`currency`)'
        );
        $stmt->execute([$siteName, $adminEmail, $currency]);

        respond(200, ['ok' => true]);
    }

    respond(405, ['ok' => false, 'error' => 'Method not allowed']);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo instanceof PDO) {
        respond_server_error_with_db($e, $pdo);
    }
    respond_server_error($e);
}

