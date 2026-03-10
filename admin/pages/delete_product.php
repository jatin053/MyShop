<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin('../');

require __DIR__ . '/../config.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if ($id <= 0) {
    header('Location: products.php');
    exit;
}

$image = null;
try {
    $stmt = mysqli_prepare($conn, 'SELECT `image` FROM `products` WHERE `id` = ? LIMIT 1');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = $res ? mysqli_fetch_assoc($res) : null;
    if (is_array($row) && !empty($row['image'])) {
        $image = (string)$row['image'];
    }

    $del = mysqli_prepare($conn, 'DELETE FROM `products` WHERE `id` = ?');
    mysqli_stmt_bind_param($del, 'i', $id);
    mysqli_stmt_execute($del);
} catch (mysqli_sql_exception $e) {
    // ignore and just redirect back
}

if ($image) {
    $path = __DIR__ . '/../uploads/' . $image;
    if (is_file($path)) {
        @unlink($path);
    }
}

header('Location: products.php');
exit;
