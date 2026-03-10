<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Shop</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

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
        <option>Sports & Outdoors</option>
        <option>Beauty & Personal Care</option>
        <option>Health & Household</option>
        <option>Automotive</option>
        <option>Shoes</option>
      </select>

      <input type="text" placeholder="Search My Shop" />
      <button type="button" aria-label="Search">🔍</button>
    </div>

    <div class="menu">
      <div class="menu-box">
        <a href="/SHOP/admin/login.php">sign in</a>
        
      </div>

      <div class="menu-box">
        <p>Returns</p>
        <b>& Orders</b>
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
      <a href="books.php">Books</a>
      <a href="toysandgame.php">Toys & Games</a>
      <a href="sportsandoutdoor.php">Sports & Outdoors</a>
      <a href="beauty.php">Beauty & Personal Care</a>
      <a href="shoes.php">Shoes</a>
      <a href="sell.php">sell Products</a>
    </div>
  </div>

  <section class="slider">
    <div class="slider-box">
      <button class="slider-btn prev" type="button" aria-label="Previous">‹</button>

      <div class="slides">
        <div class="slide active">
          <img class="slide-img" src="https://t4.ftcdn.net/jpg/04/71/47/31/360_F_471473166_B8t0Z2OZDGrkk5T2UEOR9KgVhqSovmxS.jpg" alt="Mega Deals">
          <div class="slide-content">
            <h2>Mega Deals on My Shop</h2>
            <p>Best prices on electronics, fashion, and daily essentials.</p>
            <div class="slide-actions">
              <a class="slide-link" href="#">Shop Deals</a>
              <a class="slide-link2" href="#">Explore</a>
            </div>
          </div>
        </div>

        <div class="slide">
          <img class="slide-img" src="https://static.vecteezy.com/system/resources/previews/058/340/429/large_2x/shopping-online-excited-girl-holding-credit-card-and-paper-bags-over-turquoise-studio-wall-copyspace-photo.jpg" alt="Fast Delivery">
          <div class="slide-content">
            <h2>Fast Delivery</h2>
            <p>Quick shipping with safe packaging across your city.</p>
            <div class="slide-actions">
              <a class="slide-link" href="#">Start Shopping</a>
              <a class="slide-link2" href="#">Track Order</a>
            </div>
          </div>
        </div>

        <div class="slide">
          <img class="slide-img" src="https://media.istockphoto.com/id/1203642900/photo/beautiful-asian-woman-shopping-online-with-mobile-phone-on-banner-background.jpg?s=170667a&w=0&k=20&c=i_eNt1zRTic-bDjnRqJOFwwQKwSPLSEIR8XGNyxDWnU=" alt="Easy Returns">
          <div class="slide-content">
            <h2>Easy Returns</h2>
            <p>Hassle-free returns and quick support when you need it.</p>
            <div class="slide-actions">
              <a class="slide-link" href="#">Learn More</a>
              <a class="slide-link2" href="#">Contact Support</a>
            </div>
          </div>
        </div>
      </div>

      <button class="slider-btn next" type="button" aria-label="Next">›</button>

      <div class="dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
      </div>
    </div>
  </section>

  <main class="home-page">
    <section class="home-grid">

      <div class="home-card">
        <h2>Continue shopping deals</h2>
        <div class="big-image">
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80" alt="Deals">
        </div>
        <a href="#">See more deals</a>
      </div>

      <div class="home-card">
        <h2>Revamp your home in style</h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80" alt="Cushion covers">
            <span>Cushion covers</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format&fit=crop&w=800&q=80" alt="Figurines">
            <span>Figurines</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1583845112203-454b1f7f7b5d?auto=format&fit=crop&w=800&q=80" alt="Home storage">
            <span>Home storage</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Lighting">
            <span>Lighting solutions</span>
          </div>
        </div>
        <a href="#">Explore all</a>
      </div>

      <div class="home-card">
        <h2>Up to 50% off on essentials</h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80" alt="Mobiles">
            <span>Mobiles</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80" alt="Watches">
            <span>Watches</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80" alt="Headphones">
            <span>Headphones</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=800&q=80" alt="Accessories">
            <span>Accessories</span>
          </div>
        </div>
        <a href="#">See all offers</a>
      </div>

      <div class="home-card sign-card">
        <h2>Sign in for your best experience</h2>
        <button type="button">Sign in securely</button>
      </div>

      <div class="home-card">
        <h2>Appliances for your home | Up to 55% </h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1585659722983-3a675dabf23d?auto=format&fit=crop&w=800&q=80" alt="Air conditioners">
            <span>Air conditioners</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?auto=format&fit=crop&w=800&q=80" alt="Refrigerators">
            <span>Refrigerators</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?auto=format&fit=crop&w=800&q=80" alt="Microwaves">
            <span>Microwaves</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?auto=format&fit=crop&w=800&q=80" alt="Washing machines">
            <span>Washing machines</span>
          </div>
        </div>
        <a href="#">See more</a>
      </div>

      <div class="home-card">
        <h2>Starting ₹49 | Deals on home essentials</h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1583947582886-f40ec95dd752?auto=format&fit=crop&w=800&q=80" alt="Cleaning supplies">
            <span>Cleaning supplies</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1620626011761-996317b8d101?auto=format&fit=crop&w=800&q=80" alt="Bathroom">
            <span>Bathroom accessories</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80" alt="Home tools">
            <span>Home tools</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1616046229478-9901c5536a45?auto=format&fit=crop&w=800&q=80" alt="Wallpapers">
            <span>Wallpapers</span>
          </div>
        </div>
        <a href="#">Explore all</a>
      </div>

      <div class="home-card">
        <h2>Up to 50% off | Baby care & toys</h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1515488042361-ee00e0ddd4e4?auto=format&fit=crop&w=800&q=80" alt="Baby care">
            <span>Baby care</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=800&q=80" alt="Ride ons">
            <span>Ride ons</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=800&q=80" alt="Toy cars">
            <span>Toy cars</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1514090458221-65bb69cf63e6?auto=format&fit=crop&w=800&q=80" alt="Safety">
            <span>Safety</span>
          </div>
        </div>
        <a href="#">See all offers</a>
      </div>

      <div class="home-card">
        <h2>Starting ₹199 | My Shop Brands & more</h2>
        <div class="home-mini-grid">
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80" alt="Bedsheets">
            <span>Bedsheets</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80" alt="Curtains">
            <span>Curtains</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1582582621959-48d27397dc69?auto=format&fit=crop&w=800&q=80" alt="Iron board">
            <span>Iron board</span>
          </div>
          <div class="mini-item">
            <img src="https://images.unsplash.com/photo-1517705008128-361805f42e86?auto=format&fit=crop&w=800&q=80" alt="Decor">
            <span>Decor</span>
          </div>
        </div>
        <a href="#">See more</a>
      </div>

    </section>

    <section class="strip-section">
      <div class="strip-head">
        <h2>More items to consider</h2>
        <a href="#">See more</a>
      </div>

      <div class="product-strip">
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=500&q=80" alt="Bag"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=500&q=80" alt="Bag"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80" alt="Shoes"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80" alt="Fashion"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80" alt="Headphones"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80" alt="Watch"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=500&q=80" alt="Phone"></div>
        <div class="strip-item"><img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=500&q=80" alt="Sneakers"></div>
      </div>
    </section>

    <section class="product-row">
      <div class="strip-head">
        <h2>Inspired by your browsing history</h2>
        <a href="#">Page 1 of 6</a>
      </div>

      <div class="product-list">
        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80" alt="Earbuds">
          <h3>Wireless Earbuds with Noise Cancellation</h3>
          <div class="rating">★★★★★ <span>1,234</span></div>
          <p class="price">₹1,799</p>
          <p class="small-line">FREE Delivery</p>
        </article>

        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=500&q=80" alt="Watch">
          <h3>Smart Watch with Fitness Tracking</h3>
          <div class="rating">★★★★☆ <span>795</span></div>
          <p class="price">₹999</p>
          <p class="small-line">Limited time deal</p>
        </article>

        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=500&q=80" alt="Screen protector">
          <h3>Tempered Glass Protector for Watch</h3>
          <div class="rating">★★★★☆ <span>3,859</span></div>
          <p class="price">₹299</p>
          <p class="small-line">Best Seller</p>
        </article>

        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=500&q=80" alt="Case">
          <h3>Premium Watch Case Compatible Design</h3>
          <div class="rating">★★★★☆ <span>941</span></div>
          <p class="price">₹548</p>
          <p class="small-line">FREE Delivery</p>
        </article>

        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80" alt="Shoes">
          <h3>Comfortable Running Shoes for Men</h3>
          <div class="rating">★★★★★ <span>2,272</span></div>
          <p class="price">₹1,699</p>
          <p class="small-line">Limited time deal</p>
        </article>

        <article class="product-card">
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80" alt="Shirt">
          <h3>Casual Fashion Shirt for Everyday Wear</h3>
          <div class="rating">★★★★☆ <span>1,102</span></div>
          <p class="price">₹799</p>
          <p class="small-line">FREE Delivery</p>
        </article>
      </div>
    </section>

    <section class="recommend-box">
      <h2>See personalized recommendations</h2>
      <button type="button" onclick="window.location.href='/SHOP/admin/login.php'">Pre-Registered user</button>
      <p>New customer? <a href="/SHOP/admin/register.php">Make account</a></p>
    </section>
  </main>

  <footer class="footer">
    <div class="footer-top">Back to top</div>

    <div class="footer-main">
      <div class="footer-column">
        <h3>Get to Know Us</h3>
        <a href="/Shop/frontend/about.php">About My Shop</a>
        <a href="#">Careers</a>
        <a href="#">Press Releases</a>
        <a href="#">My Shop Science</a>
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
        <a href="#">Sell under My Shop Accelerator</a>
        <a href="#">Become an Affiliate</a>
        <a href="#">Advertise Your Products</a>
      </div>

      <div class="footer-column">
        <h3>Let Us Help You</h3>
        <a href="#">Your Account</a>
        <a href="#">Returns Centre</a>
        <a href="#">100% Purchase Protection</a>
        <a href="#">Help</a>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="footer-logo">My<span>Shop</span></div>
      <p>© 2026 MyShop.com, Inc. All rights reserved.</p>
    </div>
  </footer>

  <script>
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");

    let index = 0;

    function showSlide(i) {
      slides.forEach(s => s.classList.remove("active"));
      dots.forEach(d => d.classList.remove("active"));
      slides[i].classList.add("active");
      dots[i].classList.add("active");
      index = i;
    }

    function next() {
      showSlide((index + 1) % slides.length);
    }

    function prev() {
      showSlide((index - 1 + slides.length) % slides.length);
    }

    nextBtn.addEventListener("click", next);
    prevBtn.addEventListener("click", prev);

    dots.forEach(d => {
      d.addEventListener("click", () => showSlide(Number(d.dataset.slide)));
    });

    setInterval(next, 4500);
  </script>
</body>
</html>