<?php
declare(strict_types=1);

// Shared mysqli connection for admin pages under `admin/pages/*`.
// Defaults for typical WAMP setup. You can override via environment variables.
$dbHost = getenv('DB_HOST') ?: '127.0.0.1';
$dbName = getenv('DB_NAME') ?: 'myshop';
$dbUser = getenv('DB_USER') ?: 'root';
$dbPass = getenv('DB_PASS');
if ($dbPass === false) {
    $dbPass = '';
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect($dbHost, $dbUser, (string)$dbPass, $dbName);
mysqli_set_charset($conn, 'utf8mb4');
mysqli_query($conn, "SET time_zone = '+00:00'");
