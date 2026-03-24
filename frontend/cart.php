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
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php" class="active">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="nav-actions">
      <a href="/Shop/admin/login.php" class="auth-btn login-btn">Login</a>
      <a href="all-bags.php" class="mini-btn">Shop Now</a>
    </div>
  </header>

  <section class="page-banner reveal">
    <div class="page-banner-content">
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
        <a href="all-bags.php" class="btn btn-main">Go Shopping</a>
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
      <a href="all-bags.php" class="btn btn-light full-btn continue-btn">Continue Shopping</a>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Need more?</span>
      <h2>You may want to add these</h2>
      <p>Add some more popular styles before checkout.</p>
    </div>

    <div class="product-grid">
      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Classic Brown Bag">
        <div class="product-info">
          <h3>Classic Brown Bag</h3>
          <div class="price-row">
            <span class="price">$49</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart"
              data-name="Classic Brown Bag"
              data-price="49"
              data-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80">
              Add to Cart
            </button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=900&q=80" alt="Daily Backpack">
        <div class="product-info">
          <h3>Daily Backpack</h3>
          <div class="price-row">
            <span class="price">$44</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart"
              data-name="Daily Backpack"
              data-price="44"
              data-image="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=500&q=80">
              Add to Cart
            </button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=900&q=80" alt="Office Carry Bag">
        <div class="product-info">
          <h3>Office Carry Bag</h3>
          <div class="price-row">
            <span class="price">$58</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart"
              data-name="Office Carry Bag"
              data-price="58"
              data-image="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=500&q=80">
              Add to Cart
            </button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Travel Duffel Bag">
        <div class="product-info">
          <h3>Travel Duffel Bag</h3>
          <div class="price-row">
            <span class="price">$66</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart"
              data-name="Travel Duffel Bag"
              data-price="66"
              data-image="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="newsletter reveal">
    <div class="newsletter-box">
      <div>
        <span class="section-tag">Stay updated</span>
        <h2>Get deals on your next bag</h2>
      </div>

      <form class="newsletter-form">
        <input type="email" placeholder="Enter your email" />
        <button type="submit" class="btn btn-main">Subscribe</button>
      </form>
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
        <a href="all-bags.php">Bags</a>
        <a href="product.php">Product</a>
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

