<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sports & Outdoors - My Shop</title>
  <link rel="stylesheet" href="css/style.css" />
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
        <option>Sports & Outdoors</option>
        <option>Books</option>
        <option>Electronics</option>
        <option>Fashion</option>
        <option>Home & Kitchen</option>
      </select>

      <input type="text" placeholder="Search My Shop" />
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

  <!-- CATEGORY BAR -->
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
      <a href="computers.php">Computers</a>
      <a href="books.php">Books</a>
      <a href="toysandgame.php">Toys & Games</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <!-- SPORTS PAGE -->
  <main class="sports-page">

    <section class="sports-top">
      <div class="sports-top-text">
        <p class="sports-tag">Sports & Outdoors</p>
        <h1>Shop sports gear and outdoor essentials for fitness, travel, and adventure.</h1>
        <p>
          Explore cricket bats, footballs, gym gear, backpacks, tents, sports shoes,
          water bottles, yoga mats, and outdoor products in one clean shopping page.
          This page is made to help customers find active lifestyle products quickly and easily.
        </p>

        <div class="sports-top-buttons">
          <a href="#sports-products" class="sports-main-button">Shop Now</a>
          <a href="#sports-types" class="sports-light-button">View Types</a>
        </div>
      </div>

      <div class="sports-top-image">
        <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=1400&q=80" alt="Sports and outdoors">
      </div>
    </section>

    <section class="sports-types" id="sports-types">
      <div class="sports-type-box">Cricket</div>
      <div class="sports-type-box">Football</div>
      <div class="sports-type-box">Gym</div>
      <div class="sports-type-box">Yoga</div>
      <div class="sports-type-box">Camping</div>
      <div class="sports-type-box">Cycling</div>
      <div class="sports-type-box">Running</div>
      <div class="sports-type-box">Travel Gear</div>
    </section>

    <section class="sports-help-grid">
      <div class="sports-help-box">
        <h3>For Fitness</h3>
        <p>Gym and workout products that support training, flexibility, and healthy routines.</p>
      </div>

      <div class="sports-help-box">
        <h3>For Outdoor Trips</h3>
        <p>Camping and travel gear designed for comfort, safety, and better outdoor experience.</p>
      </div>

      <div class="sports-help-box">
        <h3>For Daily Sports</h3>
        <p>Useful items for cricket, football, running, and active everyday play.</p>
      </div>

      <div class="sports-help-box">
        <h3>For Adventure</h3>
        <p>Strong and reliable outdoor products made for movement, travel, and action.</p>
      </div>
    </section>

    <section class="sports-products" id="sports-products">
      <div class="sports-head">
        <p class="sports-tag">Featured Products</p>
        <h2>Sports and outdoor items to shop</h2>
      </div>

      <div class="sports-grid">

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1543357480-c60d40007a3f?auto=format&fit=crop&w=900&q=80" alt="Cricket bat">
          <div class="sport-card-text">
            <span class="sport-label">Cricket</span>
            <h3>Premium Cricket Bat</h3>
            <p>Well-balanced bat built for practice, local matches, and smooth shot play.</p>
            <div class="sport-price">₹2,499</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1614632537190-23e4146777db?auto=format&fit=crop&w=900&q=80" alt="Football">
          <div class="sport-card-text">
            <span class="sport-label">Football</span>
            <h3>Match Football</h3>
            <p>Durable football for regular practice, team games, and outdoor fun.</p>
            <div class="sport-price">₹1,199</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=900&q=80" alt="Dumbbells">
          <div class="sport-card-text">
            <span class="sport-label">Gym</span>
            <h3>Adjustable Dumbbells</h3>
            <p>Strong workout weights for home fitness, muscle training, and daily exercise.</p>
            <div class="sport-price">₹3,899</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=900&q=80" alt="Yoga mat">
          <div class="sport-card-text">
            <span class="sport-label">Yoga</span>
            <h3>Yoga Mat</h3>
            <p>Comfortable non-slip mat for stretching, yoga sessions, and floor workouts.</p>
            <div class="sport-price">₹899</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80" alt="Camping tent">
          <div class="sport-card-text">
            <span class="sport-label">Camping</span>
            <h3>Outdoor Camping Tent</h3>
            <p>Spacious and easy-to-carry tent for travel, camping, and outdoor stays.</p>
            <div class="sport-price">₹4,599</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?auto=format&fit=crop&w=900&q=80" alt="Sports shoes">
          <div class="sport-card-text">
            <span class="sport-label">Running</span>
            <h3>Running Shoes</h3>
            <p>Lightweight shoes made for comfort, grip, and better performance on the move.</p>
            <div class="sport-price">₹2,799</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1501706362039-c6e80948f11f?auto=format&fit=crop&w=900&q=80" alt="Backpack">
          <div class="sport-card-text">
            <span class="sport-label">Travel Gear</span>
            <h3>Outdoor Backpack</h3>
            <p>Useful backpack with space and comfort for trips, trekking, and daily carry.</p>
            <div class="sport-price">₹1,899</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="sport-card">
          <img src="https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=900&q=80" alt="Water bottle">
          <div class="sport-card-text">
            <span class="sport-label">Fitness</span>
            <h3>Sports Water Bottle</h3>
            <p>Easy-carry bottle made for workouts, sports practice, and outdoor hydration.</p>
            <div class="sport-price">₹499</div>
            <div class="sport-buttons">
              <button class="sport-cart-button">Add to Cart</button>
              <button class="sport-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="sports-bottom">
      <div class="sports-bottom-box">
        <p class="sports-tag">Why Buy From My Shop</p>
        <h2>Strong products, active lifestyle essentials, and easy shopping in one place.</h2>
        <p>
          My Shop helps customers find sports and outdoor items in a simple and organized layout.
          From fitness gear to travel essentials and game products, this page is made for smooth browsing and quick shopping.
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