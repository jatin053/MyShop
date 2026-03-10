<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/auth_helpers.php';

admin_forget_auth();

header('Location: login.php');
exit;
