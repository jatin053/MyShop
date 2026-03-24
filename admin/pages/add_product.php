<?php
declare(strict_types=1);

$page = 'products';
$title = 'Add Product';
$assetPrefix = '../assets';
$sidebarBase = '../';

require_once __DIR__ . '/../includes/layout.php';
admin_require_admin($sidebarBase);

require __DIR__ . '/../config.php';

$errors = [];
$dbError = null;

$values = [
    'name' => '',
    'category_id' => '',
    'price' => '',
    'stock' => '',
    'status' => 'Active',
    'description' => '',
];

function load_categories(mysqli $conn): array
{
    try {
        $res = mysqli_query($conn, 'SELECT `id`, `name` FROM `categories` ORDER BY `name` ASC');
        return $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
    } catch (mysqli_sql_exception $e) {
        return [];
    }
}

$categories = load_categories($conn);

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $values['name'] = trim((string)($_POST['name'] ?? ''));
    $values['category_id'] = trim((string)($_POST['category_id'] ?? ''));
    $values['price'] = trim((string)($_POST['price'] ?? ''));
    $values['stock'] = trim((string)($_POST['stock'] ?? ''));
    $values['status'] = trim((string)($_POST['status'] ?? 'Active'));
    $values['description'] = trim((string)($_POST['description'] ?? ''));

    if ($values['name'] === '') {
        $errors[] = 'Name is required.';
    }
    if ($values['price'] === '' || !is_numeric($values['price']) || (float)$values['price'] < 0) {
        $errors[] = 'Valid price is required.';
    }
    if ($values['stock'] === '' || !ctype_digit($values['stock']) || (int)$values['stock'] < 0) {
        $errors[] = 'Valid stock is required.';
    }
    if (!in_array($values['status'], ['Active', 'Inactive'], true)) {
        $errors[] = 'Status must be Active or Inactive.';
    }

    $categoryId = null;
    if ($values['category_id'] !== '') {
        $categoryId = (int)$values['category_id'];
        if ($categoryId <= 0) {
            $errors[] = 'Invalid category.';
        }
    }

    $imageName = null;
    if (!$errors && isset($_FILES['image']) && is_array($_FILES['image'])) {
        $file = $_FILES['image'];
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
            if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
                $errors[] = 'Image upload failed.';
            } else {
                $tmp = (string)($file['tmp_name'] ?? '');
                $orig = (string)($file['name'] ?? '');
                $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (!in_array($ext, $allowed, true)) {
                    $errors[] = 'Image must be jpg, jpeg, png, or webp.';
                } else {
                    $imageName = time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                    $destDir = __DIR__ . '/../uploads';
                    if (!is_dir($destDir)) {
                        @mkdir($destDir, 0775, true);
                    }
                    $dest = $destDir . '/' . $imageName;
                    if (!move_uploaded_file($tmp, $dest)) {
                        $errors[] = 'Could not save uploaded image.';
                        $imageName = null;
                    }
                }
            }
        }
    }

    if (!$errors) {
        try {
            $stmt = mysqli_prepare(
                $conn,
                'INSERT INTO `products` (`category_id`, `name`, `description`, `price`, `stock`, `status`, `image`)
                 VALUES (?, ?, ?, ?, ?, ?, ?)'
            );
            $desc = $values['description'] !== '' ? $values['description'] : null;
            $price = (float)$values['price'];
            $stock = (int)$values['stock'];
            $status = $values['status'];
            mysqli_stmt_bind_param($stmt, 'issdiss', $categoryId, $values['name'], $desc, $price, $stock, $status, $imageName);
            mysqli_stmt_execute($stmt);

            header('Location: products.php');
            exit;
        } catch (mysqli_sql_exception $e) {
            $dbError = $e->getMessage();
        }
    }
}

admin_layout_begin([
    'title' => $title,
    'page' => $page,
    'assetPrefix' => $assetPrefix,
    'sidebarBase' => $sidebarBase,
]);
?>

<?php if ($dbError): ?>
    <div class="alert alert-error">Database error: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>

<?php if ($errors): ?>
    <div class="alert alert-error">
        <ul style="margin-left:18px;">
            <?php foreach ($errors as $err): ?>
                <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="form">
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($values['name'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Category</label>
    <select name="category_id">
        <option value="">-- None --</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars((string)$cat['id'], ENT_QUOTES, 'UTF-8') ?>" <?= (string)$values['category_id'] === (string)$cat['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars((string)$cat['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Price</label>
    <input type="number" name="price" step="0.01" min="0" value="<?= htmlspecialchars($values['price'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Stock</label>
    <input type="number" name="stock" min="0" value="<?= htmlspecialchars($values['stock'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label>Status</label>
    <select name="status" required>
        <option value="Active" <?= $values['status'] === 'Active' ? 'selected' : '' ?>>Active</option>
        <option value="Inactive" <?= $values['status'] === 'Inactive' ? 'selected' : '' ?>>Inactive</option>
    </select>

    <label>Description</label>
    <textarea name="description" rows="5"><?= htmlspecialchars($values['description'], ENT_QUOTES, 'UTF-8') ?></textarea>

    <label>Image</label>
    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">

    <div style="margin-top:14px;display:flex;gap:10px;">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn" href="products.php" style="background:#6b7280;">Cancel</a>
    </div>
</form>


<?php admin_layout_end(); ?>
