<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bag Store - Contact</title>
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
      <span class="section-tag">Contact us</span>
      <h1>We are here to help</h1>
      <p>Ask about products, orders, support or store details.</p>
    </div>
  </section>

  <section class="contact-layout reveal">
    <div class="contact-card hover-up">
      <h3>Send us a message</h3>
      <form class="contact-form">
        <input type="text" placeholder="Your Name" />
        <input type="email" placeholder="Your Email" />
        <input type="text" placeholder="Subject" />
        <textarea rows="6" placeholder="Write your message"></textarea>
        <button type="submit" class="btn btn-main">Send Message</button>
      </form>
    </div>

    <div class="contact-card hover-up">
      <h3>Store details</h3>
      <p><strong>Email:</strong> support@bagstore.com</p>
      <p><strong>Phone:</strong> +91 98765 43210</p>
      <p><strong>Address:</strong> Sector 70, Mohali, Punjab</p>
      <p><strong>Open:</strong> Monday to Saturday</p>
      <p><strong>Support time:</strong> 10 AM to 7 PM</p>
    </div>
  </section>

  <section class="section light-bg reveal">
    <div class="section-head">
      <span class="section-tag">Need answers?</span>
      <h2>Common questions</h2>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>How long is delivery?</h3>
        <p>Standard delivery usually takes 3 to 7 working days depending on location.</p>
      </div>
      <div class="info-card hover-up">
        <h3>Can I return a product?</h3>
        <p>Yes, easy return is available within the return period on eligible items.</p>
      </div>
      <div class="info-card hover-up">
        <h3>Do you help with product choice?</h3>
        <p>Yes, contact us and we can suggest the best bag for your daily need.</p>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Clean bag shopping with easy support and modern feel.</p>
      </div>
      <div>
        <h4>Pages</h4>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="bags.php">Bags</a>
      </div>
      <div>
        <h4>Shop</h4>
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

  <script src="js/script.js"></script>
</body>
</html>