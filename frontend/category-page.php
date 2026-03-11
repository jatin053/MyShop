<?php
require_once __DIR__ . '/includes/data.php';

if (!isset($pageKey) || !isset($siteCategories[$pageKey])) {
    $pageKey = 'all';
}

$page = $siteCategories[$pageKey];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($page['title']); ?> - Bag Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="page-shell">
    <div class="top-bar">Bag styles for travel, study, work, and daily use.</div>

    <div class="site-wrap">
        <aside class="side-box">
            <div class="brand">
                <div class="brand-mark">B</div>
                <div class="brand-text">
                    <h1>Bag Store</h1>
                    <p>Simple bag pages with one shared style file</p>
                </div>
            </div>

            <a class="home-link" href="index.php">← Back to home</a>

            <div class="side-title">Bag pages</div>

            <ul class="category-list">
                <?php foreach ($siteCategories as $key => $category): ?>
                    <li>
                        <a class="category-link <?= $key === $pageKey ? 'active' : ''; ?>" href="<?= h($category['file']); ?>">
                            <strong><?= h($category['title']); ?></strong>
                            <span><?= h($category['short']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="note-box">
                <p>These pages use only bag images and simple text. Each bag type opens in its own PHP file.</p>
            </div>
        </aside>

        <main class="main-area">
            <section class="page-top">
                <div class="page-top-grid">
                    <div class="text-pane">
                        <span class="small-label">Bag Category</span>
                        <h2><?= h($page['title']); ?></h2>
                        <p><?= h($page['desc']); ?></p>

                        <div class="info-row">
                            <div class="info-chip">Different page for each bag type</div>
                            <div class="info-chip">One CSS file for all pages</div>
                            <div class="info-chip">Only bag images used</div>
                        </div>
                    </div>

                    <div class="image-pane">
                        <div class="image-card">
                            <img src="<?= bag_svg($page['imageType'], $page['title']); ?>" alt="<?= h($page['title']); ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section class="tools-bar">
                <div class="tools-left">
                    <h3>Pick a bag you like</h3>
                    <p>Use the search box to find a bag name or type on this page.</p>
                </div>

                <div class="search-box">
                    <span class="search-icon">⌕</span>
                    <input id="pageSearch" type="text" placeholder="Search bags on this page">
                </div>
            </section>

            <section class="bag-grid">
                <?php foreach ($page['items'] as $item): ?>
                    <article class="card">
                        <div class="card-media">
                            <img src="<?= bag_svg($item['img'], $item['tag']); ?>" alt="<?= h($item['name']); ?>">
                        </div>

                        <div class="card-body">
                            <span class="card-tag"><?= h($item['tag']); ?></span>
                            <h3><?= h($item['name']); ?></h3>
                            <p><?= h($item['text']); ?></p>

                            <div class="card-meta">
                                <div class="price"><?= h($item['price']); ?></div>
                                <a class="card-btn" href="#">View Bag</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>

            <div class="no-match">No bag found with that search. Try another word.</div>

            <footer class="page-foot">
                <p>Made for <strong><?= h($page['title']); ?></strong> page • <span id="currentYear"></span></p>
            </footer>
        </main>
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>