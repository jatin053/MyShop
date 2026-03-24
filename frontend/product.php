<?php
$products = [
  ["id" => 1, "name" => "Classic Daily Bag", "text" => "Simple design with enough space for daily items.", "price" => 49, "old" => 59, "img" => "images/image1.jpg"],
  ["id" => 2, "name" => "Modern Office Bag", "text" => "Clean look with laptop section and smart storage.", "price" => 62, "old" => 76, "img" => "images/image2.jpg"],
  ["id" => 3, "name" => "Travel Weekender Bag", "text" => "Good space for short trips and easy carry.", "price" => 68, "old" => 81, "img" => "images/image3.jpg"],
  ["id" => 4, "name" => "Compact Hand Bag", "text" => "Stylish daily bag with neat inside pockets.", "price" => 44, "old" => 54, "img" => "images/image4.jpg"],
  ["id" => 5, "name" => "College Backpack", "text" => "Comfortable backpack for books, gadgets and daily use.", "price" => 52, "old" => 63, "img" => "images/image5.jpg"],
  ["id" => 6, "name" => "Laptop Carry Bag", "text" => "Safe and smart option for work, meetings and office travel.", "price" => 74, "old" => 89, "img" => "images/image6.jpg"]
];

function rs($value) {
  return "&#8377;" . number_format($value);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products - BagStore</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="catalog-page">
  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="all-bags.php">Bags</a>
      <a href="product.php" class="active">Products</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>
    <div class="nav-actions">
      <a href="/Shop/admin/login.php" class="auth-btn login-btn">Login</a>
      <a href="selling.php?id=1" class="mini-btn">View Product</a>
    </div>
  </header>

  <main class="catalog-shell">
    <section class="catalog-hero reveal">
      <span class="section-tag">Products</span>
      <h1>All products in one clean grid</h1>
      <p>Simple cards, clean photos and quick access to the full product page.</p>
    </section>

    <section class="product-grid reveal">
      <?php foreach ($products as $item): ?>
        <article class="product-card hover-up">
          <img src="<?php echo htmlspecialchars($item["img"]); ?>" alt="<?php echo htmlspecialchars($item["name"]); ?>">
          <button class="wish-btn" type="button" aria-label="Save <?php echo htmlspecialchars($item["name"]); ?> to wishlist">♥</button>
          <div class="product-info">
            <h3><?php echo htmlspecialchars($item["name"]); ?></h3>
            <p><?php echo htmlspecialchars($item["text"]); ?></p>
            <div class="price-row">
              <span class="price"><?php echo rs($item["price"]); ?></span>
              <span class="old-price"><?php echo rs($item["old"]); ?></span>
            </div>
            <div class="card-actions">
              <a href="selling.php?id=<?php echo (int) $item["id"]; ?>" class="btn btn-light">Buy Now</a>
              <button class="btn btn-main add-cart" data-name="<?php echo htmlspecialchars($item["name"]); ?>" data-price="<?php echo htmlspecialchars($item["price"]); ?>" data-image="<?php echo htmlspecialchars($item["img"]); ?>">Add to Cart</button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </section>
  </main>

  <script src="js/script.js"></script>
</body>
</html>
