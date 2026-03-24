<?php
$products = [
  1 => [
    "id" => 1,
    "name" => "Classic School Bag",
    "category" => "School Bags",
    "price" => 1499,
    "old_price" => 1999,
    "rating" => 4.4,
    "reviews" => 1287,
    "stock" => "In Stock",
    "brand" => "BagStore",
    "color" => "Black Blue",
    "material" => "Water Resistant Fabric",
    "description" => "A durable everyday school bag with clean styling, padded straps and enough space for books, bottle and daily essentials.",
    "features" => [
      "Spacious main compartment",
      "Comfortable padded shoulder straps",
      "Water-resistant outer material",
      "Strong zippers and neat stitching"
    ],
    "images" => [
      "images/bag1.jpg",
      "images/bag2.jpg",
      "images/bag3.jpg",
      "images/bag4.jpg"
    ]
  ],
  2 => [
    "id" => 2,
    "name" => "Travel Backpack Pro",
    "category" => "Travel Bags",
    "price" => 2499,
    "old_price" => 3199,
    "rating" => 4.6,
    "reviews" => 2144,
    "stock" => "In Stock",
    "brand" => "BagStore",
    "color" => "Dark Grey",
    "material" => "Premium Polyester",
    "description" => "A premium travel backpack with multiple compartments, strong support and a neat modern look for trips and daily use.",
    "features" => [
      "Large storage capacity",
      "Laptop-friendly inner section",
      "Comfortable back support",
      "Lightweight travel-friendly design"
    ],
    "images" => [
      "images/bag2.jpg",
      "images/bag5.jpg",
      "images/bag6.jpg",
      "images/bag8.jpg"
    ]
  ],
  3 => [
    "id" => 3,
    "name" => "Kids Cartoon Bag",
    "category" => "Kids Bags",
    "price" => 999,
    "old_price" => 1399,
    "rating" => 4.3,
    "reviews" => 864,
    "stock" => "In Stock",
    "brand" => "BagStore",
    "color" => "Multi Color",
    "material" => "Soft Lightweight Fabric",
    "description" => "A cute and lightweight kids bag for school and daily use with a soft feel and easy carry straps.",
    "features" => [
      "Fun cartoon inspired look",
      "Soft and lightweight body",
      "Comfortable straps for kids",
      "Easy to carry every day"
    ],
    "images" => [
      "images/bag3.jpg",
      "images/bag7.jpg",
      "images/bag1.jpg",
      "images/bag5.jpg"
    ]
  ],
  4 => [
    "id" => 4,
    "name" => "Office Laptop Bag",
    "category" => "Office Bags",
    "price" => 2199,
    "old_price" => 2799,
    "rating" => 4.5,
    "reviews" => 1760,
    "stock" => "In Stock",
    "brand" => "BagStore",
    "color" => "Matte Black",
    "material" => "Premium Leather Finish",
    "description" => "A clean office laptop bag with smart compartments, secure padding and a polished professional look.",
    "features" => [
      "Smart office-friendly styling",
      "Safe padded laptop section",
      "Organized space for files and charger",
      "Strong handle and strap"
    ],
    "images" => [
      "images/bag4.jpg",
      "images/bag2.jpg",
      "images/bag5.jpg",
      "images/bag6.jpg"
    ]
  ]
];

$productId = isset($_GET['id']) ? (int) $_GET['id'] : 1;
$product = $products[$productId] ?? $products[1];
$mainImage = $product['images'][0] ?? '';
$discount = 0;

if (!empty($product['old_price']) && $product['old_price'] > $product['price']) {
  $discount = round((($product['old_price'] - $product['price']) / $product['old_price']) * 100);
}

