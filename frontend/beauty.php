<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beauty & Personal Care - My Shop</title>
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
        <option>Beauty & Personal Care</option>
        <option>Mobiles</option>
        <option>Electronics</option>
        <option>Home & Kitchen</option>
        <option>Books</option>
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
      <a href="shoes.php">Shoes</a>
    </div>
  </div>
  <!-- PAGE -->
  <main class="beauty-page">

    <section class="beauty-top">
      <div class="beauty-top-text">
        <p class="beauty-tag">Beauty & Personal Care</p>
        <h1>Shop skincare, makeup, hair care, and self-care essentials in one beautiful place.</h1>
        <p>
          Explore face serums, lipsticks, perfumes, hair tools, moisturizers, body care,
          and daily beauty products in a soft and elegant shopping page. This page is made
          to help customers discover products that feel stylish, useful, and easy to buy.
        </p>

        <div class="beauty-top-btns">
          <a href="#beauty-products" class="beauty-main-btn">Shop Beauty</a>
          <a href="#beauty-types" class="beauty-light-btn">View Types</a>
        </div>
      </div>

      <div class="beauty-top-image">
        <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=1400&q=80" alt="Beauty products">
      </div>
    </section>

    <section class="beauty-types" id="beauty-types">
      <div class="beauty-type-box">Skincare</div>
      <div class="beauty-type-box">Makeup</div>
      <div class="beauty-type-box">Hair Care</div>
      <div class="beauty-type-box">Perfume</div>
      <div class="beauty-type-box">Body Care</div>
      <div class="beauty-type-box">Face Care</div>
      <div class="beauty-type-box">Tools</div>
      <div class="beauty-type-box">Self Care</div>
    </section>

    <section class="beauty-help">
      <div class="beauty-help-box">
        <h3>For Daily Care</h3>
        <p>Simple beauty products for fresh skin, soft hair, and easy everyday care.</p>
      </div>

      <div class="beauty-help-box">
        <h3>For Makeup Looks</h3>
        <p>Makeup items that help create soft, bold, or elegant looks for any occasion.</p>
      </div>

      <div class="beauty-help-box">
        <h3>For Hair Routine</h3>
        <p>Hair care products and tools that help with shine, smoothness, and styling.</p>
      </div>

      <div class="beauty-help-box">
        <h3>For Self Care</h3>
        <p>Relaxing and beautiful products that make everyday care feel more special.</p>
      </div>
    </section>

    <section class="beauty-note-strip">
      <div class="beauty-note-card">
        <span>Soft beauty picks</span>
        <strong>Glow with simple care</strong>
      </div>
      <div class="beauty-note-card">
        <span>Daily essentials</span>
        <strong>Fresh skin, soft hair</strong>
      </div>
      <div class="beauty-note-card">
        <span>Elegant collection</span>
        <strong>Beauty made easy</strong>
      </div>
    </section>

    <section class="beauty-products" id="beauty-products">
      <div class="beauty-head">
        <p class="beauty-tag">Featured Products</p>
        <h2>Beauty and personal care items you can buy</h2>
      </div>

      <div class="beauty-grid">

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80" alt="Face serum">
          <div class="beauty-card-text">
            <span class="beauty-label">Skincare</span>
            <h3>Glow Face Serum</h3>
            <p>Light face serum made for smoother skin, soft glow, and daily freshness.</p>
            <div class="beauty-price">₹899</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Glow Face Serum">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Glow Face Serum">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1583241800698-9b3d4b4f9950?auto=format&fit=crop&w=900&q=80" alt="Lipstick">
          <div class="beauty-card-text">
            <span class="beauty-label">Makeup</span>
            <h3>Velvet Lipstick Set</h3>
            <p>Soft finish lipstick shades designed for elegant looks and daily beauty use.</p>
            <div class="beauty-price">₹1,199</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Velvet Lipstick Set">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Velvet Lipstick Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1527799820374-dcf8d9d4a388?auto=format&fit=crop&w=900&q=80" alt="Perfume">
          <div class="beauty-card-text">
            <span class="beauty-label">Perfume</span>
            <h3>Floral Perfume</h3>
            <p>A soft and graceful fragrance for daily wear, outings, and special moments.</p>
            <div class="beauty-price">₹1,499</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Floral Perfume">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Floral Perfume">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80" alt="Hair care">
          <div class="beauty-card-text">
            <span class="beauty-label">Hair Care</span>
            <h3>Silk Hair Care Set</h3>
            <p>Hair care products made for smooth feel, soft shine, and simple everyday care.</p>
            <div class="beauty-price">₹1,299</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Silk Hair Care Set">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Silk Hair Care Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1619451334792-150fd785ee74?auto=format&fit=crop&w=900&q=80" alt="Moisturizer">
          <div class="beauty-card-text">
            <span class="beauty-label">Face Care</span>
            <h3>Soft Skin Moisturizer</h3>
            <p>Daily moisturizer for a fresh feel, smooth texture, and long-lasting softness.</p>
            <div class="beauty-price">₹749</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Soft Skin Moisturizer">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Soft Skin Moisturizer">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1607602132700-068258b9f0c2?auto=format&fit=crop&w=900&q=80" alt="Body care">
          <div class="beauty-card-text">
            <span class="beauty-label">Body Care</span>
            <h3>Body Lotion Set</h3>
            <p>Hydrating lotion set for soft skin, gentle care, and a fresh daily routine.</p>
            <div class="beauty-price">₹999</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Body Lotion Set">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Body Lotion Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=900&q=80" alt="Makeup brush">
          <div class="beauty-card-text">
            <span class="beauty-label">Tools</span>
            <h3>Makeup Brush Set</h3>
            <p>Beautiful and useful brush set for smoother makeup application and neat finish.</p>
            <div class="beauty-price">₹849</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Makeup Brush Set">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Makeup Brush Set">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="beauty-card">
          <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=900&q=80" alt="Self care set">
          <div class="beauty-card-text">
            <span class="beauty-label">Self Care</span>
            <h3>Relax Self Care Kit</h3>
            <p>A simple self-care set made for calm moments, beauty routine, and personal comfort.</p>
            <div class="beauty-price">₹1,599</div>
            <div class="beauty-buttons">
              <button class="beauty-cart-btn" data-name="Relax Self Care Kit">Add to Cart</button>
              <button class="beauty-buy-btn" data-name="Relax Self Care Kit">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="beauty-bottom">
      <div class="beauty-bottom-box">
        <p class="beauty-tag">Why Buy From My Shop</p>
        <h2>Elegant beauty products, soft colors, and an easy shopping experience.</h2>
        <p>
          My Shop helps customers discover beauty and personal care products in a clean and beautiful layout.
          From skincare and makeup to perfume and self-care, this page is made for smooth browsing and buying.
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
    const beautyCartButtons = document.querySelectorAll(".beauty-cart-btn");
    const beautyBuyButtons = document.querySelectorAll(".beauty-buy-btn");
    const beautyCartCount = document.querySelector(".cart-count");

    beautyCartButtons.forEach(button => {
      button.addEventListener("click", () => {
        let count = parseInt(beautyCartCount.textContent) || 0;
        beautyCartCount.textContent = count + 1;
        alert(button.dataset.name + " added to cart");
      });
    });

    beautyBuyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("You selected to buy: " + button.dataset.name);
      });
    });
  </script>

</body>
</html>