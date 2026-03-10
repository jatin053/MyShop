<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fresh Items - My Shop</title>
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
        <option>Fresh Items</option>
        <option>Mobiles</option>
        <option>Electronics</option>
        <option>Beauty</option>
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

<div class="category-bar">
    <div class="category-left">
      <span class="menu-icon">☰</span>
      <b>All</b>
    </div>

    <div class="category-links">
       <a href="index.php">Home</a>
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
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <!-- PAGE -->
  <main class="fresh-page">

    <section class="fresh-top">
      <div class="fresh-top-text">
        <p class="fresh-tag">Fresh Arrivals</p>
        <h1>Shop the newest items added to My Shop.</h1>
        <p>
          Discover the latest products that have just arrived on our website. From smart gadgets
          and stylish beauty picks to home items and daily essentials, this page helps customers
          find what is new, useful, and ready to buy.
        </p>

        <div class="fresh-top-btns">
          <a href="#fresh-products" class="fresh-main-btn">Shop New Items</a>
          <a href="#fresh-types" class="fresh-light-btn">View New Types</a>
        </div>
      </div>

      <div class="fresh-top-image">
        <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1400&q=80" alt="Fresh products">
      </div>
    </section>

    <section class="fresh-types" id="fresh-types">
      <div class="fresh-type-box">New Mobiles</div>
      <div class="fresh-type-box">New Beauty</div>
      <div class="fresh-type-box">New Electronics</div>
      <div class="fresh-type-box">New Home Items</div>
      <div class="fresh-type-box">New Shoes</div>
      <div class="fresh-type-box">New Kitchen Tools</div>
      <div class="fresh-type-box">New Accessories</div>
      <div class="fresh-type-box">New Favorites</div>
    </section>

    <section class="fresh-help">
      <div class="fresh-help-box">
        <h3>Latest Arrivals</h3>
        <p>See products that were recently added to the store for customers to explore first.</p>
      </div>

      <div class="fresh-help-box">
        <h3>Fresh Designs</h3>
        <p>Discover new styles, cleaner looks, and updated products for everyday shopping.</p>
      </div>

      <div class="fresh-help-box">
        <h3>New Choices</h3>
        <p>Find more options across categories with simple browsing and easy product selection.</p>
      </div>

      <div class="fresh-help-box">
        <h3>Quick Shopping</h3>
        <p>Buy newly added products quickly from one clean and organized page.</p>
      </div>
    </section>

    <section class="fresh-note-strip">
      <div class="fresh-note-card">
        <span>Just Added</span>
        <strong>New styles now live</strong>
      </div>

      <div class="fresh-note-card">
        <span>Fresh Picks</span>
        <strong>Latest items to explore</strong>
      </div>

      <div class="fresh-note-card">
        <span>New Choice</span>
        <strong>Shop what arrived today</strong>
      </div>
    </section>

    <section class="fresh-products" id="fresh-products">
      <div class="fresh-head">
        <p class="fresh-tag">New Products</p>
        <h2>Fresh items you can buy right now</h2>
      </div>

      <div class="fresh-grid">

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1598327105666-5b89351aff97?auto=format&fit=crop&w=900&q=80" alt="New mobile">
          <div class="fresh-card-text">
            <span class="fresh-label">New Mobile</span>
            <h3>Smart View Phone</h3>
            <p>A newly added mobile with smooth display, smart design, and strong daily performance.</p>
            <div class="fresh-price">₹27,999</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Smart View Phone">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Smart View Phone">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80" alt="New beauty item">
          <div class="fresh-card-text">
            <span class="fresh-label">New Beauty</span>
            <h3>Fresh Glow Serum</h3>
            <p>A fresh beauty arrival made for a soft glow, smooth feel, and easy daily care.</p>
            <div class="fresh-price">₹849</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Fresh Glow Serum">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Fresh Glow Serum">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1606220838315-056192d5e927?auto=format&fit=crop&w=900&q=80" alt="New earbuds">
          <div class="fresh-card-text">
            <span class="fresh-label">New Electronics</span>
            <h3>Air Sound Earbuds</h3>
            <p>Newly added earbuds with a clean look, easy connection, and smooth sound support.</p>
            <div class="fresh-price">₹1,699</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Air Sound Earbuds">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Air Sound Earbuds">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80" alt="New decor item">
          <div class="fresh-card-text">
            <span class="fresh-label">New Home Item</span>
            <h3>Decor Table Light</h3>
            <p>A stylish home arrival that adds warmth, charm, and a soft feel to any room.</p>
            <div class="fresh-price">₹1,099</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Decor Table Light">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Decor Table Light">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?auto=format&fit=crop&w=900&q=80" alt="New shoes">
          <div class="fresh-card-text">
            <span class="fresh-label">New Shoes</span>
            <h3>Urban White Sneakers</h3>
            <p>Fresh sneakers with a clean style, light comfort, and easy everyday fashion use.</p>
            <div class="fresh-price">₹2,399</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Urban White Sneakers">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Urban White Sneakers">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1570222094114-d054a817e56b?auto=format&fit=crop&w=900&q=80" alt="New kitchen tool">
          <div class="fresh-card-text">
            <span class="fresh-label">New Kitchen Tool</span>
            <h3>Modern Kitchen Set</h3>
            <p>A newly added kitchen tool set made for easier preparation and better daily cooking.</p>
            <div class="fresh-price">₹1,249</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Modern Kitchen Set">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Modern Kitchen Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1609592806596-b43fdb6dc1d7?auto=format&fit=crop&w=900&q=80" alt="New power bank">
          <div class="fresh-card-text">
            <span class="fresh-label">New Accessory</span>
            <h3>Fast Charge Power Bank</h3>
            <p>A useful new accessory for travel, work, and extra battery support through the day.</p>
            <div class="fresh-price">₹1,299</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Fast Charge Power Bank">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Fast Charge Power Bank">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fresh-card">
          <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=900&q=80" alt="New book">
          <div class="fresh-card-text">
            <span class="fresh-label">New Favorite</span>
            <h3>Fresh Read Book</h3>
            <p>A new book arrival for readers who want useful ideas, calm reading, and better habits.</p>
            <div class="fresh-price">₹549</div>
            <div class="fresh-buttons">
              <button class="fresh-cart-btn" data-name="Fresh Read Book">Add to Cart</button>
              <button class="fresh-buy-btn" data-name="Fresh Read Book">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="fresh-bottom">
      <div class="fresh-bottom-box">
        <p class="fresh-tag">Why Shop Fresh Items</p>
        <h2>New arrivals, simple browsing, and easy shopping in one clean page.</h2>
        <p>
          My Shop helps customers discover newly added products without searching everywhere.
          This page brings fresh items together in one smooth layout for quicker shopping.
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
    const freshCartButtons = document.querySelectorAll(".fresh-cart-btn");
    const freshBuyButtons = document.querySelectorAll(".fresh-buy-btn");
    const freshCartCount = document.querySelector(".cart-count");

    freshCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(freshCartCount.textContent) || 0;
        freshCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    freshBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>