function imageFallback($text = 'Product Image') {
  $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='900' height='900' viewBox='0 0 900 900'>
    <rect width='900' height='900' fill='#f6efe8'/>
    <rect x='60' y='60' width='780' height='780' rx='40' fill='#ffffff' stroke='#c28b5a' stroke-width='6'/>
    <text x='450' y='390' text-anchor='middle' font-size='56' fill='#a56a43' font-family='Arial' font-weight='700'>BagStore</text>
    <text x='450' y='470' text-anchor='middle' font-size='34' fill='#444444' font-family='Arial'>" . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . "</text>
    <text x='450' y='540' text-anchor='middle' font-size='24' fill='#777777' font-family='Arial'>Image not found</text>
  </svg>";

  return "data:image/svg+xml;charset=UTF-8," . rawurlencode($svg);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($product['name']); ?> - BagStore</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="selling-page">
  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="product.php">Products</a>
      <a href="all-bags.php">Bags</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart</a>
    </nav>
    <div class="nav-actions">
      <a href="product.php" class="auth-btn login-btn">Back</a>
      <a href="cart.php" class="mini-btn">Cart</a>
    </div>
  </header>

  <main class="selling-shell">
    <section class="selling-grid">
      <div class="selling-card selling-gallery">
        <div class="selling-main">
          <img
            id="sellingMainImage"
            data-product-id="<?php echo (int) $product['id']; ?>"
            src="<?php echo htmlspecialchars($mainImage); ?>"
            alt="<?php echo htmlspecialchars($product['name']); ?>"
            onerror="this.src='<?php echo imageFallback($product['name']); ?>';"
          />
        </div>

        <div class="selling-thumbs" aria-label="Product images">
          <?php foreach ($product['images'] as $index => $image): ?>
            <button
              class="selling-thumb <?php echo $index === 0 ? 'active' : ''; ?>"
              type="button"
              data-image="<?php echo htmlspecialchars($image); ?>"
              aria-label="View image <?php echo $index + 1; ?>"
            >
              <img
                src="<?php echo htmlspecialchars($image); ?>"
                alt="<?php echo htmlspecialchars($product['name']); ?> thumbnail <?php echo $index + 1; ?>"
                onerror="this.src='<?php echo imageFallback('Thumbnail'); ?>';"
              />
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="selling-card selling-summary">
        <span id="sellingCategory" class="selling-category"><?php echo htmlspecialchars($product['category']); ?></span>
        <h1 id="sellingTitle" class="selling-title"><?php echo htmlspecialchars($product['name']); ?></h1>

        <div class="selling-meta">
          <span id="sellingRating" class="selling-rating"><?php echo htmlspecialchars($product['rating']); ?> &#9733;</span>
          <span id="sellingReviews"><?php echo number_format($product['reviews']); ?> ratings</span>
          <span id="sellingStock"><?php echo htmlspecialchars($product['stock']); ?></span>
        </div>

        <div class="selling-price-row">
          <span id="sellingPrice" class="selling-price">&#8377;<?php echo number_format($product['price']); ?></span>
          <?php if ($discount > 0): ?>
            <span id="sellingOldPrice" class="selling-old-price">&#8377;<?php echo number_format($product['old_price']); ?></span>
            <span class="selling-offer">-<?php echo (int) $discount; ?>%</span>
          <?php endif; ?>
        </div>

        <p id="sellingDescription" class="selling-desc">
          <?php echo htmlspecialchars($product['description']); ?>
        </p>

        <div id="sellingHighlights" class="selling-highlights">
          <?php foreach ($product['features'] as $feature): ?>
            <div class="selling-highlight"><?php echo htmlspecialchars($feature); ?></div>
          <?php endforeach; ?>
        </div>

        <div class="selling-specs">
          <div><span>Brand</span><strong><?php echo htmlspecialchars($product['brand']); ?></strong></div>
          <div><span>Color</span><strong><?php echo htmlspecialchars($product['color']); ?></strong></div>
          <div><span>Material</span><strong><?php echo htmlspecialchars($product['material']); ?></strong></div>
        </div>

        <div class="selling-qty">
          <label for="sellingQty">Quantity</label>
          <select id="sellingQty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </div>

        <div class="selling-actions">
          <button
            id="sellingAddToCart"
            type="button"
            class="btn btn-light selling-btn add-cart"
            data-name="<?php echo htmlspecialchars($product['name']); ?>"
            data-price="<?php echo htmlspecialchars($product['price']); ?>"
            data-image="<?php echo htmlspecialchars($mainImage); ?>"
          >
            Add to Cart
          </button>
          <a
            id="sellingBuyNow"
            href="payment.php?id=<?php echo (int) $product['id']; ?>&qty=1"
            class="btn btn-main selling-btn"
          >
            Buy Now
          </a>
        </div>

        <p class="selling-note">Simple checkout, secure payment and easy return support.</p>
      </div>
    </section>
  </main>

  <script src="js/script.js"></script>
</body>
</html>
