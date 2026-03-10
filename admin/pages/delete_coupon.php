<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin('../');

require __DIR__ . '/../config.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if ($id <= 0) {
    header('Location: coupons.php');
    exit;
}

	try {
	    $stmt = mysqli_prepare($conn, 'DELETE FROM `coupons` WHERE `id` = ?');
	    mysqli_stmt_bind_param($stmt, 'i', $id);
	    mysqli_stmt_execute($stmt);
	} catch (mysqli_sql_exception $e) {
	    // ignore
	}

header('Location: coupons.php');
exit;
