<?php
declare(strict_types=1);

require_once __DIR__ . '/auth_helpers.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/roles.php';
require_once __DIR__ . '/ui.php';

function admin_require_admin(string $sidebarBase = ''): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (($_SESSION['role'] ?? '') !== 'Admin') {
        $jwt = $_COOKIE['admin_jwt'] ?? '';
        if (is_string($jwt) && $jwt !== '') {
            $claims = jwt_verify_hs256($jwt, jwt_secret());
            if (is_array($claims) && (($claims['role'] ?? '') === 'Admin')) {
                $_SESSION['user_id'] = (int)($claims['sub'] ?? 0);
                $_SESSION['email'] = (string)($claims['email'] ?? '');
                $_SESSION['full_name'] = (string)($claims['name'] ?? '');
                $_SESSION['role'] = 'Admin';
            }
        }
    }

    // Enforce: only the oldest Admin user can access admin panel.
    if (($_SESSION['role'] ?? '') === 'Admin') {
        $currentId = (int)($_SESSION['user_id'] ?? 0);
        if ($currentId <= 0) {
            $_SESSION['role'] = 'User';
        } else {
            try {
                $pdo = db();
                $primaryAdminId = enforce_single_admin($pdo);
                if ($primaryAdminId === null || $currentId !== (int)$primaryAdminId) {
                    admin_forget_auth();
                }
            } catch (Throwable $ignored) {
                // If DB is unavailable, fall back to session/cookie check.
            }
        }
    }

    if (($_SESSION['role'] ?? '') !== 'Admin') {
        header('Location: ' . $sidebarBase . 'login.php');
        exit;
    }
}

function admin_layout_begin(array $opts = []): void
{
    $title = (string)($opts['title'] ?? 'Admin');
    $page = (string)($opts['page'] ?? '');
    $assetPrefix = (string)($opts['assetPrefix'] ?? 'assets');
    $sidebarBase = (string)($opts['sidebarBase'] ?? '');
    $requireAdmin = (bool)($opts['requireAdmin'] ?? true);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($requireAdmin) {
        admin_require_admin($sidebarBase);
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
        <link rel="stylesheet" href="<?= htmlspecialchars($assetPrefix, ENT_QUOTES, 'UTF-8') ?>/css/admin.css">
    </head>
    <body class="page-admin">
    <div class="wrapper">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li class="<?= $page === 'dashboard' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>index.php">Dashboard</a></li>
                <li class="<?= $page === 'products' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/products.php">Products</a></li>
                <li class="<?= $page === 'categories' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/categories.php">Categories</a></li>
                <li class="<?= $page === 'orders' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/orders.php">Orders</a></li>
                <li class="<?= $page === 'users' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/users.php">Users</a></li>
                <li class="<?= $page === 'coupons' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/coupons.php">Coupons</a></li>
                <li class="<?= $page === 'reviews' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/reviews.php">Reviews</a></li>
                <li class="<?= $page === 'reports' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/reports.php">Reports</a></li>
                <li class="<?= $page === 'settings' ? 'active' : '' ?>"><a href="<?= $sidebarBase ?>pages/settings.php">Settings</a></li>
                <li style="margin-top:20px;"><a href="<?= $sidebarBase ?>logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <h3><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3>
                <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
                    <a class="btn btn-primary" href="<?= htmlspecialchars($sidebarBase . 'website.php', ENT_QUOTES, 'UTF-8') ?>" style="padding:6px 12px;font-size:13px;">View Website</a>
                    <span style="color:#6b7280;font-size:13px;">
                        <?= htmlspecialchars((string)($_SESSION['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
            </div>
            <div class="content">
    <?php
}

function admin_layout_end(): void
{
    ?>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
