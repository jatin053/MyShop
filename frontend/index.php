<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bag Store - Home</title>
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
          <a href="all-bags.php?category=all">All Bags</a>
          <a href="travel-bags.php?category=travel">Travel Bags</a>
          <a href="kids-bags.php?category=kids">Kids Bags</a>
          <a href="school-bags.php?category=school">School Bags</a>
          <a href="college-bags.php?category=college">College Bags</a>
          <a href="office-bags.php?category=office">Office Bags</a>
          <a href="ladies-bags.php?category=ladies">Ladies Bags</a>
          <a href="laptop-bags.php?category=laptop">Laptop Bags</a>
          <a href="hand-bags.php?category=hand">Hand Bags</a>
          <a href="tote-bags.php?category=tote">Tote Bags</a>
          <a href="gym-bags.php?category=gym">Gym Bags</a>
          <a href="party-bags.php?category=party">Party Bags</a>
          <a href="mini-bags.php?category=mini">Mini Bags</a>
          <a href="trolley-bags.php?category=trolley">Trolley Bags</a>
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

  <section class="slider-section reveal">
    <div class="slider">
      <div class="slide active">
        <div class="slide-text">
          <span class="small-tag">New arrival</span>
          <h1>Smart bags made for daily life</h1>
          <p>Stylish designs for office, college, travel and everyday comfort.</p>
          <div class="hero-buttons">
            <a href="bags.php" class="btn btn-main">Shop Collection</a>
            <a href="about.php" class="btn btn-light">Know Our Story</a>
          </div>
        </div>
        <div class="slide-image">
          <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=1200&q=80" alt="Bag">
        </div>
      </div>

      <div class="slide">
        <div class="slide-text">
          <span class="small-tag">Office edit</span>
          <h1>Premium office bags with clean look</h1>
          <p>Carry your laptop, notebook and essentials with style and comfort.</p>
          <div class="hero-buttons">
            <a href="bags.php" class="btn btn-main">View Office Bags</a>
            <a href="product.php" class="btn btn-light">View Product</a>
          </div>
        </div>
        <div class="slide-image">
          <img src="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=1200&q=80" alt="Office bag">
        </div>
      </div>

      <div class="slide">
        <div class="slide-text">
          <span class="small-tag">Travel line</span>
          <h1>Travel bags with more space and easy carry</h1>
          <p>Designed for quick trips, long days and better storage everywhere.</p>
          <div class="hero-buttons">
            <a href="bags.php" class="btn btn-main">Explore Travel Bags</a>
            <a href="contact.php" class="btn btn-light">Talk to Us</a>
          </div>
        </div>
        <div class="slide-image">
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1200&q=80" alt="Travel bag">
        </div>
      </div>

      <button class="slider-arrow prev">&#10094;</button>
      <button class="slider-arrow next">&#10095;</button>
      <div class="slider-dots"></div>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Our types</span>
      <h2>Find the right bag by use</h2>
      <p>Choose from designs made for work, city life, college and travel.</p>
    </div>

    <div class="card-grid four-grid">
      <div class="category-card hover-up">
        <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=900&q=80" alt="Hand bags">
        <div class="card-body">
          <h3>Hand Bags</h3>
          <p>Minimal and stylish pieces for daily looks.</p>
        </div>
      </div>

      <div class="category-card hover-up">
        <img src="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=900&q=80" alt="Backpacks">
        <div class="card-body">
          <h3>Backpacks</h3>
          <p>Made for college, work and comfort on the move.</p>
        </div>
      </div>

      <div class="category-card hover-up">
        <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=900&q=80" alt="Mini bags">
        <div class="card-body">
          <h3>Mini Bags</h3>
          <p>Small size, clean fashion and easy carrying style.</p>
        </div>
      </div>

      <div class="category-card hover-up">
        <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=900&q=80" alt="Travel bags">
        <div class="card-body">
          <h3>Travel Bags</h3>
          <p>More room, stronger body and smooth travel support.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section light-bg reveal">
    <div class="section-head">
      <span class="section-tag">Featured now</span>
      <h2>Bags people are buying most</h2>
      <p>Best selling styles with premium look and useful space.</p>
    </div>

    <div class="product-grid">
      <div class="product-card hover-up">
        <span class="badge">New</span>
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Brown bag">
        <div class="product-info">
          <h3>Classic Brown Bag</h3>
          <p>Elegant shape with neat inner storage.</p>
          <div class="price-row">
            <span class="price">$49</span>
            <span class="old-price">$61</span>
          </div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Classic Brown Bag" data-price="49" data-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <span class="badge">Top</span>
        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=900&q=80" alt="Black bag">
        <div class="product-info">
          <h3>Modern Black Bag</h3>
          <p>Clean office style with easy laptop carry.</p>
          <div class="price-row">
            <span class="price">$59</span>
            <span class="old-price">$72</span>
          </div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Modern Black Bag" data-price="59" data-image="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <span class="badge">-20%</span>
        <img src="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=900&q=80" alt="Office bag">
        <div class="product-info">
          <h3>Office Leather Bag</h3>
          <p>Sharp design for everyday professional use.</p>
          <div class="price-row">
            <span class="price">$64</span>
            <span class="old-price">$80</span>
          </div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Office Leather Bag" data-price="64" data-image="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <span class="badge">Hot</span>
        <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Travel carry bag">
        <div class="product-info">
          <h3>Travel Carry Bag</h3>
          <p>Spacious storage for trips and weekend use.</p>
          <div class="price-row">
            <span class="price">$68</span>
            <span class="old-price">$81</span>
          </div>
          <div class="card-actions">
            <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
            <button class="btn btn-main small-btn add-cart" data-name="Travel Carry Bag" data-price="68" data-image="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="big-banner reveal">
    <div class="big-banner-content">
      <span class="section-tag">Made with care</span>
      <h2>Luxury feel with useful design</h2>
      <p>From clean finishing to smart compartments, every bag is designed to look good and work better.</p>
      <a href="about.php" class="btn btn-main">About Our Brand</a>
    </div>
  </section>

  <section class="section reveal">
    <div class="stats-grid">
      <div class="stat-box hover-up">
        <h3>12K+</h3>
        <p>Happy buyers</p>
      </div>
      <div class="stat-box hover-up">
        <h3>250+</h3>
        <p>Bag styles</p>
      </div>
      <div class="stat-box hover-up">
        <h3>4.9</h3>
        <p>Average rating</p>
      </div>
      <div class="stat-box hover-up">
        <h3>24/7</h3>
        <p>Support help</p>
      </div>
    </div>
  </section>

  <section class="section reveal">
    <div class="two-col">
      <div class="image-panel hover-up">
        <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=1000&q=80" alt="Bag detail">
      </div>
      <div class="text-panel">
        <span class="section-tag">Why choose us</span>
        <h2>More than a simple bag shop</h2>
        <p>We mix style, storage and comfort into bags that match real daily life. Every design is made to feel premium and stay useful.</p>

        <div class="feature-list">
          <div class="feature-item hover-up">
            <h3>Premium look</h3>
            <p>Simple shapes and rich colors that feel modern.</p>
          </div>
          <div class="feature-item hover-up">
            <h3>Smart inner space</h3>
            <p>Separate sections for laptop, wallet, charger and more.</p>
          </div>
          <div class="feature-item hover-up">
            <h3>Comfort first</h3>
            <p>Soft handles and balanced weight for long carry time.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section light-bg reveal">
    <div class="section-head">
      <span class="section-tag">More to see</span>
      <h2>Shop by mood and moment</h2>
      <p>Pick the bag that fits your day best.</p>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>For office</h3>
        <p>Smart bags with laptop room, neat finish and formal look.</p>
      </div>
      <div class="info-card hover-up">
        <h3>For college</h3>
        <p>Lightweight backpacks with easy storage and daily comfort.</p>
      </div>
      <div class="info-card hover-up">
        <h3>For travel</h3>
        <p>More capacity, stronger handles and quick-access pockets.</p>
      </div>
      <div class="info-card hover-up">
        <h3>For gifting</h3>
        <p>Beautiful premium designs that feel special and useful.</p>
      </div>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Real people</span>
      <h2>What our buyers say</h2>
      <p>Kind words from people who love style and comfort.</p>
    </div>

    <div class="review-grid">
      <div class="review-card hover-up">
        <p>"The design feels premium and the quality is better than expected."</p>
        <h4>Riya Sharma</h4>
        <span>Office buyer</span>
      </div>
      <div class="review-card hover-up">
        <p>"I bought one for college and now I want another for travel too."</p>
        <h4>Aman Verma</h4>
        <span>Student</span>
      </div>
      <div class="review-card hover-up">
        <p>"Very clean website, easy shopping experience and nice finishing."</p>
        <h4>Neha Kapoor</h4>
        <span>Regular customer</span>
      </div>
    </div>
  </section>

  <section class="newsletter reveal">
    <div class="newsletter-box">
      <div>
        <span class="section-tag">Stay updated</span>
        <h2>Get offers and new bag updates</h2>
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
      <a href="register.php" class="register-bottom-btn">Register Now</a>
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
        <a href="bags.php">Bags</a>
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