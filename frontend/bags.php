<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bag Store - Bags</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>

    <nav class="nav">
      <a href="index.php" class="active">Home</a>

      <div class="dropdown">
        <a href="bags.php" class="drop-btn">
          Bags <span class="drop-icon">▾</span>
        </a>

        <div class="dropdown-menu">
          <a href="bags.php?category=all">All Bags</a>
          <a href="bags.php?category=travel">Travel Bags</a>
          <a href="bags.php?category=kids">Kids Bags</a>
          <a href="bags.php?category=school">School Bags</a>
          <a href="bags.php?category=college">College Bags</a>
          <a href="bags.php?category=office">Office Bags</a>
          <a href="bags.php?category=laptop">Laptop Bags</a>
          <a href="bags.php?category=hand">Hand Bags</a>
          <a href="bags.php?category=tote">Tote Bags</a>
          <a href="bags.php?category=gym">Gym Bags</a>
          <a href="bags.php?category=party">Party Bags</a>
          <a href="bags.php?category=mini">Mini Bags</a>
          <a href="bags.php?category=trolley">Trolley Bags</a>
        </div>
      </div>

      <a href="product.php">Product</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart <span class="cart-count">0</span></a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="nav-actions">
      <a href="login.php" class="auth-btn login-btn">Login</a>
    </div>

    <div class="nav-actions">
      <a href="bags.php" class="mini-btn">Shop Now</a>
    </div>
  </header>


  <section class="page-banner reveal">
    <div>
      <span class="section-tag">Collection page</span>
      <h1>All Bags</h1>
      <p>Pick the right design by style, use and budget.</p>
    </div>
  </section>

  <section class="shop-wrap">
    <aside class="filter-box reveal">
      <h3>Filter</h3>

      <div class="filter-group">
        <h4>Category</h4>
        <label><input type="checkbox"> Hand Bags</label>
        <label><input type="checkbox"> Backpacks</label>
        <label><input type="checkbox"> Office Bags</label>
        <label><input type="checkbox"> Travel Bags</label>
      </div>

      <div class="filter-group">
        <h4>Color</h4>
        <label><input type="checkbox"> Black</label>
        <label><input type="checkbox"> Brown</label>
        <label><input type="checkbox"> Beige</label>
        <label><input type="checkbox"> Blue</label>
      </div>

      <div class="filter-group">
        <h4>Price</h4>
        <label><input type="checkbox"> Under $40</label>
        <label><input type="checkbox"> $40 - $60</label>
        <label><input type="checkbox"> $60 - $90</label>
        <label><input type="checkbox"> Above $90</label>
      </div>
    </aside>

    <div class="shop-main">
      <div class="shop-bar reveal">
        <p>Showing 8 premium bags</p>
        <select>
          <option>Sort by latest</option>
          <option>Price low to high</option>
          <option>Price high to low</option>
          <option>Best selling</option>
        </select>
      </div>

      <div class="product-grid">
        <div class="product-card reveal hover-up">
          <span class="badge">New</span>
          <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Modern Black Bag</h3>
            <p>Premium office-ready shape with clean finish.</p>
            <div class="price-row"><span class="price">$59</span><span class="old-price">$72</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Modern Black Bag" data-price="59" data-image="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">Top</span>
          <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Classic Side Bag</h3>
            <p>Daily look with elegant shape and smooth carry.</p>
            <div class="price-row"><span class="price">$46</span><span class="old-price">$56</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Classic Side Bag" data-price="46" data-image="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">-20%</span>
          <img src="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Office Leather Bag</h3>
            <p>For work days, meetings and premium styling.</p>
            <div class="price-row"><span class="price">$64</span><span class="old-price">$80</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Office Leather Bag" data-price="64" data-image="https://images.unsplash.com/photo-1506629905607-c2d0d2d73e71?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">Hot</span>
          <img src="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Daily Backpack</h3>
            <p>Comfortable use for study, work and city travel.</p>
            <div class="price-row"><span class="price">$44</span><span class="old-price">$55</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Daily Backpack" data-price="44" data-image="https://images.unsplash.com/photo-1563904095333-b8f73cf2a349?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">Top</span>
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Travel Carry Bag</h3>
            <p>Spacious shape for short trips and easy packing.</p>
            <div class="price-row"><span class="price">$68</span><span class="old-price">$81</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Travel Carry Bag" data-price="68" data-image="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">New</span>
          <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Weekender Bag</h3>
            <p>Strong build with stylish look for travel days.</p>
            <div class="price-row"><span class="price">$74</span><span class="old-price">$89</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Weekender Bag" data-price="74" data-image="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">-10%</span>
          <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Mini Hand Bag</h3>
            <p>Small, stylish and great for light carrying.</p>
            <div class="price-row"><span class="price">$39</span><span class="old-price">$45</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Mini Hand Bag" data-price="39" data-image="https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>

        <div class="product-card reveal hover-up">
          <span class="badge">Hot</span>
          <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80" alt="Bag">
          <div class="product-info">
            <h3>Brown Classic Bag</h3>
            <p>Timeless design with rich color and strong body.</p>
            <div class="price-row"><span class="price">$52</span><span class="old-price">$63</span></div>
            <div class="card-actions">
              <a href="product.php" class="btn btn-light small-btn">Buy Now</a>
              <button class="btn btn-main small-btn add-cart" data-name="Brown Classic Bag" data-price="52" data-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80">Add to Cart</button>
            </div>
          </div>
        </div>
      </div>

      <section class="section inner-section reveal">
        <div class="section-head">
          <span class="section-tag">Shopping help</span>
          <h2>How to choose the right bag</h2>
        </div>

        <div class="info-grid">
          <div class="info-card hover-up">
            <h3>For office</h3>
            <p>Pick medium to large size with laptop support and clean shape.</p>
          </div>
          <div class="info-card hover-up">
            <h3>For travel</h3>
            <p>Choose wider storage, strong straps and more outer pockets.</p>
          </div>
          <div class="info-card hover-up">
            <h3>For fashion</h3>
            <p>Go for compact premium pieces with rich color and fine finish.</p>
          </div>
        </div>
      </section>
    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-grid">
      <div>
        <h3>BagStore</h3>
        <p>Premium bag shopping with style, comfort and clean design.</p>
      </div>
      <div>
        <h4>Pages</h4>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
      </div>
      <div>
        <h4>Shop</h4>
        <a href="bags.php">Bags</a>
        <a href="product.php">Product</a>
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