<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shoes - My Shop</title>
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
        <option>Shoes</option>
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
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
    </div>
  </div>

  <!-- PAGE -->
  <main class="shoe-page">

    <section class="shoe-top">
      <div class="shoe-top-text">
        <p class="shoe-tag">Shoes Collection</p>
        <h1>Shop stylish, comfortable, and everyday shoes for every step.</h1>
        <p>
          Explore running shoes, casual shoes, formal shoes, sports shoes, sneakers,
          sandals, and everyday footwear in one clean shopping page. This page is made
          to help customers quickly choose and buy the right pair.
        </p>

        <div class="shoe-top-btns">
          <a href="#shoe-products" class="shoe-main-btn">Shop Shoes</a>
          <a href="#shoe-types" class="shoe-light-btn">View Types</a>
        </div>
      </div>

      <div class="shoe-top-image">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1400&q=80" alt="Shoes collection">
      </div>
    </section>

    <section class="shoe-types" id="shoe-types">
      <div class="shoe-type-box">Running Shoes</div>
      <div class="shoe-type-box">Casual Shoes</div>
      <div class="shoe-type-box">Formal Shoes</div>
      <div class="shoe-type-box">Sports Shoes</div>
      <div class="shoe-type-box">Sneakers</div>
      <div class="shoe-type-box">Sandals</div>
      <div class="shoe-type-box">Walking Shoes</div>
      <div class="shoe-type-box">Daily Wear</div>
    </section>

    <section class="shoe-help">
      <div class="shoe-help-box">
        <h3>For Running</h3>
        <p>Shoes made for comfort, grip, and better movement during running and exercise.</p>
      </div>

      <div class="shoe-help-box">
        <h3>For Daily Use</h3>
        <p>Easy and comfortable shoes for work, college, outings, and everyday wear.</p>
      </div>

      <div class="shoe-help-box">
        <h3>For Style</h3>
        <p>Modern sneakers and casual shoes that add a smart look to your outfit.</p>
      </div>

      <div class="shoe-help-box">
        <h3>For Comfort</h3>
        <p>Soft and lightweight footwear that feels better during long hours of use.</p>
      </div>
    </section>

    <section class="shoe-products" id="shoe-products">
      <div class="shoe-head">
        <p class="shoe-tag">Featured Shoes</p>
        <h2>Shoes you can buy right now</h2>
      </div>

      <div class="shoe-grid">

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Running shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Running</span>
            <h3>Comfort Running Shoes</h3>
            <p>Lightweight running shoes with soft feel, better grip, and strong daily comfort.</p>
            <div class="shoe-price">₹1,999</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Comfort Running Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Comfort Running Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?auto=format&fit=crop&w=900&q=80" alt="Sneakers">
          <div class="shoe-card-text">
            <span class="shoe-label">Sneakers</span>
            <h3>Classic White Sneakers</h3>
            <p>Clean and stylish sneakers that work well with jeans, casual wear, and outings.</p>
            <div class="shoe-price">₹2,499</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Classic White Sneakers">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Classic White Sneakers">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1614252369475-531eba835eb1?auto=format&fit=crop&w=900&q=80" alt="Formal shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Formal</span>
            <h3>Formal Office Shoes</h3>
            <p>Smart shoes made for office style, meetings, and neat everyday professional wear.</p>
            <div class="shoe-price">₹2,899</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Formal Office Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Formal Office Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=900&q=80" alt="Casual shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Casual</span>
            <h3>Daily Casual Shoes</h3>
            <p>Simple and comfortable shoes for college, shopping, travel, and daily movement.</p>
            <div class="shoe-price">₹1,699</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Daily Casual Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Daily Casual Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?auto=format&fit=crop&w=900&q=80" alt="Sports shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Sports</span>
            <h3>Sports Performance Shoes</h3>
            <p>Supportive sports shoes built for active movement, better grip, and energy support.</p>
            <div class="shoe-price">₹2,299</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Sports Performance Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Sports Performance Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=900&q=80" alt="Walking shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Walking</span>
            <h3>Walking Comfort Shoes</h3>
            <p>Soft walking shoes designed for easy movement and daily long-hour comfort.</p>
            <div class="shoe-price">₹1,799</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Walking Comfort Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Walking Comfort Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1560769629-975ec94e6a86?auto=format&fit=crop&w=900&q=80" alt="Sandals">
          <div class="shoe-card-text">
            <span class="shoe-label">Sandals</span>
            <h3>Easy Wear Sandals</h3>
            <p>Open and comfortable sandals for quick use, home wear, and casual daily steps.</p>
            <div class="shoe-price">₹999</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Easy Wear Sandals">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Easy Wear Sandals">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="shoe-card">
          <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&w=900&q=80" alt="Trendy shoes">
          <div class="shoe-card-text">
            <span class="shoe-label">Style</span>
            <h3>Trendy Street Shoes</h3>
            <p>Fashion-focused shoes with a bold look for street style and modern outfits.</p>
            <div class="shoe-price">₹2,699</div>
            <div class="shoe-buttons">
              <button class="shoe-cart-btn" data-name="Trendy Street Shoes">Add to Cart</button>
              <button class="shoe-buy-btn" data-name="Trendy Street Shoes">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="shoe-bottom">
      <div class="shoe-bottom-box">
        <p class="shoe-tag">Why Buy From My Shop</p>
        <h2>Better footwear, easy browsing, and a clean shoe shopping experience.</h2>
        <p>
          My Shop helps customers find shoes in a simple and organized layout.
          From running shoes to daily wear and stylish sneakers, this page is built for smooth shopping.
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
    const shoeCartButtons = document.querySelectorAll(".shoe-cart-btn");
    const shoeBuyButtons = document.querySelectorAll(".shoe-buy-btn");
    const shoeCartCount = document.querySelector(".cart-count");

    shoeCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(shoeCartCount.textContent) || 0;
        shoeCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    shoeBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>