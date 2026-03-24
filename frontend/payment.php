<?php
$products = [
  1 => ["name" => "Classic School Bag", "category" => "School Bags", "price" => 1499, "old" => 1999, "img" => "images/bag1.jpg"],
  2 => ["name" => "Travel Backpack Pro", "category" => "Travel Bags", "price" => 2499, "old" => 3199, "img" => "images/bag2.jpg"],
  3 => ["name" => "Kids Cartoon Bag", "category" => "Kids Bags", "price" => 999, "old" => 1399, "img" => "images/bag3.jpg"],
  4 => ["name" => "Office Laptop Bag", "category" => "Office Bags", "price" => 2199, "old" => 2799, "img" => "images/bag4.jpg"]
];

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 1;
$qty = isset($_GET["qty"]) ? max(1, (int) $_GET["qty"]) : 1;
$product = $products[$id] ?? $products[1];

if (!empty($_GET["name"])) {
  $product["name"] = trim((string) $_GET["name"]);
}
if (!empty($_GET["category"])) {
  $product["category"] = trim((string) $_GET["category"]);
}
if (!empty($_GET["image"])) {
  $product["img"] = trim((string) $_GET["image"]);
}
if (!empty($_GET["price"])) {
  $product["price"] = max(0, (int) $_GET["price"]);
}
if (!empty($_GET["old"])) {
  $product["old"] = max(0, (int) $_GET["old"]);
}
if (!empty($_GET["description"])) {
  $product["description"] = trim((string) $_GET["description"]);
}

