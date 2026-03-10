<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

function app_debug(): bool
{
    return (getenv('APP_DEBUG') ?: '1') === '1';
}

function respond(int $status, array $payload): never
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES);
    exit;
}

function require_method(string $method): void
{
    $req = $_SERVER['REQUEST_METHOD'] ?? '';
    if (strtoupper($req) !== strtoupper($method)) {
        respond(405, ['ok' => false, 'error' => 'Method not allowed']);
    }
}

function read_json_body(): array
{
    $raw = file_get_contents('php://input');
    if ($raw === false || trim($raw) === '') {
        return [];
    }

    $data = json_decode($raw, true);
    if (!is_array($data)) {
        respond(400, ['ok' => false, 'error' => 'Invalid JSON body']);
    }
    return $data;
}

function bearer_token(): ?string
{
    $auth = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '';
    if (!$auth) {
        return null;
    }
    if (preg_match('/^\s*Bearer\s+(.+)\s*$/i', $auth, $m) !== 1) {
        return null;
    }
    return $m[1] ?? null;
}

function base64url_encode(string $bytes): string
{
    return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
}

function now_plus_seconds(int $seconds): string
{
    return gmdate('Y-m-d H:i:s', time() + $seconds);
}

function respond_server_error(Throwable $e): never
{
    $message = 'Server error';
    $hint = null;

    if (app_debug()) {
        $message = $e->getMessage();
    }

    $raw = $e->getMessage();
    if (strpos($raw, 'auth_tokens') !== false && (strpos($raw, "doesn't exist") !== false || strpos($raw, 'does not exist') !== false)) {
        $hint = 'Create the tables (run admin/database/sql/shop.sql).';
    }

    respond(500, array_filter([
        'ok' => false,
        'error' => $message,
        'hint' => $hint,
    ], static fn ($v) => $v !== null));
}

function respond_server_error_with_db(Throwable $e, PDO $pdo): never
{
    $raw = $e->getMessage();
    $dbName = null;
    $authTokensFound = null;

    try {
        $dbName = (string)$pdo->query('SELECT DATABASE()')->fetchColumn();
    } catch (Throwable $ignored) {
        $dbName = null;
    }

    if (strpos($raw, 'auth_tokens') !== false) {
        try {
            $stmt = $pdo->query("SHOW TABLES LIKE 'auth_tokens'");
            $authTokensFound = (bool)$stmt->fetchColumn();
        } catch (Throwable $ignored) {
            $authTokensFound = null;
        }
    }

    $payload = [
        'ok' => false,
        'error' => app_debug() ? $raw : 'Server error',
    ];

    if ($dbName !== null) {
        $payload['db'] = $dbName;
    }
    if ($authTokensFound !== null) {
        $payload['auth_tokens_found'] = $authTokensFound;
    }

    if (strpos($raw, 'auth_tokens') !== false && $authTokensFound === false) {
        $payload['hint'] = 'Create the auth_tokens table in this database.';
    }

    respond(500, $payload);
}
