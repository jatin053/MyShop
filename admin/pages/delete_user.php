<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin('../');

require __DIR__ . '/../config.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if ($id <= 0) {
    header('Location: users.php');
    exit;
}

// Prevent deleting yourself (avoid lockout).
if ((int)($_SESSION['user_id'] ?? 0) === $id) {
    header('Location: users.php');
    exit;
}

try {
    $check = mysqli_prepare($conn, 'SELECT `RegisterAs` FROM `register` WHERE `id` = ? LIMIT 1');
    mysqli_stmt_bind_param($check, 'i', $id);
    mysqli_stmt_execute($check);
    $res = mysqli_stmt_get_result($check);
    $row = $res ? mysqli_fetch_assoc($res) : null;
    $role = is_array($row) ? (string)($row['RegisterAs'] ?? '') : '';
    if (strcasecmp($role, 'Admin') === 0) {
        header('Location: users.php');
        exit;
    }

	    $stmt = mysqli_prepare($conn, 'DELETE FROM `register` WHERE `id` = ?');
	    mysqli_stmt_bind_param($stmt, 'i', $id);
	    mysqli_stmt_execute($stmt);
	} catch (mysqli_sql_exception $e) {
	    
	}

header('Location: users.php');
exit;
