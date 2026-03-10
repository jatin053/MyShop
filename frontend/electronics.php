<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Electronics - My Shop</title>
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
        <option>Electronics</option>
        <option>Books</option>
        <option>Home & Kitchen</option>
        <option>Computers</option>
        <option>Sports & Outdoors</option>
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
  <main class="elec-page">

    <section class="elec-top">
      <div class="elec-top-text">
        <p class="elec-tag">Electronics</p>
        <h1>Shop smart electronics for work, home, entertainment, and daily use.</h1>
        <p>
          Explore headphones, speakers, smart watches, cameras, tablets, power banks,
          earbuds, and useful tech accessories in one clean shopping page. This page is
          made to help customers find electronics quickly and buy them easily.
        </p>

        <div class="elec-top-btns">
          <a href="#elec-products" class="elec-main-btn">Shop Products</a>
          <a href="#elec-types" class="elec-light-btn">View Types</a>
        </div>
      </div>

      <div class="elec-top-image">
        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1400&q=80" alt="Electronics products">
      </div>
    </section>

    <section class="elec-types" id="elec-types">
      <div class="elec-type-box">Headphones</div>
      <div class="elec-type-box">Earbuds</div>
      <div class="elec-type-box">Speakers</div>
      <div class="elec-type-box">Smart Watches</div>
      <div class="elec-type-box">Cameras</div>
      <div class="elec-type-box">Tablets</div>
      <div class="elec-type-box">Power Banks</div>
      <div class="elec-type-box">Accessories</div>
    </section>

    <section class="elec-help">
      <div class="elec-help-box">
        <h3>For Daily Use</h3>
        <p>Useful tech products for work calls, music, charging, and everyday convenience.</p>
      </div>

      <div class="elec-help-box">
        <h3>For Entertainment</h3>
        <p>Audio and display products that improve music, movies, gaming, and relaxation.</p>
      </div>

      <div class="elec-help-box">
        <h3>For Travel</h3>
        <p>Portable electronics that are easy to carry and useful during movement and trips.</p>
      </div>

      <div class="elec-help-box">
        <h3>For Smart Living</h3>
        <p>Modern devices that make routines faster, easier, and more connected.</p>
      </div>
    </section>

    <section class="elec-products" id="elec-products">
      <div class="elec-head">
        <p class="elec-tag">Featured Products</p>
        <h2>Electronics you can buy right now</h2>
      </div>

      <div class="elec-grid">

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80" alt="Headphones">
          <div class="elec-card-text">
            <span class="elec-label">Headphones</span>
            <h3>Wireless Headphones</h3>
            <p>Comfortable headphones with strong sound, easy connection, and long listening time.</p>
            <div class="elec-price">₹2,499</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Wireless Headphones">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Wireless Headphones">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1606220588913-b3aacb4d2f46?auto=format&fit=crop&w=900&q=80" alt="Earbuds">
          <div class="elec-card-text">
            <span class="elec-label">Earbuds</span>
            <h3>Bluetooth Earbuds</h3>
            <p>Small, clean, and easy-to-carry earbuds for calls, music, and daily listening.</p>
            <div class="elec-price">₹1,799</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Bluetooth Earbuds">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Bluetooth Earbuds">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1589003077984-894e133dabab?auto=format&fit=crop&w=900&q=80" alt="Speaker">
          <div class="elec-card-text">
            <span class="elec-label">Speaker</span>
            <h3>Portable Speaker</h3>
            <p>Strong sound and easy portability for music, outdoor use, and small gatherings.</p>
            <div class="elec-price">₹2,199</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Portable Speaker">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Portable Speaker">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80" alt="Smart watch">
          <div class="elec-card-text">
            <span class="elec-label">Smart Watch</span>
            <h3>Smart Watch</h3>
            <p>Track time, steps, and activity with a clean design and useful smart features.</p>
            <div class="elec-price">₹3,299</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Smart Watch">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Smart Watch">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=900&q=80" alt="Camera">
          <div class="elec-card-text">
            <span class="elec-label">Camera</span>
            <h3>Digital Camera</h3>
            <p>Capture moments clearly with a stylish camera built for travel and daily memory saving.</p>
            <div class="elec-price">₹18,999</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Digital Camera">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Digital Camera">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=900&q=80" alt="Tablet">
          <div class="elec-card-text">
            <span class="elec-label">Tablet</span>
            <h3>Portable Tablet</h3>
            <p>A sleek tablet for reading, work, classes, videos, and simple everyday browsing.</p>
            <div class="elec-price">₹15,499</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Portable Tablet">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Portable Tablet">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1609592806596-b43fdb6dc1d7?auto=format&fit=crop&w=900&q=80" alt="Power bank">
          <div class="elec-card-text">
            <span class="elec-label">Power Bank</span>
            <h3>Fast Charging Power Bank</h3>
            <p>Reliable portable charging for travel, workdays, and long hours away from home.</p>
            <div class="elec-price">₹1,299</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Fast Charging Power Bank">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Fast Charging Power Bank">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="elec-card">
          <img src="https://images.unsplash.com/photo-1517420704952-d9f39e95b43e?auto=format&fit=crop&w=900&q=80" alt="Electronics accessory">
          <div class="elec-card-text">
            <span class="elec-label">Accessory</span>
            <h3>Mobile Accessory Kit</h3>
            <p>Useful cable and charging accessories for better connection and daily device use.</p>
            <div class="elec-price">₹899</div>
            <div class="elec-buttons">
              <button class="elec-cart-btn" data-name="Mobile Accessory Kit">Add to Cart</button>
              <button class="elec-buy-btn" data-name="Mobile Accessory Kit">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="elec-bottom">
      <div class="elec-bottom-box">
        <p class="elec-tag">Why Buy From My Shop</p>
        <h2>Smart products, clean browsing, and an easy electronics shopping experience.</h2>
        <p>
          My Shop helps customers find electronics in a simple and organized page.
          From audio products to smart gadgets and daily tech accessories, this section is built for quick shopping.
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
    const elecCartButtons = document.querySelectorAll(".elec-cart-btn");
    const elecBuyButtons = document.querySelectorAll(".elec-buy-btn");
    const elecCartCount = document.querySelector(".cart-count");

    elecCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(elecCartCount.textContent) || 0;
        elecCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    elecBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>