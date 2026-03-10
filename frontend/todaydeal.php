<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Today's Deals - My Shop</title>
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
        <option>Today's Deals</option>
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
  <main class="deal-page">

    <section class="deal-top">
      <div class="deal-top-text">
        <p class="deal-tag">Today's Deals</p>
        <h1>Shop low-price products and special offers only for today.</h1>
        <p>
          Welcome to the My Shop deals page where customers can find affordable products,
          limited offers, and popular items at lower prices. This page is made to show
          cheap products, discount offers, and smart shopping choices in one clean place.
        </p>

        <div class="deal-top-btns">
          <a href="#deal-products" class="deal-main-btn">Shop Deals</a>
          <a href="#deal-offers" class="deal-light-btn">View Offers</a>
        </div>
      </div>

      <div class="deal-top-image">
        <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f?auto=format&fit=crop&w=1400&q=80" alt="Today's deals">
      </div>
    </section>

    <section class="deal-offers" id="deal-offers">
      <div class="deal-offer-box">
        <span>Up to 50% Off</span>
        <strong>Special discounts on daily products</strong>
      </div>

      <div class="deal-offer-box">
        <span>Limited Price</span>
        <strong>Lower price only for today</strong>
      </div>

      <div class="deal-offer-box">
        <span>Best Value</span>
        <strong>Popular items at cheaper rates</strong>
      </div>

      <div class="deal-offer-box">
        <span>Fast Shopping</span>
        <strong>Buy before the deal ends</strong>
      </div>
    </section>

    <section class="deal-help">
      <div class="deal-help-box">
        <h3>Lower Prices</h3>
        <p>Products with reduced prices so customers can shop more and spend less.</p>
      </div>

      <div class="deal-help-box">
        <h3>Daily Offers</h3>
        <p>Fresh deals and limited-time discounts across useful and popular categories.</p>
      </div>

      <div class="deal-help-box">
        <h3>Smart Shopping</h3>
        <p>Easy product choices for people looking for value, price, and quality together.</p>
      </div>

      <div class="deal-help-box">
        <h3>Quick Buying</h3>
        <p>Clean shopping layout that helps customers buy deal products without confusion.</p>
      </div>
    </section>

    <section class="deal-products" id="deal-products">
      <div class="deal-head">
        <p class="deal-tag">Hot Deals</p>
        <h2>Cheap products you can buy right now</h2>
      </div>

      <div class="deal-grid">

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1601593346740-925612772716?auto=format&fit=crop&w=900&q=80" alt="Phone case">
          <div class="deal-card-text">
            <span class="deal-label">45% Off</span>
            <h3>Protective Mobile Case</h3>
            <p>Strong and stylish mobile cover for daily phone protection.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹299</span>
              <span class="deal-old-price">₹549</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Protective Mobile Case">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Protective Mobile Case">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1606220838315-056192d5e927?auto=format&fit=crop&w=900&q=80" alt="Earbuds">
          <div class="deal-card-text">
            <span class="deal-label">35% Off</span>
            <h3>Wireless Earbuds</h3>
            <p>Easy-to-use earbuds for calls, music, and simple daily listening.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹1,299</span>
              <span class="deal-old-price">₹1,999</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Wireless Earbuds">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Wireless Earbuds">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80" alt="Face serum">
          <div class="deal-card-text">
            <span class="deal-label">40% Off</span>
            <h3>Glow Face Serum</h3>
            <p>Soft skincare product for smooth feel and fresh daily glow.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹699</span>
              <span class="deal-old-price">₹1,149</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Glow Face Serum">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Glow Face Serum">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1570222094114-d054a817e56b?auto=format&fit=crop&w=900&q=80" alt="Kitchen tools">
          <div class="deal-card-text">
            <span class="deal-label">32% Off</span>
            <h3>Kitchen Tool Set</h3>
            <p>Useful kitchen items for cutting, mixing, and easier daily cooking.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹799</span>
              <span class="deal-old-price">₹1,199</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Kitchen Tool Set">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Kitchen Tool Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Running shoes">
          <div class="deal-card-text">
            <span class="deal-label">28% Off</span>
            <h3>Comfort Running Shoes</h3>
            <p>Lightweight shoes with better grip and soft everyday comfort.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹1,799</span>
              <span class="deal-old-price">₹2,499</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Comfort Running Shoes">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Comfort Running Shoes">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=900&q=80" alt="Book">
          <div class="deal-card-text">
            <span class="deal-label">25% Off</span>
            <h3>Fresh Read Book</h3>
            <p>A useful and simple book for learning, reading, and better habits.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹399</span>
              <span class="deal-old-price">₹549</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Fresh Read Book">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Fresh Read Book">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1609592806596-b43fdb6dc1d7?auto=format&fit=crop&w=900&q=80" alt="Power bank">
          <div class="deal-card-text">
            <span class="deal-label">38% Off</span>
            <h3>Portable Power Bank</h3>
            <p>Helpful charging support for office, travel, and long daily phone use.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹999</span>
              <span class="deal-old-price">₹1,599</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Portable Power Bank">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Portable Power Bank">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="deal-card">
          <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=900&q=80" alt="Cleaning tool set">
          <div class="deal-card-text">
            <span class="deal-label">42% Off</span>
            <h3>Cleaning Tool Set</h3>
            <p>Simple home cleaning products for everyday use and better home care.</p>
            <div class="deal-price-line">
              <span class="deal-new-price">₹649</span>
              <span class="deal-old-price">₹1,129</span>
            </div>
            <div class="deal-buttons">
              <button class="deal-cart-btn" data-name="Cleaning Tool Set">Add to Cart</button>
              <button class="deal-buy-btn" data-name="Cleaning Tool Set">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="deal-bottom">
      <div class="deal-bottom-box">
        <p class="deal-tag">Deal Promise</p>
        <h2>More savings, lower prices, and better offers every day on My Shop.</h2>
        <p>
          This page is made for customers who want cheaper products and smart shopping.
          Explore today’s offers, compare prices, and buy your favorite items before the deals end.
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
    const dealCartButtons = document.querySelectorAll(".deal-cart-btn");
    const dealBuyButtons = document.querySelectorAll(".deal-buy-btn");
    const dealCartCount = document.querySelector(".cart-count");

    dealCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(dealCartCount.textContent) || 0;
        dealCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    dealBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>