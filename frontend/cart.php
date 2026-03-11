<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bag Store - Cart</title>
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
      <span class="section-tag">Your cart</span>
      <h1>Review your order</h1>
      <p>Check your selected bags before checkout.</p>
    </div>
  </section>

  <section class="cart-layout reveal">
    <div class="cart-list hover-up" id="cartItems">
      <div class="empty-cart">
        <h3>Your cart is empty</h3>
        <p>Add products from the bags page and they will appear here.</p>
        <a href="bags.php" class="btn btn-main">Go Shopping</a>
      </div>
    </div>

    <div class="cart-summary hover-up">
      <h3>Order Summary</h3>
      <div class="summary-row">
        <span>Items</span>
        <span id="itemCount">0</span>
      </div>
      <div class="summary-row">
        <span>Subtotal</span>
        <span id="subtotal">$0</span>
      </div>
      <div class="summary-row">
        <span>Delivery</span>
        <span>$5</span>
      </div>
      <div class="summary-row total">
        <span>Total</span>
        <span id="total">$5</span>
      </div>
      <a href="#" class="btn btn-main full-btn">Proceed to Checkout</a>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Need more?</span>
      <h2>You may want to add these</h2>
    </div>

    <div class="product-grid">
      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Bag">
        <div class="product-info">
          <h3>Classic Brown Bag</h3>
          <div class="price-row"><span class="price">$49</span></div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Classic Brown Bag" data-price="49" data-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=900&q=80" alt="Bag">
        <div class="product-info">
          <h3>Daily Backpack</h3>
          <div class="price-row"><span class="price">$44</span></div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Daily Backpack" data-price="44" data-image="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Modern shopping with clean design and quick cart flow.</p>
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
        <a href="wishlist.php">Wishlist</a>
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