<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>School Bags - Bag Store</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>

    <nav class="nav">
      <a href="index.php">Home</a>

      <div class="dropdown">
        <a href="school-bags.php" class="drop-btn active">
          Bags <span class="drop-icon">&#9662;</span>
        </a>

        <div class="dropdown-menu">
          <a href="all-bags.php">All Bags</a>
          <a href="travel-bags.php">Travel Bags</a>
          <a href="kids-bags.php">Kids Bags</a>
          <a href="school-bags.php">School Bags</a>
          <a href="college-bags.php">College Bags</a>
          <a href="office-bags.php">Office Bags</a>
          <a href="ladies-bags.php">Ladies Bags</a>
          <a href="laptop-bags.php">Laptop Bags</a>
          <a href="hand-bags.php">Hand Bags</a>
          <a href="tote-bags.php">Tote Bags</a>
          <a href="gym-bags.php">Gym Bags</a>
          <a href="party-bags.php">Party Bags</a>
          <a href="mini-bags.php">Mini Bags</a>
          <a href="trolley-bags.php">Trolley Bags</a>
        </div>
      </div>

      <a href="product.php">Product</a>
      <a href="about.php">About</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="nav-actions">
      <a href="/Shop/admin/login.php" class="auth-btn login-btn">Login</a>
      <a href="all-bags.php" class="mini-btn">Shop Now</a>
    </div>
  </header>

  <section class="page-banner reveal">
    <div class="page-banner-content">
      <span class="small-tag">School range</span>
      <h1>School Bags</h1>
      <p>Comfortable, strong and useful bags made for books, bottles, lunch items and everyday school routine.</p>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">Student pick</span>
      <h2>Bags made for every school day</h2>
      <p>Useful storage, easy comfort and strong support for daily student use.</p>
    </div>

    <div class="product-grid">
      <div class="product-card hover-up">
        <img src="images/schoolbag1.jpg" alt="Student School Bag">
        <div class="product-info">
          <h3>Student School Bag</h3>
          <p>Good space for books, bottle and lunch items.</p>
          <div class="price-row">
            <span class="price">$39</span>
            <span class="old-price">$47</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Student School Bag" data-price="39" data-image="images/schoolbag1.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/schoolbag2.jpg" alt="Book Carry Backpack">
        <div class="product-info">
          <h3>Book Carry Backpack</h3>
          <p>Neat storage for notebooks, school tools and daily items.</p>
          <div class="price-row">
            <span class="price">$42</span>
            <span class="old-price">$50</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Book Carry Backpack" data-price="42" data-image="images/schoolbag2.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image1.jpg" alt="Daily Class Bag">
        <div class="product-info">
          <h3>Daily Class Bag</h3>
          <p>Light design for regular school use and daily comfort.</p>
          <div class="price-row">
            <span class="price">$36</span>
            <span class="old-price">$44</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Daily Class Bag" data-price="36" data-image="images/image1.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image2.jpg" alt="Strong Zip School Bag">
        <div class="product-info">
          <h3>Strong Zip School Bag</h3>
          <p>Simple style with comfortable straps and safe storage.</p>
          <div class="price-row">
            <span class="price">$41</span>
            <span class="old-price">$49</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Strong Zip School Bag" data-price="41" data-image="images/image2.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image3.jpg" alt="Junior Study Backpack">
        <div class="product-info">
          <h3>Junior Study Backpack</h3>
          <p>Useful daily school bag with organized space for student essentials.</p>
          <div class="price-row">
            <span class="price">$43</span>
            <span class="old-price">$52</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Junior Study Backpack" data-price="43" data-image="images/image3.jpg">Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card hover-up">
        <img src="images/image4.jpg" alt="Classroom Comfort Bag">
        <div class="product-info">
          <h3>Classroom Comfort Bag</h3>
          <p>Balanced carry and useful room for daily books and supplies.</p>
          <div class="price-row">
            <span class="price">$44</span>
            <span class="old-price">$53</span>
          </div>
          <div class="card-actions">
            <a href="selling.php?id=1" class="btn btn-light">Buy Now</a>
            <button class="btn btn-main add-cart" data-name="Classroom Comfort Bag" data-price="44" data-image="images/image4.jpg">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section light-bg reveal">
    <div class="section-head">
      <span class="section-tag">Why choose these</span>
      <h2>Made for school comfort and daily use</h2>
      <p>These school bags are built for books, bottles, easy carrying and regular student routine.</p>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>Book space</h3>
        <p>Carry books, copies and class material neatly every day.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Strong zip</h3>
        <p>Safe and useful for regular school use and daily movement.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Easy comfort</h3>
        <p>Balanced weight and simple carry for students.</p>
      </div>

      <div class="info-card hover-up">
        <h3>Daily support</h3>
        <p>Useful for school timing, homework items and regular routine.</p>
      </div>
    </div>
  </section>

  <section class="section reveal">
    <div class="section-head">
      <span class="section-tag">More collections</span>
      <h2>Explore more bag categories</h2>
      <p>Check other styles from our store for kids, college and travel needs.</p>
    </div>

    <div class="info-grid">
      <div class="info-card hover-up">
        <h3>Kids Bags</h3>
        <p>Light and fun bags made for small daily carry.</p>
        <a href="kids-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>College Bags</h3>
        <p>Comfortable bags for books, laptop and campus use.</p>
        <a href="college-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>Travel Bags</h3>
        <p>Spacious bags for family trips and short travel plans.</p>
        <a href="travel-bags.php" class="btn btn-light small-btn">View More</a>
      </div>

      <div class="info-card hover-up">
        <h3>All Bags</h3>
        <p>Browse the complete collection in one page.</p>
        <a href="all-bags.php" class="btn btn-light small-btn">Browse All</a>
      </div>
    </div>
  </section>

  <section class="newsletter reveal">
    <div class="newsletter-box">
      <div>
        <span class="section-tag">Stay updated</span>
        <h2>Get latest school bag offers</h2>
      </div>

      <form class="newsletter-form">
        <input type="email" placeholder="Enter your email" />
        <button type="submit" class="btn btn-main">Subscribe</button>
      </form>
    </div>
  </section>

  <section class="register-bottom reveal">
    <div class="register-bottom-box">
      <h2>Find the right school bag</h2>
      <p>Create your account and start shopping now.</p>
      <a href="/Shop/admin/register.php" class="register-bottom-btn">Register Now</a>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Modern bags for office, college, travel and everyday life.</p>
      </div>

      <div>
        <h4>Pages</h4>
        <a href="index.php">Home</a>
        <a href="all-bags.php">Bags</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </div>

      <div>
        <h4>Shop</h4>
        <a href="product.php">Product</a>
        <a href="wishlist.php">Wishlist</a>
        <a href="cart.php">Cart</a>
      </div>

      <div>
        <h4>Contact</h4>
        <p>Email: support@bagstore.com</p>
        <p>Phone: +91 98765 43210</p>
      </div>
    </div>
  </footer>

  <div class="toast" id="toast">Added to cart</div>

  <script src="js/script.js"></script>
</body>
</html>

