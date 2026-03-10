<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin('../');

require __DIR__ . '/../config.php';

$q = admin_get_string('q');
$role = admin_get_string('role');
$allowedRoles = ['Admin', 'User'];
if ($role !== '' && !in_array($role, $allowedRoles, true)) {
    $role = '';
}

try {
    $where = [];
    if ($q !== '') {
        $qEsc = mysqli_real_escape_string($conn, $q);
        $where[] = "(`FullName` LIKE '%{$qEsc}%' OR `Email` LIKE '%{$qEsc}%')";
    }
    if ($role !== '') {
        $roleEsc = mysqli_real_escape_string($conn, $role);
        $where[] = "`RegisterAs` = '{$roleEsc}'";
    }
    $whereSql = $where ? (' WHERE ' . implode(' AND ', $where)) : '';

    $res = mysqli_query(
        $conn,
        'SELECT `id`, `FullName`, `Email`, `RegisterAs`, `createdat` FROM `register`'
        . $whereSql . ' ORDER BY `id` DESC'
	    );
	    $rows = $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
	} catch (mysqli_sql_exception $e) {
	    http_response_code(500);
	    echo 'Database error: ' . $e->getMessage();
	    exit;
	}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="users.csv"');

$out = fopen('php://output', 'wb');
if ($out === false) {
    exit;
}

fputcsv($out, ['id', 'full_name', 'email', 'role', 'created_at']);
foreach ($rows as $r) {
    fputcsv($out, [
        $r['id'] ?? '',
        $r['FullName'] ?? '',
        $r['Email'] ?? '',
        $r['RegisterAs'] ?? '',
        $r['createdat'] ?? '',
    ]);
}
fclose($out);
exit;
