<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bag Store - Wishlist</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>

    <nav class="nav">
      <a href="index.php">Home</a>

      <div class="dropdown">
        <a href="all-bags.php" class="drop-btn">
          Bags <span class="drop-icon">&#9662;</span>
        </a>

        <div class="dropdown-menu">
          <a href="all-bags.php">All Bags</a>
          <a href="travel-bags.php">Travel Bags</a>
          <a href="kids-bags.php">Kids Bags</a>
          <a href="school-bags.php">School Bags</a>
          <a href="college-bags.php">College Bags</a>
          <a href="office-bags.php">Office Bags</a>
          <a href="ladies-bags.php">Ladies Bags</a>
          <a href="laptop-bags.php">Laptop Bags</a>
          <a href="hand-bags.php">Hand Bags</a>
          <a href="tote-bags.php">Tote Bags</a>
          <a href="gym-bags.php">Gym Bags</a>
          <a href="party-bags.php">Party Bags</a>
          <a href="mini-bags.php">Mini Bags</a>
          <a href="trolley-bags.php">Trolley Bags</a>
        </div>
      </div>

      <a href="product.php">Product</a>
      <a href="about.php">About</a>
      <a href="wishlist.php" class="active">Wishlist</a>
      <a href="cart.php">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="nav-actions">
      <a href="/Shop/admin/login.php" class="auth-btn login-btn">Login</a>
      <a href="all-bags.php" class="mini-btn">Shop Now</a>
    </div>
  </header>

  <section class="page-banner reveal">
    <div class="page-banner-content">
      <span class="section-tag">Saved items</span>
      <h1>Your Wishlist</h1>
      <p>All the bags you saved with the heart button will appear here.</p>
    </div>
  </section>

  <section class="wishlist-shell reveal">
    <div class="wishlist-toolbar">
      <div>
        <span class="section-tag">Wishlist overview</span>
        <h2><span id="wishlistCount">0</span> item(s) saved</h2>
        <p>Keep your favorite products here and move them to cart whenever you are ready.</p>
      </div>

      <div class="wishlist-actions">
        <a href="all-bags.php" class="btn btn-light">Continue Shopping</a>
        <button type="button" class="btn btn-main" id="clearWishlistBtn">Clear Wishlist</button>
      </div>
    </div>

    <div id="wishlistItems" class="product-grid wishlist-grid"></div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Save, compare and shop your favorite bag styles with ease.</p>
      </div>

      <div>
        <h4>Pages</h4>
        <a href="index.php">Home</a>
        <a href="all-bags.php">Bags</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </div>

      <div>
        <h4>Shop</h4>
        <a href="selling.php?id=1">Product</a>
        <a href="wishlist.php">Wishlist</a>
        <a href="cart.php">Cart</a>
      </div>

      <div>
        <h4>Contact</h4>
        <p>Email: support@bagstore.com</p>
        <p>Phone: +91 98765 43210</p>
      </div>
    </div>
  </footer>

  <div class="toast" id="toast">Added to cart</div>
  <script src="js/script.js"></script>
</body>
</html>

