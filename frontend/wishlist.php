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
      <a href="index.php" class="active">Home</a>

      <div class="dropdown">
        <a href="bags.php" class="drop-btn">
          Bags <span class="drop-icon">▾</span>
        </a>

        <div class="dropdown-menu">
          <a href="bags.php?category=all">All Bags</a>
          <a href="bags.php?category=travel">Travel Bags</a>
          <a href="bags.php?category=kids">Kids Bags</a>
          <a href="bags.php?category=school">School Bags</a>
          <a href="bags.php?category=college">College Bags</a>
          <a href="bags.php?category=office">Office Bags</a>
          <a href="bags.php?category=laptop">Laptop Bags</a>
          <a href="bags.php?category=hand">Hand Bags</a>
          <a href="bags.php?category=tote">Tote Bags</a>
          <a href="bags.php?category=gym">Gym Bags</a>
          <a href="bags.php?category=party">Party Bags</a>
          <a href="bags.php?category=mini">Mini Bags</a>
          <a href="bags.php?category=trolley">Trolley Bags</a>
        </div>
      </div>

      <a href="product.php">Product</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="nav-actions">
      <a href="login.php" class="auth-btn login-btn">Login</a>
    </div>

    <div class="nav-actions">
      <a href="bags.php" class="mini-btn">Shop Now</a>
    </div>
  </header>

  <section class="page-banner reveal">
    <div>
      <span class="section-tag">Saved items</span>
      <h1>Your Wishlist</h1>
      <p>Keep your favorite bags in one simple place.</p>
    </div>
  </section>

  <section class="section reveal">
    <div class="product-grid">
      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Bag">
        <div class="product-info">
          <h3>Classic Brown Bag</h3>
          <p>Elegant look for daily and premium styling.</p>
          <div class="price-row"><span class="price">$49</span></div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Classic Brown Bag" data-price="49" data-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=900&q=80" alt="Bag">
        <div class="product-info">
          <h3>Office Leather Bag</h3>
          <p>Professional, premium and easy to carry.</p>
          <div class="price-row"><span class="price">$64</span></div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Office Leather Bag" data-price="64" data-image="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Bag">
        <div class="product-info">
          <h3>Travel Carry Bag</h3>
          <p>Spacious style for trips and weekend plans.</p>
          <div class="price-row"><span class="price">$68</span></div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Travel Carry Bag" data-price="68" data-image="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Save, compare and shop your favorite bag styles.</p>
      </div>
      <div>
        <h4>Pages</h4>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </div>
      <div>
        <h4>Shop</h4>
        <a href="bags.php">Bags</a>
        <a href="product.php">Product</a>
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