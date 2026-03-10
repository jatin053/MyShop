<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home & Kitchen - My Shop</title>
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
        <option>Home & Kitchen</option>
        <option>Books</option>
        <option>Electronics</option>
        <option>Fashion</option>
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
      <a href="electronics.php">Electronics</a>
      <a href="computers.php">Computers</a>
      <a href="books.php">Books</a>
      <a href="toysandgame.php">Toys & Games</a>
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <!-- PAGE -->
  <main class="hk-page">

    <section class="hk-top">
      <div class="hk-top-text">
        <p class="hk-tag">Home & Kitchen</p>
        <h1>Shop useful home and kitchen products for daily comfort and smart living.</h1>
        <p>
          Explore cookware, storage boxes, dining sets, cleaning tools, bedding, decor,
          and kitchen helpers in one clean and beautiful page. This page is made for
          customers who want to buy home products easily.
        </p>

        <div class="hk-top-btns">
          <a href="#hk-products" class="hk-main-btn">Shop Products</a>
          <a href="#hk-types" class="hk-light-btn">View Types</a>
        </div>
      </div>

      <div class="hk-top-image">
        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1400&q=80" alt="Home and kitchen">
      </div>
    </section>

    <section class="hk-types" id="hk-types">
      <div class="hk-type-box">Cookware</div>
      <div class="hk-type-box">Storage</div>
      <div class="hk-type-box">Dining</div>
      <div class="hk-type-box">Cleaning</div>
      <div class="hk-type-box">Bedding</div>
      <div class="hk-type-box">Decor</div>
      <div class="hk-type-box">Kitchen Tools</div>
      <div class="hk-type-box">Appliances</div>
    </section>

    <section class="hk-help">
      <div class="hk-help-box">
        <h3>For Cooking</h3>
        <p>Useful cookware and kitchen tools for easier daily meals and better cooking.</p>
      </div>

      <div class="hk-help-box">
        <h3>For Storage</h3>
        <p>Smart storage products that keep your home neat, clean, and organized.</p>
      </div>

      <div class="hk-help-box">
        <h3>For Comfort</h3>
        <p>Soft bedding, decor, and home items that make rooms feel warm and relaxing.</p>
      </div>

      <div class="hk-help-box">
        <h3>For Daily Use</h3>
        <p>Practical products for dining, cleaning, and everyday home life.</p>
      </div>
    </section>

    <section class="hk-products" id="hk-products">
      <div class="hk-head">
        <p class="hk-tag">Featured Products</p>
        <h2>Home and kitchen items you can buy</h2>
      </div>

      <div class="hk-grid">

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1514866747592-c2d279258a78?auto=format&fit=crop&w=900&q=80" alt="Cookware set">
          <div class="hk-card-text">
            <span class="hk-label">Cookware</span>
            <h3>Non-Stick Cookware Set</h3>
            <p>Durable cookware set for daily cooking, faster heat flow, and easy cleaning.</p>
            <div class="hk-price">₹2,999</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Non-Stick Cookware Set">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Non-Stick Cookware Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?auto=format&fit=crop&w=900&q=80" alt="Storage boxes">
          <div class="hk-card-text">
            <span class="hk-label">Storage</span>
            <h3>Home Storage Boxes</h3>
            <p>Strong storage boxes for clothes, home items, and better shelf organization.</p>
            <div class="hk-price">₹1,199</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Home Storage Boxes">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Home Storage Boxes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?auto=format&fit=crop&w=900&q=80" alt="Dining set">
          <div class="hk-card-text">
            <span class="hk-label">Dining</span>
            <h3>Dining Plate Set</h3>
            <p>Stylish plate set for family meals, serving food, and a better dining table look.</p>
            <div class="hk-price">₹1,499</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Dining Plate Set">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Dining Plate Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=900&q=80" alt="Cleaning tools">
          <div class="hk-card-text">
            <span class="hk-label">Cleaning</span>
            <h3>Cleaning Tool Set</h3>
            <p>Simple cleaning tools for floors, kitchen spaces, and everyday home care.</p>
            <div class="hk-price">₹899</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Cleaning Tool Set">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Cleaning Tool Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80" alt="Bedsheet set">
          <div class="hk-card-text">
            <span class="hk-label">Bedding</span>
            <h3>Soft Bedsheet Set</h3>
            <p>Comfortable bedsheet set made for better rest and a fresh bedroom look.</p>
            <div class="hk-price">₹1,799</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Soft Bedsheet Set">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Soft Bedsheet Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80" alt="Decor light">
          <div class="hk-card-text">
            <span class="hk-label">Decor</span>
            <h3>Decor Light Piece</h3>
            <p>A stylish decor item that adds beauty, warmth, and a soft home feel.</p>
            <div class="hk-price">₹749</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Decor Light Piece">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Decor Light Piece">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1570222094114-d054a817e56b?auto=format&fit=crop&w=900&q=80" alt="Kitchen tool set">
          <div class="hk-card-text">
            <span class="hk-label">Kitchen Tools</span>
            <h3>Kitchen Tool Set</h3>
            <p>Useful kitchen helpers for cutting, mixing, serving, and easier preparation.</p>
            <div class="hk-price">₹999</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Kitchen Tool Set">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Kitchen Tool Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="hk-card">
          <img src="https://images.unsplash.com/photo-1585515656973-4b6b0c5c4d52?auto=format&fit=crop&w=900&q=80" alt="Kitchen appliance">
          <div class="hk-card-text">
            <span class="hk-label">Appliances</span>
            <h3>Mini Kitchen Appliance</h3>
            <p>A helpful appliance that saves time and makes kitchen work easier every day.</p>
            <div class="hk-price">₹3,499</div>
            <div class="hk-buttons">
              <button class="hk-cart-btn" data-name="Mini Kitchen Appliance">Add to Cart</button>
              <button class="hk-buy-btn" data-name="Mini Kitchen Appliance">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="hk-bottom">
      <div class="hk-bottom-box">
        <p class="hk-tag">Why Buy From My Shop</p>
        <h2>Useful home products, simple browsing, and a smooth buying experience.</h2>
        <p>
          My Shop helps customers find home and kitchen products in a clean and easy layout.
          From cookware and decor to storage and bedding, this page is made for quick shopping.
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
    const hkCartButtons = document.querySelectorAll(".hk-cart-btn");
    const hkBuyButtons = document.querySelectorAll(".hk-buy-btn");
    const hkCartCount = document.querySelector(".cart-count");

    hkCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(hkCartCount.textContent) || 0;
        hkCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    hkBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>