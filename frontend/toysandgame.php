<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toys and Games - My Shop</title>
 
</head>
<body>
<link rel="stylesheet" href="css/style.css" />
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
        <option>Toys & Games</option>
        <option>Home & Kitchen</option>
        <option>Fashion</option>
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
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>
  <!-- TOYS PAGE -->
  <main class="toys-page">

    <section class="toys-top">
      <div class="toys-top-text">
        <p class="toys-tag">Toys & Games</p>
        <h1>Fun toys and games for kids, family time, and playful learning.</h1>
        <p>
          Explore soft toys, board games, remote control cars, building sets, puzzles,
          learning toys, and outdoor play products in one colorful shopping page.
          This page is made to help customers quickly find toys that feel exciting,
          useful, and fun to buy.
        </p>

        <div class="toys-top-buttons">
          <a href="#toys-products" class="toys-main-button">Shop Now</a>
          <a href="#toys-types" class="toys-light-button">View Types</a>
        </div>
      </div>

      <div class="toys-top-image">
        <img src="https://images.unsplash.com/photo-1558060370-d644479cb6f7?auto=format&fit=crop&w=1400&q=80" alt="Toys and games">
      </div>
    </section>

    <section class="toys-types" id="toys-types">
      <div class="toys-type-box">Soft Toys</div>
      <div class="toys-type-box">Board Games</div>
      <div class="toys-type-box">Learning Toys</div>
      <div class="toys-type-box">Toy Cars</div>
      <div class="toys-type-box">Building Sets</div>
      <div class="toys-type-box">Puzzles</div>
      <div class="toys-type-box">Outdoor Play</div>
      <div class="toys-type-box">Action Toys</div>
    </section>

    <section class="toys-help-grid">
      <div class="toys-help-box">
        <h3>For Kids</h3>
        <p>Bright, safe, and fun toys that support play, learning, and imagination.</p>
      </div>

      <div class="toys-help-box">
        <h3>For Family Time</h3>
        <p>Games and activities that bring parents, children, and friends together.</p>
      </div>

      <div class="toys-help-box">
        <h3>For Learning</h3>
        <p>Smart toys and puzzles that help improve memory, focus, and creative thinking.</p>
      </div>

      <div class="toys-help-box">
        <h3>For Gifting</h3>
        <p>Popular toy choices that work well for birthdays, celebrations, and surprises.</p>
      </div>
    </section>

    <section class="toys-products" id="toys-products">
      <div class="toys-head">
        <p class="toys-tag">Featured Toys</p>
        <h2>Popular toys and games to shop</h2>
      </div>

      <div class="toys-grid">

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=900&q=80" alt="Toy Car">
          <div class="toy-card-text">
            <span class="toy-label">Toy Car</span>
            <h3>Remote Control Car</h3>
            <p>Fast, fun, and easy to control for exciting indoor and outdoor play.</p>
            <div class="toy-price">₹1,299</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=900&q=80" alt="Ride On Toy">
          <div class="toy-card-text">
            <span class="toy-label">Outdoor Play</span>
            <h3>Kids Ride On Toy</h3>
            <p>A playful ride-on toy that gives children active fun and joyful movement.</p>
            <div class="toy-price">₹3,999</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=900&q=80" alt="Puzzle">
          <div class="toy-card-text">
            <span class="toy-label">Puzzle</span>
            <h3>Color Puzzle Set</h3>
            <p>Great for thinking, matching, problem solving, and focused play time.</p>
            <div class="toy-price">₹699</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=900&q=80" alt="Building Blocks">
          <div class="toy-card-text">
            <span class="toy-label">Building Set</span>
            <h3>Creative Block Set</h3>
            <p>Colorful blocks for building shapes, houses, cars, and endless ideas.</p>
            <div class="toy-price">₹1,149</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1572375992501-4b0892d50c69?auto=format&fit=crop&w=900&q=80" alt="Teddy Bear">
          <div class="toy-card-text">
            <span class="toy-label">Soft Toy</span>
            <h3>Soft Teddy Bear</h3>
            <p>A soft and lovable toy that makes a perfect gift for children.</p>
            <div class="toy-price">₹899</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1610890716171-6b1bb98ffd09?auto=format&fit=crop&w=900&q=80" alt="Board Game">
          <div class="toy-card-text">
            <span class="toy-label">Board Game</span>
            <h3>Family Board Game</h3>
            <p>A fun group game for family evenings, laughter, and shared memories.</p>
            <div class="toy-price">₹1,499</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=900&q=80" alt="Baby Learning Toy">
          <div class="toy-card-text">
            <span class="toy-label">Learning Toy</span>
            <h3>Baby Learning Toy</h3>
            <p>Helpful for sound, touch, color recognition, and early playful learning.</p>
            <div class="toy-price">₹749</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="toy-card">
          <img src="https://images.unsplash.com/photo-1594787318286-3d835c1d207f?auto=format&fit=crop&w=900&q=80" alt="Action Toy">
          <div class="toy-card-text">
            <span class="toy-label">Action Toy</span>
            <h3>Action Figure Set</h3>
            <p>Exciting action toys that bring fun stories and role play to life.</p>
            <div class="toy-price">₹1,099</div>
            <div class="toy-buttons">
              <button class="toy-cart-button">Add to Cart</button>
              <button class="toy-buy-button">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="toys-bottom">
      <div class="toys-bottom-box">
        <p class="toys-tag">Why Buy Toys From My Shop</p>
        <h2>Fun shopping, colorful products, and easy choices for every age group.</h2>
        <p>
          My Shop makes toy shopping simple and enjoyable. From playful gifts to learning toys and family games,
          this page helps customers find the right choice in a clean and organized layout.
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