$subtotal = $product["price"] * $qty;
$shipping = 0;
$taxes = round($subtotal * 0.02);
$total = $subtotal + $shipping + $taxes;
$orderSeed = crc32($product["name"] . "|" . $product["category"] . "|" . $qty);
$orderRef = 100000 + (abs((int) $orderSeed) % 900000);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($product["name"]); ?> - Payment - BagStore</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="checkout-page">
  <header class="site-header">
    <a href="index.php" class="logo">Bag<span>Store</span></a>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="all-bags.php">Bags</a>
      <a href="product.php">Product</a>
      <a href="wishlist.php">Wishlist</a>
      <a href="cart.php">Cart</a>
      <a href="contact.php">Contact</a>
    </nav>
    <div class="nav-actions">
      <a href="selling.php?id=<?php echo (int) $id; ?>" class="auth-btn login-btn">Back</a>
      <a href="all-bags.php" class="mini-btn">Shop More</a>
    </div>
  </header>

  <main class="checkout-wrap">
    <div class="checkout-steps">
      <div class="checkout-step done">
        <span class="step-dot"></span>
        <div>
          <strong>Shopping cart</strong>
          <span>Completed</span>
        </div>
      </div>
      <div class="checkout-step active">
        <span class="step-dot"></span>
        <div>
          <strong>Payment details</strong>
          <span>Current step</span>
        </div>
      </div>
      <div class="checkout-step">
        <span class="step-dot"></span>
        <div>
          <strong>Payment complete</strong>
          <span>Final step</span>
        </div>
      </div>
    </div>

    <section class="checkout-grid">
      <div class="checkout-card summary-card">
        <div class="card-title-row">
          <div>
            <span class="section-tag">Order Summary</span>
            <h1>Review your order</h1>
          </div>
          <div class="order-ref">Order reference: <strong><?php echo (int) $orderRef; ?></strong></div>
        </div>

        <div class="summary-item">
          <img src="<?php echo htmlspecialchars($product["img"]); ?>" alt="<?php echo htmlspecialchars($product["name"]); ?>" />
          <div class="summary-copy">
            <h3><?php echo htmlspecialchars($product["name"]); ?></h3>
            <p><?php echo htmlspecialchars($product["category"]); ?></p>
            <div class="summary-meta">Qty x <?php echo (int) $qty; ?></div>
          </div>
          <div class="summary-price">&#8377;<?php echo number_format($subtotal); ?></div>
        </div>

        <div class="summary-item">
          <img src="images/image4.jpg" alt="Gift wrap" />
          <div class="summary-copy">
            <h3>Packaging</h3>
            <p>Standard safe packaging</p>
            <div class="summary-meta">Included</div>
          </div>
          <div class="summary-price">Free</div>
        </div>

        <div class="summary-lines">
          <div class="summary-line"><span>Shipping</span><strong>Free</strong></div>
          <div class="summary-line"><span>Taxes</span><strong>&#8377;<?php echo number_format($taxes); ?></strong></div>
          <div class="summary-line total"><span>Total</span><strong>&#8377;<?php echo number_format($total); ?></strong></div>
        </div>

        <div class="summary-actions">
          <a href="#payment-details" class="btn btn-main continue-payment">Continue to secure payment</a>
          <a href="selling.php?id=<?php echo (int) $id; ?>" class="btn btn-light cancel-payment">Cancel payment</a>
        </div>
      </div>

      <div class="checkout-card payment-card" id="payment-details">
        <div class="card-title-row">
          <div>
            <span class="section-tag">Payment details</span>
            <h2>Select a payment method</h2>
          </div>
        </div>

        <form id="paymentForm" class="payment-form">
          <div class="payment-methods" id="paymentMethods">
            <label class="payment-method active">
              <input type="radio" name="method" value="gpay" checked />
              <span class="method-name">Google Pay</span>
              <span class="method-note">Pay quickly using UPI on Google Pay.</span>
            </label>

            <label class="payment-method">
              <input type="radio" name="method" value="upi" />
              <span class="method-name">UPI</span>
              <span class="method-note">Use PhonePe, Paytm, BHIM or any UPI app.</span>
            </label>

            <label class="payment-method">
              <input type="radio" name="method" value="card" />
              <span class="method-name">Debit / Credit Card</span>
              <span class="method-note">Enter your card details for payment.</span>
            </label>

            <label class="payment-method">
              <input type="radio" name="method" value="netbanking" />
              <span class="method-name">Net Banking</span>
              <span class="method-note">Choose your bank and pay online.</span>
            </label>

            <label class="payment-method">
              <input type="radio" name="method" value="cod" />
              <span class="method-name">Cash on Delivery</span>
              <span class="method-note">Pay when the order reaches you.</span>
            </label>
          </div>

          <div class="payment-help" id="paymentHelp">
            UPI ID: <strong>bagstore@upi</strong>. Use Google Pay or any UPI app to continue.
          </div>

          <div class="payment-fields">
            <div class="field">
              <label for="fullName">Full Name</label>
              <input id="fullName" type="text" placeholder="Enter your name" />
            </div>

            <div class="field">
              <label for="phone">Mobile Number</label>
              <input id="phone" type="tel" placeholder="Enter mobile number" />
            </div>

            <div class="field full">
              <label for="address">Delivery Address</label>
              <textarea id="address" placeholder="House number, street, area, city"></textarea>
            </div>

            <div class="field">
              <label for="city">City</label>
              <input id="city" type="text" placeholder="City" />
            </div>

            <div class="field">
              <label for="pincode">Pincode</label>
              <input id="pincode" type="text" placeholder="Pincode" />
            </div>
          </div>

          <button type="submit" class="btn btn-main secure-pay-btn continue-payment">Continue to secure payment</button>
          <a href="selling.php?id=<?php echo (int) $id; ?>" class="btn btn-light cancel-payment">Cancel payment</a>
          <div class="payment-note">This is a demo checkout page. You can connect a real gateway later.</div>
          <div class="checkout-success" id="checkoutSuccess">Payment details saved successfully.</div>
        </form>
      </div>
    </section>
  </main>

  <div class="toast" id="toast">Checkout ready</div>
  <script src="js/script.js"></script>
</body>
</html>
