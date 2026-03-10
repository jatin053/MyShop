<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bestsellers - My Shop</title>
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
        <option>Bestsellers</option>
        <option>Mobiles</option>
        <option>Electronics</option>
        <option>Books</option>
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
      <a href="mobile.php">Mobiles</a>
      <a href="custom.php">Customer Service</a>
      <a href="todaydeal.php">Today's Deals</a>
      <a href="fashion.php">Fashion</a>
      <a href="electronics.php">Electronics</a>
      <a href="homeandkitchen.php">Home & Kitchen</a>
      <a href="computers.php">Computers</a>
      <a href="books.php">Books</a>
      <a href="toysandgame.php">Toys & Games</a>
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <!-- PAGE -->
  <main class="best-page">

    <section class="best-top">
      <div class="best-top-text">
        <p class="best-tag">Bestsellers</p>
        <h1>Shop the products people love most on My Shop.</h1>
        <p>
          Explore top-selling mobiles, headphones, books, beauty products, home essentials,
          shoes, and more in one clean shopping page. This page is made to help customers
          quickly find popular products that are already loved by many shoppers.
        </p>

        <div class="best-top-btns">
          <a href="#best-products" class="best-main-btn">Shop Bestsellers</a>
          <a href="#best-types" class="best-light-btn">View Top Types</a>
        </div>
      </div>

      <div class="best-top-image">
        <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?auto=format&fit=crop&w=1400&q=80" alt="Bestselling products">
      </div>
    </section>

    <section class="best-types" id="best-types">
      <div class="best-type-box">Top Mobiles</div>
      <div class="best-type-box">Best Audio</div>
      <div class="best-type-box">Popular Books</div>
      <div class="best-type-box">Beauty Picks</div>
      <div class="best-type-box">Home Essentials</div>
      <div class="best-type-box">Trending Shoes</div>
      <div class="best-type-box">Smart Gadgets</div>
      <div class="best-type-box">Daily Favorites</div>
    </section>

    <section class="best-help">
      <div class="best-help-box">
        <h3>Most Loved</h3>
        <p>Products customers choose again and again for quality, style, and daily use.</p>
      </div>

      <div class="best-help-box">
        <h3>Top Rated</h3>
        <p>Popular items that stand out for performance, comfort, and customer choice.</p>
      </div>

      <div class="best-help-box">
        <h3>Easy To Buy</h3>
        <p>Trusted products in one place so shopping feels faster, cleaner, and simpler.</p>
      </div>

      <div class="best-help-box">
        <h3>Best Value</h3>
        <p>Useful products that give a strong mix of quality, design, and price.</p>
      </div>
    </section>

    <section class="best-strip">
      <div class="best-strip-box">
        <span>Top Choice</span>
        <strong>Customer favorites every day</strong>
      </div>

      <div class="best-strip-box">
        <span>Best Value</span>
        <strong>Popular quality products</strong>
      </div>

      <div class="best-strip-box">
        <span>Most Ordered</span>
        <strong>Trusted by many shoppers</strong>
      </div>
    </section>

    <section class="best-products" id="best-products">
      <div class="best-head">
        <p class="best-tag">Featured Bestsellers</p>
        <h2>Top products you can buy right now</h2>
      </div>

      <div class="best-grid">

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80" alt="Mobile phone">
          <div class="best-card-text">
            <span class="best-label">Mobiles</span>
            <h3>Smart Premium Phone</h3>
            <p>A bestselling mobile with smooth performance, strong camera, and stylish design.</p>
            <div class="best-price">₹29,999</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Smart Premium Phone">Add to Cart</button>
              <button class="best-buy-btn" data-name="Smart Premium Phone">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80" alt="Headphones">
          <div class="best-card-text">
            <span class="best-label">Electronics</span>
            <h3>Wireless Headphones</h3>
            <p>A favorite audio product with clear sound, soft comfort, and easy daily use.</p>
            <div class="best-price">₹2,499</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Wireless Headphones">Add to Cart</button>
              <button class="best-buy-btn" data-name="Wireless Headphones">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=900&q=80" alt="Book">
          <div class="best-card-text">
            <span class="best-label">Books</span>
            <h3>Atomic Habits</h3>
            <p>A bestselling book that many readers choose for growth, discipline, and change.</p>
            <div class="best-price">₹599</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Atomic Habits">Add to Cart</button>
              <button class="best-buy-btn" data-name="Atomic Habits">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80" alt="Beauty serum">
          <div class="best-card-text">
            <span class="best-label">Beauty</span>
            <h3>Glow Face Serum</h3>
            <p>A popular beauty product chosen for soft skin feel, freshness, and simple care.</p>
            <div class="best-price">₹899</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Glow Face Serum">Add to Cart</button>
              <button class="best-buy-btn" data-name="Glow Face Serum">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1514866747592-c2d279258a78?auto=format&fit=crop&w=900&q=80" alt="Cookware">
          <div class="best-card-text">
            <span class="best-label">Home & Kitchen</span>
            <h3>Cookware Set</h3>
            <p>A best-selling kitchen set made for simple cooking, neat design, and daily comfort.</p>
            <div class="best-price">₹2,999</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Cookware Set">Add to Cart</button>
              <button class="best-buy-btn" data-name="Cookware Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Shoes">
          <div class="best-card-text">
            <span class="best-label">Shoes</span>
            <h3>Comfort Running Shoes</h3>
            <p>A top-selling pair with better grip, light feel, and strong comfort for daily steps.</p>
            <div class="best-price">₹1,999</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Comfort Running Shoes">Add to Cart</button>
              <button class="best-buy-btn" data-name="Comfort Running Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80" alt="Smart watch">
          <div class="best-card-text">
            <span class="best-label">Gadgets</span>
            <h3>Smart Watch</h3>
            <p>A bestselling gadget for daily time tracking, steps, and a modern wrist look.</p>
            <div class="best-price">₹3,299</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Smart Watch">Add to Cart</button>
              <button class="best-buy-btn" data-name="Smart Watch">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="best-card">
          <img src="https://images.unsplash.com/photo-1607602132700-068258b9f0c2?auto=format&fit=crop&w=900&q=80" alt="Body lotion">
          <div class="best-card-text">
            <span class="best-label">Personal Care</span>
            <h3>Body Lotion Set</h3>
            <p>A customer favorite for soft skin, daily hydration, and simple self-care comfort.</p>
            <div class="best-price">₹999</div>
            <div class="best-buttons">
              <button class="best-cart-btn" data-name="Body Lotion Set">Add to Cart</button>
              <button class="best-buy-btn" data-name="Body Lotion Set">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="best-bottom">
      <div class="best-bottom-box">
        <p class="best-tag">Why Shop Bestsellers</p>
        <h2>Popular choices, trusted products, and a smooth shopping experience.</h2>
        <p>
          My Shop makes it easy to discover the products customers already love most.
          This page brings top-selling items together in one clean layout so shopping feels quick and simple.
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

  <script>
    const bestCartButtons = document.querySelectorAll(".best-cart-btn");
    const bestBuyButtons = document.querySelectorAll(".best-buy-btn");
    const bestCartCount = document.querySelector(".cart-count");

    bestCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(bestCartCount.textContent) || 0;
        bestCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    bestBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>