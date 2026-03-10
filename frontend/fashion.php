<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fashion - My Shop</title>
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
        <option>Fashion</option>
        <option>Shoes</option>
        <option>Beauty</option>
        <option>Mobiles</option>
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
      <a href="Fresh.php">Fresh</a>
      <a href="about.php">About us </a>
      <a href="Bestsellers.php">Bestsellers</a>
      <a href="mobile.php">Mobiles</a>
      <a href="custom.php">Customer Service</a>
      <a href="todaydeal.php">Today's Deals</a>
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
  <main class="fashion-page">

    <section class="fashion-top">
      <div class="fashion-top-text">
        <p class="fashion-tag">Fashion</p>
        <h1>Shop stylish fashion items for daily wear, modern looks, and special moments.</h1>
        <p>
          Explore dresses, tops, shirts, jeans, handbags, watches, ethnic wear,
          and fashion accessories in one clean shopping page. This page is made
          to help customers find beautiful and wearable styles quickly.
        </p>

        <div class="fashion-top-btns">
          <a href="#fashion-products" class="fashion-main-btn">Shop Fashion</a>
          <a href="#fashion-types" class="fashion-light-btn">View Styles</a>
        </div>
      </div>

      <div class="fashion-top-image">
        <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1400&q=80" alt="Fashion collection">
      </div>
    </section>

    <section class="fashion-types" id="fashion-types">
      <div class="fashion-type-box">Dresses</div>
      <div class="fashion-type-box">Tops</div>
      <div class="fashion-type-box">Shirts</div>
      <div class="fashion-type-box">Jeans</div>
      <div class="fashion-type-box">Handbags</div>
      <div class="fashion-type-box">Watches</div>
      <div class="fashion-type-box">Ethnic Wear</div>
      <div class="fashion-type-box">Accessories</div>
    </section>

    <section class="fashion-help">
      <div class="fashion-help-box">
        <h3>For Daily Wear</h3>
        <p>Simple and comfortable styles for college, office, shopping, and regular use.</p>
      </div>

      <div class="fashion-help-box">
        <h3>For Trendy Looks</h3>
        <p>Modern pieces that help customers create stylish and fresh everyday outfits.</p>
      </div>

      <div class="fashion-help-box">
        <h3>For Special Days</h3>
        <p>Elegant fashion items for parties, events, dinners, and memorable occasions.</p>
      </div>

      <div class="fashion-help-box">
        <h3>For Easy Styling</h3>
        <p>Useful accessories and matching items that complete the full fashion look.</p>
      </div>
    </section>

    <section class="fashion-strip">
      <div class="fashion-strip-box">
        <span>New Style</span>
        <strong>Looks that feel fresh</strong>
      </div>

      <div class="fashion-strip-box">
        <span>Top Picks</span>
        <strong>Popular fashion choices</strong>
      </div>

      <div class="fashion-strip-box">
        <span>Wear With Ease</span>
        <strong>Comfort meets style</strong>
      </div>
    </section>

    <section class="fashion-products" id="fashion-products">
      <div class="fashion-head">
        <p class="fashion-tag">Featured Fashion</p>
        <h2>Fashion items you can buy right now</h2>
      </div>

      <div class="fashion-grid">

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=900&q=80" alt="Dress">
          <div class="fashion-card-text">
            <span class="fashion-label">Dress</span>
            <h3>Elegant Summer Dress</h3>
            <p>A soft and stylish dress made for outings, events, and modern daily fashion.</p>
            <div class="fashion-price">₹1,899</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Elegant Summer Dress">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Elegant Summer Dress">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=900&q=80" alt="Top">
          <div class="fashion-card-text">
            <span class="fashion-label">Top</span>
            <h3>Soft Casual Top</h3>
            <p>A comfortable top for daily wear with a neat fit and a simple stylish look.</p>
            <div class="fashion-price">₹899</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Soft Casual Top">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Soft Casual Top">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Shirt">
          <div class="fashion-card-text">
            <span class="fashion-label">Shirt</span>
            <h3>Classic Fashion Shirt</h3>
            <p>A clean and easy-to-style shirt that works well for office and casual use.</p>
            <div class="fashion-price">₹1,299</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Classic Fashion Shirt">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Classic Fashion Shirt">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=900&q=80" alt="Jeans">
          <div class="fashion-card-text">
            <span class="fashion-label">Jeans</span>
            <h3>Daily Blue Jeans</h3>
            <p>Comfortable jeans with a smart fit for daily use, travel, and easy styling.</p>
            <div class="fashion-price">₹1,599</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Daily Blue Jeans">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Daily Blue Jeans">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=900&q=80" alt="Handbag">
          <div class="fashion-card-text">
            <span class="fashion-label">Handbag</span>
            <h3>Elegant Handbag</h3>
            <p>A beautiful handbag with useful space and a polished fashion look.</p>
            <div class="fashion-price">₹2,199</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Elegant Handbag">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Elegant Handbag">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?auto=format&fit=crop&w=900&q=80" alt="Watch">
          <div class="fashion-card-text">
            <span class="fashion-label">Watch</span>
            <h3>Modern Wrist Watch</h3>
            <p>A stylish watch that adds a smart finishing touch to your outfit.</p>
            <div class="fashion-price">₹1,749</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Modern Wrist Watch">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Modern Wrist Watch">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&w=900&q=80" alt="Ethnic wear">
          <div class="fashion-card-text">
            <span class="fashion-label">Ethnic Wear</span>
            <h3>Elegant Ethnic Set</h3>
            <p>A graceful ethnic outfit designed for festive wear and special moments.</p>
            <div class="fashion-price">₹2,899</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Elegant Ethnic Set">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Elegant Ethnic Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="fashion-card">
          <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?auto=format&fit=crop&w=900&q=80" alt="Accessories">
          <div class="fashion-card-text">
            <span class="fashion-label">Accessories</span>
            <h3>Fashion Accessories Set</h3>
            <p>Simple accessories that complete the look and add more style to daily wear.</p>
            <div class="fashion-price">₹999</div>
            <div class="fashion-buttons">
              <button class="fashion-cart-btn" data-name="Fashion Accessories Set">Add to Cart</button>
              <button class="fashion-buy-btn" data-name="Fashion Accessories Set">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="fashion-bottom">
      <div class="fashion-bottom-box">
        <p class="fashion-tag">Why Buy From My Shop</p>
        <h2>Beautiful fashion, simple browsing, and easy shopping in one place.</h2>
        <p>
          My Shop helps customers discover wearable and stylish fashion in a clean layout.
          From dresses and tops to handbags and watches, this page is made for smooth shopping.
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
    const fashionCartButtons = document.querySelectorAll(".fashion-cart-btn");
    const fashionBuyButtons = document.querySelectorAll(".fashion-buy-btn");
    const fashionCartCount = document.querySelector(".cart-count");

    fashionCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(fashionCartCount.textContent) || 0;
        fashionCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    fashionBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>