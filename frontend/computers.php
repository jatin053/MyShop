<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Computers - My Shop</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- NAVBAR -->
  <header class="nav">
    <a href="index.php" class="logo">My<span>Shop</span></a>

    <div class="location">
      <p>Deliver to</p>
      <h4>Mumbai 400001</h4>
    </div>

    <div class="search">
      <select aria-label="Category">
        <option>All</option>
        <option>Books</option>
        <option>Electronics</option>
        <option>Clothing</option>
        <option>Home & Kitchen</option>
        <option>Shoes</option>
      </select>

      <input type="text" placeholder="Search My Shop">
      <button type="button" aria-label="Search">🔍</button>
    </div>

    <div class="menu">
      <div class="menu-box">
        <a href="/SHOP/admin/login.php">Sign in</a>
      </div>

      <div class="cart">
        <span class="cart-icon">🛒</span>
        <span class="cart-count">0</span>
        <span>Cart</span>
      </div>
    </div>
  </header>


  <div class="category-bar">
    <div class="category-left">
      <span class="menu-icon">☰</span>
      <b>All</b>
    </div>

    <div class="category-links">
       <a href="index.php">Home</a>
      <a href="Fresh.php">Fresh</a>
      <a href="about.php">About us </a>
      <a href="Bestsellers.php">Bestsellers</a>
      <a href="mobile.php">Mobiles</a>
      <a href="custom.php">Customer Service</a>
      <a href="todaydeal.php">Today's Deals</a>
      <a href="fashion.php">Fashion</a>
      <a href="electronics.php">Electronics</a>
      <a href="homeandkitchen.php">Home & Kitchen</a>
      <a href="books.php">Books</a>
      <a href="toysandgame.php">Toys & Games</a>
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <main class="computers-page">

    <section class="computers-banner">
      <div class="computers-banner-text">
        <p class="computers-tag">Computers & Computer Parts</p>
        <h1>Buy computers, accessories, and essential parts for gaming, office, and daily work.</h1>
        <p>
          Explore laptops, desktop setups, monitors, SSDs, RAM, keyboards, mouse devices,
          and graphics cards. This page is built for users who want quality computer products
          in one clean and modern shopping section.
        </p>

        <div class="computers-banner-buttons">
          <a href="#computer-items" class="computers-shop-btn">Shop Computers</a>
          <a href="#parts-section" class="computers-view-btn">View Parts</a>
        </div>
      </div>

      <div class="computers-banner-image">
        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1400&q=80" alt="Computer setup">
      </div>
    </section>

    <section class="computers-category-boxes">
      <div class="computers-category-card">Laptops</div>
      <div class="computers-category-card">Desktops</div>
      <div class="computers-category-card">Monitors</div>
      <div class="computers-category-card">Keyboards</div>
      <div class="computers-category-card">Mouse</div>
      <div class="computers-category-card">RAM</div>
      <div class="computers-category-card">SSD</div>
      <div class="computers-category-card">Graphics Cards</div>
    </section>

    <section class="computers-use-grid">
      <div class="computers-use-card">
        <h3>Gaming Setup</h3>
        <p>Powerful systems, responsive accessories, smooth displays, and modern parts for gaming performance.</p>
      </div>

      <div class="computers-use-card">
        <h3>Office Work</h3>
        <p>Reliable laptops, clean displays, storage upgrades, and accessories that improve productivity.</p>
      </div>

      <div class="computers-use-card">
        <h3>Students</h3>
        <p>Affordable and useful computer products for classes, online study, coding, and assignments.</p>
      </div>

      <div class="computers-use-card">
        <h3>Creators</h3>
        <p>Performance-focused desktops, memory, graphics, and storage for editing, design, and creative work.</p>
      </div>
    </section>

    <section class="computers-products-section" id="computer-items">
      <div class="computers-section-title">
        <p class="computers-tag">Featured Computers</p>
        <h2>Popular computer products</h2>
      </div>

      <div class="computers-products-grid">

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=900&q=80" alt="Laptop">
          <div class="computer-item-content">
            <h3>My Shop Pro Laptop</h3>
            <p>15.6-inch display, strong processor, 16GB RAM, and 512GB SSD for study and office work.</p>
            <div class="computer-item-price">₹54,999</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&w=900&q=80" alt="Desktop">
          <div class="computer-item-content">
            <h3>Gaming Desktop Tower</h3>
            <p>Powerful desktop with modern performance for gaming, editing, and multitasking.</p>
            <div class="computer-item-price">₹82,499</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=900&q=80" alt="Monitor">
          <div class="computer-item-content">
            <h3>27 Inch Full HD Monitor</h3>
            <p>Clear visuals, slim design, and smooth display for office work and entertainment.</p>
            <div class="computer-item-price">₹12,999</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=900&q=80" alt="Keyboard">
          <div class="computer-item-content">
            <h3>Mechanical Keyboard</h3>
            <p>Comfortable typing, premium build, and stylish backlight for better computer use.</p>
            <div class="computer-item-price">₹2,499</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="computers-products-section" id="parts-section">
      <div class="computers-section-title">
        <p class="computers-tag">Computer Parts</p>
        <h2>Parts and accessories for upgrades</h2>
      </div>

      <div class="computers-products-grid">

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1527814050087-3793815479db?auto=format&fit=crop&w=900&q=80" alt="Mouse">
          <div class="computer-item-content">
            <h3>Wireless Performance Mouse</h3>
            <p>Smooth tracking, comfortable grip, and long battery support for daily use.</p>
            <div class="computer-item-price">₹1,299</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1541029071515-84cc54f84dc5?auto=format&fit=crop&w=900&q=80" alt="RAM">
          <div class="computer-item-content">
            <h3>16GB DDR4 RAM</h3>
            <p>Reliable memory upgrade for smoother multitasking and faster system response.</p>
            <div class="computer-item-price">₹3,899</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=900&q=80" alt="SSD">
          <div class="computer-item-content">
            <h3>1TB NVMe SSD</h3>
            <p>Fast storage for quicker boot time, app loading, and a better computer experience.</p>
            <div class="computer-item-price">₹5,499</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="computer-item-card">
          <img src="https://images.unsplash.com/photo-1591489378430-ef2f4c626b35?auto=format&fit=crop&w=900&q=80" alt="Graphics Card">
          <div class="computer-item-content">
            <h3>Graphics Card 8GB</h3>
            <p>Designed for gaming and design tasks with strong visual performance and stability.</p>
            <div class="computer-item-price">₹28,999</div>
            <div class="computer-item-actions">
              <button class="computer-add-cart">Add to Cart</button>
              <button class="computer-buy-now">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="computers-bottom-note">
      <div class="computers-bottom-box">
        <p class="computers-tag">Why Buy From My Shop</p>
        <h2>Shop computers and computer parts with better value, cleaner browsing, and smooth delivery.</h2>
        <p>
          My Shop brings together complete computer systems and essential parts in one organized place.
          Whether you are building a setup, upgrading performance, or buying for daily work,
          this page helps customers shop clearly and quickly.
        </p>
      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-top">Back to top</div>

    <div class="footer-main">
      <div class="footer-column">
        <h3>Get to Know Us</h3>
        <a href="about.php">About My Shop</a>
        <a href="#">Careers</a>
        <a href="#">Press Releases</a>
        <a href="#">Our Story</a>
      </div>

      <div class="footer-column">
        <h3>Connect With Us</h3>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
      </div>

      <div class="footer-column">
        <h3>Make Money with Us</h3>
        <a href="#">Sell on My Shop</a>
        <a href="#">Become an Affiliate</a>
        <a href="#">Advertise Products</a>
      </div>

      <div class="footer-column">
        <h3>Let Us Help You</h3>
        <a href="#">Your Account</a>
        <a href="#">Returns Centre</a>
        <a href="customer-service.php">Customer Service</a>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-logo">My<span>Shop</span></div>
      <p>© 2026 MyShop.com, Inc. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>