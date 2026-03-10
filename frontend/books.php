<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Books Collection - My Shop</title>
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
        <option>Books</option>
        <option>Electronics</option>
        <option>Clothing</option>
        <option>Home & Kitchen</option>
        <option>Shoes</option>
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
      <a href="toysandgame.php">Toys & Games</a>
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
    </div>
  </div>

  <!-- BOOKS PAGE -->
  <main class="books-page">

    <section class="books-banner-section">
      <div class="books-banner-text">
        <p class="books-page-tag">Books Collection</p>
        <h1>Shop inspiring books, bestsellers, and timeless reads for every reader.</h1>
        <p>
          Discover fiction, self-growth, finance, history, science, and classic books in one clean shopping page.
          Whether you love reading for learning, motivation, entertainment, or personal growth, My Shop gives you
          a beautiful place to explore books worth buying.
        </p>

        <div class="books-banner-actions">
          <a href="#books-collection-grid" class="books-primary-button">Shop Books</a>
          <a href="#book-categories" class="books-secondary-button">View Categories</a>
        </div>
      </div>

      <div class="books-banner-image">
        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1400&q=80" alt="Books collection">
      </div>
    </section>

    <section class="book-category-strip" id="book-categories">
      <div class="book-category-box">Fiction</div>
      <div class="book-category-box">Self Growth</div>
      <div class="book-category-box">Business</div>
      <div class="book-category-box">Finance</div>
      <div class="book-category-box">History</div>
      <div class="book-category-box">Science</div>
      <div class="book-category-box">Motivation</div>
      <div class="book-category-box">Classic</div>
    </section>

    <section class="book-reading-benefits">
      <div class="book-benefit-card">
        <h3>For Learning</h3>
        <p>Read books that build knowledge, sharpen thinking, and improve understanding of real-world ideas.</p>
      </div>

      <div class="book-benefit-card">
        <h3>For Growth</h3>
        <p>Choose personal development titles that help improve confidence, habits, discipline, and mindset.</p>
      </div>

      <div class="book-benefit-card">
        <h3>For Inspiration</h3>
        <p>Explore stories and motivational books that bring fresh energy, purpose, and perspective.</p>
      </div>

      <div class="book-benefit-card">
        <h3>For Enjoyment</h3>
        <p>Find timeless novels and engaging stories that make reading more relaxing and memorable.</p>
      </div>
    </section>

    <section class="books-collection-section" id="books-collection-grid">
      <div class="books-section-heading">
        <p class="books-page-tag">Featured Books</p>
        <h2>Books you can shop right now</h2>
      </div>

      <div class="books-collection-grid">

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=900&q=80" alt="Fiction book">
          <div class="book-product-details">
            <span class="book-genre-badge">Fiction</span>
            <h3>The Silent Story</h3>
            <p>A gripping fiction read with mystery, emotion, and unforgettable storytelling.</p>
            <div class="book-product-price">₹499</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=900&q=80" alt="Self growth book">
          <div class="book-product-details">
            <span class="book-genre-badge">Self Growth</span>
            <h3>Atomic Habits</h3>
            <p>Learn how small daily improvements can create powerful long-term results.</p>
            <div class="book-product-price">₹599</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1495640388908-05fa85288e61?auto=format&fit=crop&w=900&q=80" alt="Business book">
          <div class="book-product-details">
            <span class="book-genre-badge">Business</span>
            <h3>Think and Grow Rich</h3>
            <p>A classic book focused on mindset, ambition, success, and wealth thinking.</p>
            <div class="book-product-price">₹450</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?auto=format&fit=crop&w=900&q=80" alt="Motivation book">
          <div class="book-product-details">
            <span class="book-genre-badge">Motivation</span>
            <h3>The Power Within</h3>
            <p>An inspiring book for confidence, focus, discipline, and stronger life direction.</p>
            <div class="book-product-price">₹399</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=900&q=80" alt="Classic book">
          <div class="book-product-details">
            <span class="book-genre-badge">Classic</span>
            <h3>Pride and Prejudice</h3>
            <p>A timeless classic filled with elegance, wit, emotion, and memorable characters.</p>
            <div class="book-product-price">₹549</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1511108690759-009324a90311?auto=format&fit=crop&w=900&q=80" alt="Finance book">
          <div class="book-product-details">
            <span class="book-genre-badge">Finance</span>
            <h3>Rich Dad Poor Dad</h3>
            <p>A popular finance book that changes the way many people think about money.</p>
            <div class="book-product-price">₹520</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1526243741027-444d633d7365?auto=format&fit=crop&w=900&q=80" alt="History book">
          <div class="book-product-details">
            <span class="book-genre-badge">History</span>
            <h3>World of Empires</h3>
            <p>Dive into powerful stories, civilizations, leaders, and turning points in history.</p>
            <div class="book-product-price">₹610</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

        <div class="book-product-card">
          <img src="https://images.unsplash.com/photo-1519682337058-a94d519337bc?auto=format&fit=crop&w=900&q=80" alt="Science book">
          <div class="book-product-details">
            <span class="book-genre-badge">Science</span>
            <h3>The Curious Mind</h3>
            <p>A smart and engaging read for people who enjoy science, ideas, and discovery.</p>
            <div class="book-product-price">₹575</div>
            <div class="book-product-actions">
              <button class="book-add-cart-button">Add to Cart</button>
              <button class="book-buy-now-button">Buy Now</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="books-page-bottom-note">
      <div class="books-page-bottom-box">
        <p class="books-page-tag">Why Buy Books From My Shop</p>
        <h2>Find valuable books in a clean and easy shopping experience.</h2>
        <p>
          My Shop makes book shopping simple, beautiful, and organized. From useful self-growth books to
          enjoyable fiction and classic reads, this page is designed to help readers discover the next book
          they want to own.
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