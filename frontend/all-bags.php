<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Bags - Bag Store</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>

    <nav class="nav">
      <a href="index.php">Home</a>

      <div class="dropdown">
        <a href="all-bags.php" class="drop-btn active">
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
      <span class="small-tag">Bag category</span>
      <h1>All Bags Collection</h1>
      <p>See all bag styles for office, college, travel and daily use in one place.</p>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Browse categories</span>
      <h2>Find your perfect bag faster</h2>
      <p>Choose a category directly or explore all products below.</p>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>Travel Bags</h3>
        <p>Spacious bags for trips and weekend travel.</p>
        <a href="travel-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>Office Bags</h3>
        <p>Professional styles with laptop-friendly sections.</p>
        <a href="office-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>College Bags</h3>
        <p>Daily use bags with comfort and useful storage.</p>
        <a href="college-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>Mini Bags</h3>
        <p>Compact, stylish and easy to carry anywhere.</p>
        <a href="mini-bags.php" class="btn btn-light small-btn">View More</a>
      </div>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Shop now</span>
      <h2>Popular bags from every type</h2>
      <p>Choose the style that matches your day best.</p>
    </div>

    <div class="product-grid">
      <div class="product-card hover-up">
        <img src="images/image1.jpg" alt="Classic Daily Bag">
        <div class="product-info">
          <h3>Classic Daily Bag</h3>
          <p>Simple design with enough space for daily items.</p>
          <div class="price-row">
            <span class="price">$49</span>
            <span class="old-price">$59</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Classic Daily Bag" data-price="49" data-image="images/image1.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image2.jpg" alt="Modern Office Bag">
        <div class="product-info">
          <h3>Modern Office Bag</h3>
          <p>Clean look with laptop section and smart storage.</p>
          <div class="price-row">
            <span class="price">$62</span>
            <span class="old-price">$76</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Modern Office Bag" data-price="62" data-image="images/image2.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image3.jpg" alt="Travel Weekender Bag">
        <div class="product-info">
          <h3>Travel Weekender Bag</h3>
          <p>Good space for short trips and easy carry.</p>
          <div class="price-row">
            <span class="price">$68</span>
            <span class="old-price">$81</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Travel Weekender Bag" data-price="68" data-image="images/image3.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image4.jpg" alt="Compact Hand Bag">
        <div class="product-info">
          <h3>Compact Hand Bag</h3>
          <p>Stylish daily bag with neat inside pockets.</p>
          <div class="price-row">
            <span class="price">$44</span>
            <span class="old-price">$54</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Compact Hand Bag" data-price="44" data-image="images/image4.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image5.jpg" alt="College Backpack">
        <div class="product-info">
          <h3>College Backpack</h3>
          <p>Comfortable backpack for books, gadgets and daily use.</p>
          <div class="price-row">
            <span class="price">$52</span>
            <span class="old-price">$63</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="College Backpack" data-price="52" data-image="images/image5.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image6.jpg" alt="Laptop Carry Bag">
        <div class="product-info">
          <h3>Laptop Carry Bag</h3>
          <p>Safe and smart option for work, meetings and office travel.</p>
          <div class="price-row">
            <span class="price">$74</span>
            <span class="old-price">$89</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Laptop Carry Bag" data-price="74" data-image="images/image6.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/schoolbag1.jpg" alt="Tote Style Bag">
        <div class="product-info">
          <h3>Tote Style Bag</h3>
          <p>Elegant bag for shopping, outing and casual daily wear.</p>
          <div class="price-row">
            <span class="price">$58</span>
            <span class="old-price">$70</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Tote Style Bag" data-price="58" data-image="images/schoolbag1.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/schoolbag2.jpg" alt="Gym Utility Bag">
        <div class="product-info">
          <h3>Gym Utility Bag</h3>
          <p>Strong and spacious bag for gym, shoes and accessories.</p>
          <div class="price-row">
            <span class="price">$61</span>
            <span class="old-price">$75</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Gym Utility Bag" data-price="61" data-image="images/schoolbag2.jpg">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section light-bg reveal">
    <div class="section-head">
      <span class="section-tag">Why choose us</span>
      <h2>Made for every kind of day</h2>
      <p>From work to travel, our collection is designed to fit your lifestyle.</p>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>Office use</h3>
        <p>Clean and useful bags for work and meetings.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Travel use</h3>
        <p>More room for clothes, chargers and daily items.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Daily use</h3>
        <p>Comfortable bags made for everyday life.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Stylish look</h3>
        <p>Modern designs that look good everywhere.</p>
      </div>
    </div>
  </section>

  <section class="newsletter reveal">
    <div class="newsletter-box">
      <div>
        <span class="section-tag">Stay connected</span>
        <h2>Get latest bag offers and updates</h2>
      </div>

      <form class="newsletter-form">
        <input type="email" placeholder="Enter your email" />
        <button type="submit" class="btn btn-main">Subscribe</button>
      </form>
    </div>
  </section>

  <section class="register-bottom">
    <div class="register-bottom-box">
      <h2>Like our bag collection?</h2>
      <p>Create your account and start shopping with us.</p>
      <a href="/Shop/admin/register.php" class="register-bottom-btn">Register Now</a>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Modern bags for office, college, travel and everyday life.</p>
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

