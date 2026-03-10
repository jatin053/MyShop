<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mobiles - My Shop</title>
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
        <option>Mobiles</option>
        <option>Electronics</option>
        <option>Books</option>
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
  <main class="mob-page">

    <section class="mob-top">
      <div class="mob-top-text">
        <p class="mob-tag">Mobiles</p>
        <h1>Shop smart phones and mobile accessories for work, photos, gaming, and daily use.</h1>
        <p>
          Explore premium phones, budget mobiles, chargers, cases, power banks, earbuds,
          and useful accessories in one clean shopping page. This page is made to help
          customers quickly find and buy the right mobile products.
        </p>

        <div class="mob-top-btns">
          <a href="#mob-products" class="mob-main-btn">Shop Mobiles</a>
          <a href="#mob-types" class="mob-light-btn">View Types</a>
        </div>
      </div>

      <div class="mob-top-image">
        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1400&q=80" alt="Mobile phones">
      </div>
    </section>

    <section class="mob-types" id="mob-types">
      <div class="mob-type-box">Premium Phones</div>
      <div class="mob-type-box">Budget Phones</div>
      <div class="mob-type-box">Gaming Phones</div>
      <div class="mob-type-box">Camera Phones</div>
      <div class="mob-type-box">Chargers</div>
      <div class="mob-type-box">Cases</div>
      <div class="mob-type-box">Power Banks</div>
      <div class="mob-type-box">Earbuds</div>
    </section>

    <section class="mob-help">
      <div class="mob-help-box">
        <h3>For Daily Use</h3>
        <p>Phones and accessories that support calls, apps, social media, and everyday work.</p>
      </div>

      <div class="mob-help-box">
        <h3>For Photos</h3>
        <p>Smart phones with better camera quality for portraits, video, and clear memories.</p>
      </div>

      <div class="mob-help-box">
        <h3>For Gaming</h3>
        <p>Fast mobile devices with strong performance, smooth display, and longer battery support.</p>
      </div>

      <div class="mob-help-box">
        <h3>For Travel</h3>
        <p>Portable accessories like chargers and power banks for better battery support anywhere.</p>
      </div>
    </section>

    <section class="mob-products" id="mob-products">
      <div class="mob-head">
        <p class="mob-tag">Featured Products</p>
        <h2>Mobiles and accessories you can buy</h2>
      </div>

      <div class="mob-grid">

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=900&q=80" alt="Premium phone">
          <div class="mob-card-text">
            <span class="mob-label">Premium Phone</span>
            <h3>My Shop Pro Phone</h3>
            <p>Powerful mobile with fast processor, sharp display, and premium design.</p>
            <div class="mob-price">₹49,999</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="My Shop Pro Phone">Add to Cart</button>
              <button class="mob-buy-btn" data-name="My Shop Pro Phone">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1580910051074-3eb694886505?auto=format&fit=crop&w=900&q=80" alt="Budget phone">
          <div class="mob-card-text">
            <span class="mob-label">Budget Phone</span>
            <h3>Smart Budget Mobile</h3>
            <p>Reliable phone for calling, apps, browsing, and daily tasks at a better price.</p>
            <div class="mob-price">₹12,999</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Smart Budget Mobile">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Smart Budget Mobile">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1567581935884-3349723552ca?auto=format&fit=crop&w=900&q=80" alt="Gaming phone">
          <div class="mob-card-text">
            <span class="mob-label">Gaming Phone</span>
            <h3>Gaming Power Phone</h3>
            <p>Built for fast gaming, smooth visuals, and long sessions with better performance.</p>
            <div class="mob-price">₹29,999</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Gaming Power Phone">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Gaming Power Phone">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=80" alt="Camera phone">
          <div class="mob-card-text">
            <span class="mob-label">Camera Phone</span>
            <h3>Camera Focus Mobile</h3>
            <p>Perfect for sharp photos, clean video, and beautiful everyday picture quality.</p>
            <div class="mob-price">₹24,499</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Camera Focus Mobile">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Camera Focus Mobile">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1583863788434-e58a36330cf0?auto=format&fit=crop&w=900&q=80" alt="Fast charger">
          <div class="mob-card-text">
            <span class="mob-label">Charger</span>
            <h3>Fast Charging Adapter</h3>
            <p>Useful charger for quick battery support and safer charging in daily use.</p>
            <div class="mob-price">₹999</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Fast Charging Adapter">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Fast Charging Adapter">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1601593346740-925612772716?auto=format&fit=crop&w=900&q=80" alt="Mobile case">
          <div class="mob-card-text">
            <span class="mob-label">Case</span>
            <h3>Protective Mobile Case</h3>
            <p>Strong and clean phone case made to protect your device from daily damage.</p>
            <div class="mob-price">₹499</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Protective Mobile Case">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Protective Mobile Case">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1609592806596-b43fdb6dc1d7?auto=format&fit=crop&w=900&q=80" alt="Power bank">
          <div class="mob-card-text">
            <span class="mob-label">Power Bank</span>
            <h3>Portable Power Bank</h3>
            <p>Carry extra charging support for travel, office, and long daily use.</p>
            <div class="mob-price">₹1,299</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Portable Power Bank">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Portable Power Bank">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="mob-card">
          <img src="https://images.unsplash.com/photo-1606220838315-056192d5e927?auto=format&fit=crop&w=900&q=80" alt="Wireless earbuds">
          <div class="mob-card-text">
            <span class="mob-label">Earbuds</span>
            <h3>Wireless Earbuds</h3>
            <p>Easy-to-use earbuds for music, calls, videos, and portable listening comfort.</p>
            <div class="mob-price">₹1,799</div>
            <div class="mob-buttons">
              <button class="mob-cart-btn" data-name="Wireless Earbuds">Add to Cart</button>
              <button class="mob-buy-btn" data-name="Wireless Earbuds">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="mob-bottom">
      <div class="mob-bottom-box">
        <p class="mob-tag">Why Buy From My Shop</p>
        <h2>Better mobiles, useful accessories, and simple shopping in one place.</h2>
        <p>
          My Shop helps customers find mobile phones and accessories in a clean and easy layout.
          From premium devices to daily-use accessories, this page is made for quick browsing and buying.
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
    const mobCartButtons = document.querySelectorAll(".mob-cart-btn");
    const mobBuyButtons = document.querySelectorAll(".mob-buy-btn");
    const mobCartCount = document.querySelector(".cart-count");

    mobCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(mobCartCount.textContent) || 0;
        mobCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    mobBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>