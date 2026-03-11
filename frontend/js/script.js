document.addEventListener("DOMContentLoaded", () => {
  "use strict";

  const CART_KEY = "bagCart";
  const $ = (selector, scope = document) => scope.querySelector(selector);
  const $$ = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));

  /* -----------------------------
     Dynamic animation styles
  ----------------------------- */
  function injectAnimationStyles() {
    if ($("#js-animation-styles")) return;

    const style = document.createElement("style");
    style.id = "js-animation-styles";
    style.textContent = `
      .progress-line{
        position:fixed;
        top:0;
        left:0;
        width:0;
        height:3px;
        background:linear-gradient(90deg,#b4774d,#7f4b2c);
        z-index:5000;
        box-shadow:0 6px 18px rgba(180,119,77,.35);
      }

      .page-loader{
        position:fixed;
        inset:0;
        display:flex;
        align-items:center;
        justify-content:center;
        background:
          radial-gradient(circle at 30% 20%, rgba(212,177,149,.28), transparent 35%),
          linear-gradient(180deg,#f8f1ea 0%, #f3e7dc 100%);
        z-index:6000;
        transition:opacity .6s ease, visibility .6s ease;
      }

      .page-loader.hide{
        opacity:0;
        visibility:hidden;
      }

      .loader-core{
        width:86px;
        height:86px;
        border-radius:50%;
        border:5px solid rgba(180,119,77,.16);
        border-top-color:#a56a43;
        animation:spinLoader 1s linear infinite;
        position:relative;
      }

      .loader-core::after{
        content:"";
        position:absolute;
        inset:12px;
        border-radius:50%;
        border:4px solid rgba(127,75,44,.14);
        border-bottom-color:#7f4b2c;
        animation:spinLoaderReverse .8s linear infinite;
      }

      .toast{
        position:fixed;
        right:20px;
        bottom:20px;
        background:rgba(20,14,12,.96);
        color:#fff;
        padding:14px 20px;
        border-radius:16px;
        box-shadow:0 18px 40px rgba(0,0,0,.2);
        z-index:5500;
        opacity:0;
        transform:translateY(25px) scale(.96);
        transition:opacity .35s ease, transform .35s ease;
      }

      .toast.show{
        opacity:1;
        transform:translateY(0) scale(1);
      }

      .back-top{
        position:fixed;
        right:18px;
        bottom:18px;
        width:52px;
        height:52px;
        border:none;
        border-radius:50%;
        background:linear-gradient(135deg,#b4774d,#7f4b2c);
        color:#fff;
        font-size:20px;
        font-weight:900;
        cursor:pointer;
        box-shadow:0 18px 38px rgba(165,106,67,.3);
        opacity:0;
        visibility:hidden;
        transform:translateY(15px);
        transition:all .35s ease;
        z-index:5000;
      }

      .back-top.show{
        opacity:1;
        visibility:visible;
        transform:translateY(0);
      }

      .reveal{
        opacity:0;
        transform:translateY(55px);
        transition:opacity .95s cubic-bezier(.2,.65,.2,1), transform .95s cubic-bezier(.2,.65,.2,1);
        will-change:transform, opacity;
      }

      .reveal.reveal-left{ transform:translateX(-65px); }
      .reveal.reveal-right{ transform:translateX(65px); }
      .reveal.reveal-zoom{ transform:scale(.88); }

      .reveal.show{
        opacity:1;
        transform:none !important;
      }

      .slide-text > *{
        opacity:0;
        transform:translateY(34px);
        transition:opacity .75s ease, transform .75s ease;
      }

      .slide.active .slide-text > *{
        opacity:1;
        transform:translateY(0);
      }

      .slide.active .slide-text > *:nth-child(1){ transition-delay:.10s; }
      .slide.active .slide-text > *:nth-child(2){ transition-delay:.22s; }
      .slide.active .slide-text > *:nth-child(3){ transition-delay:.34s; }
      .slide.active .slide-text > *:nth-child(4){ transition-delay:.46s; }

      .slide-image img{
        transition:transform .8s ease, opacity .45s ease, filter .45s ease;
      }

      .slide.active .slide-image img{
        animation:kenBurns 5.5s ease forwards;
      }

      .slider-progress{
        position:absolute;
        left:0;
        bottom:0;
        height:4px;
        width:100%;
        background:rgba(255,255,255,.35);
        z-index:9;
        overflow:hidden;
      }

      .slider-progress-bar{
        width:0%;
        height:100%;
        background:linear-gradient(90deg,#c18458,#7d4b2d);
        box-shadow:0 0 20px rgba(165,106,67,.35);
      }

      .thumb-grid img{
        cursor:pointer;
        transition:transform .3s ease, box-shadow .3s ease, outline .3s ease, opacity .3s ease;
      }

      .thumb-grid img.is-active{
        outline:3px solid #a56a43;
        transform:translateY(-4px);
        box-shadow:0 18px 34px rgba(0,0,0,.12);
      }

      .cart-item-content{
        flex:1;
        width:100%;
      }

      .qty-controls{
        display:flex;
        align-items:center;
        gap:10px;
        margin-top:14px;
        flex-wrap:wrap;
      }

      .qty-btn{
        width:38px;
        height:38px;
        border:none;
        border-radius:50%;
        background:#efe1d4;
        color:#7b4b2b;
        font-size:20px;
        font-weight:800;
        cursor:pointer;
        transition:transform .22s ease, background .22s ease;
      }

      .qty-btn:hover{
        background:#e8d4c4;
        transform:translateY(-2px);
      }

      .qty-value{
        min-width:40px;
        text-align:center;
        font-weight:800;
      }

      .cart-line-total{
        margin-top:8px;
        font-weight:800;
        color:#9c623d;
        font-size:18px;
      }

      .remove-btn{
        margin-top:12px;
        background:transparent;
        border:none;
        color:#c44f4f;
        font-weight:700;
        cursor:pointer;
      }

      .remove-btn:hover{
        text-decoration:underline;
      }

      .magnetic{
        transition:transform .18s ease;
        will-change:transform;
      }

      .js-tilt{
        transform-style:preserve-3d;
        will-change:transform;
        transition:transform .22s ease, box-shadow .22s ease;
      }

      .js-glow{
        position:relative;
        overflow:hidden;
      }

      .js-glow::before{
        content:"";
        position:absolute;
        inset:auto;
        width:180px;
        height:180px;
        background:radial-gradient(circle, rgba(255,255,255,.24), transparent 70%);
        pointer-events:none;
        opacity:0;
        transform:translate(-50%,-50%);
        transition:opacity .25s ease;
      }

      .js-glow.active-glow::before{
        opacity:1;
        left:var(--glow-x);
        top:var(--glow-y);
      }

      .btn.loading,
      .mini-btn.loading{
        pointer-events:none;
        opacity:.8;
      }

      .shake{
        animation:shakeCart .45s ease;
      }

      @keyframes shakeCart{
        0%,100%{ transform:translateX(0); }
        25%{ transform:translateX(-3px); }
        50%{ transform:translateX(3px); }
        75%{ transform:translateX(-2px); }
      }

      @keyframes spinLoader{
        to{ transform:rotate(360deg); }
      }

      @keyframes spinLoaderReverse{
        to{ transform:rotate(-360deg); }
      }

      @keyframes kenBurns{
        0%{ transform:scale(1) translateY(0); }
        100%{ transform:scale(1.06) translateY(-4px); }
      }
    `;
    document.head.appendChild(style);
  }

  injectAnimationStyles();

  /* -----------------------------
     UI helpers
  ----------------------------- */
  function ensureUi() {
    if (!$(".progress-line")) {
      const progress = document.createElement("div");
      progress.className = "progress-line";
      document.body.appendChild(progress);
    }

    if (!$("#toast")) {
      const toast = document.createElement("div");
      toast.id = "toast";
      toast.className = "toast";
      document.body.appendChild(toast);
    }

    if (!$(".page-loader")) {
      const loader = document.createElement("div");
      loader.className = "page-loader";
      loader.innerHTML = `<div class="loader-core"></div>`;
      document.body.appendChild(loader);

      window.addEventListener("load", () => {
        setTimeout(() => loader.classList.add("hide"), 350);
      });
    }
  }

  ensureUi();

  let toastTimer;
  function showToast(message = "Done") {
    const toast = $("#toast");
    clearTimeout(toastTimer);
    toast.textContent = message;
    toast.classList.add("show");
    toastTimer = setTimeout(() => toast.classList.remove("show"), 1800);
  }

  function formatMoney(value) {
    return `$${Number(value).toFixed(2)}`;
  }

  /* -----------------------------
     Scroll progress + back top
  ----------------------------- */
  function initScrollUi() {
    const progress = $(".progress-line");

    const backTop = document.createElement("button");
    backTop.className = "back-top";
    backTop.setAttribute("aria-label", "Back to top");
    backTop.innerHTML = "↑";
    document.body.appendChild(backTop);

    backTop.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });

    function onScroll() {
      const y = window.scrollY;
      const h = document.documentElement.scrollHeight - window.innerHeight;
      const percent = h > 0 ? (y / h) * 100 : 0;
      if (progress) progress.style.width = `${percent}%`;
      backTop.classList.toggle("show", y > 500);
    }

    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  initScrollUi();

  /* -----------------------------
     Auto active nav
  ----------------------------- */
  function autoActivateNav() {
    const current = window.location.pathname.split("/").pop() || "index.php";
    $$(".nav a").forEach((link) => {
      const href = link.getAttribute("href");
      link.classList.toggle("active", href === current);
    });
  }

  autoActivateNav();

  /* -----------------------------
     Fancy reveal animations
  ----------------------------- */
  function initReveal() {
    const items = $$(".reveal");
    if (!items.length) return;

    items.forEach((item, index) => {
      const variants = ["reveal", "reveal-left", "reveal-right", "reveal-zoom"];
      const variant = variants[index % variants.length];
      if (!item.classList.contains("show")) item.classList.add(variant);
      item.style.transitionDelay = `${Math.min((index % 6) * 90, 450)}ms`;
    });

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("show");
        obs.unobserve(entry.target);
      });
    }, { threshold: 0.14 });

    items.forEach((item) => observer.observe(item));
  }

  initReveal();

  /* -----------------------------
     Premium slider
  ----------------------------- */
  function initSlider() {
    const slider = $(".slider");
    if (!slider) return;

    const slides = $$(".slide", slider);
    const prevBtn = $(".slider-arrow.prev", slider);
    const nextBtn = $(".slider-arrow.next", slider);
    const dotsWrap = $(".slider-dots", slider);
    if (!slides.length) return;

    let current = Math.max(0, slides.findIndex((slide) => slide.classList.contains("active")));
    let autoPlay;
    let touchStartX = 0;
    let touchEndX = 0;
    const duration = 4500;

    let progressWrap = $(".slider-progress", slider);
    if (!progressWrap) {
      progressWrap = document.createElement("div");
      progressWrap.className = "slider-progress";
      progressWrap.innerHTML = `<div class="slider-progress-bar"></div>`;
      slider.appendChild(progressWrap);
    }
    const progressBar = $(".slider-progress-bar", progressWrap);

    function animateProgress() {
      if (!progressBar) return;
      progressBar.style.transition = "none";
      progressBar.style.width = "0%";
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          progressBar.style.transition = `width ${duration}ms linear`;
          progressBar.style.width = "100%";
        });
      });
    }

    function buildDots() {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = "";
      slides.forEach((_, index) => {
        const dot = document.createElement("button");
        dot.setAttribute("aria-label", `Go to slide ${index + 1}`);
        if (index === current) dot.classList.add("active");
        dot.addEventListener("click", () => {
          goTo(index);
          restart();
        });
        dotsWrap.appendChild(dot);
      });
    }

    function updateDots() {
      if (!dotsWrap) return;
      $$("button", dotsWrap).forEach((dot, index) => {
        dot.classList.toggle("active", index === current);
      });
    }

    function goTo(index) {
      if (index < 0) index = slides.length - 1;
      if (index >= slides.length) index = 0;

      slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
      });

      current = index;
      updateDots();
      animateProgress();
    }

    function next() {
      goTo(current + 1);
    }

    function prev() {
      goTo(current - 1);
    }

    function start() {
      stop();
      animateProgress();
      autoPlay = setInterval(next, duration);
    }

    function stop() {
      clearInterval(autoPlay);
      if (progressBar) {
        const computedWidth = getComputedStyle(progressBar).width;
        progressBar.style.transition = "none";
        progressBar.style.width = computedWidth;
      }
    }

    function restart() {
      stop();
      start();
    }

    buildDots();
    goTo(current);
    start();

    nextBtn?.addEventListener("click", () => {
      next();
      restart();
    });

    prevBtn?.addEventListener("click", () => {
      prev();
      restart();
    });

    slider.addEventListener("mouseenter", stop);
    slider.addEventListener("mouseleave", start);

    slider.addEventListener("touchstart", (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    slider.addEventListener("touchend", (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 50) {
        diff > 0 ? next() : prev();
        restart();
      }
    }, { passive: true });

    document.addEventListener("visibilitychange", () => {
      document.hidden ? stop() : start();
    });

    window.addEventListener("keydown", (e) => {
      const tag = document.activeElement?.tagName;
      if (["INPUT", "TEXTAREA", "SELECT"].includes(tag)) return;
      if (e.key === "ArrowRight") {
        next();
        restart();
      }
      if (e.key === "ArrowLeft") {
        prev();
        restart();
      }
    });
  }

  initSlider();

  /* -----------------------------
     Magnetic buttons
  ----------------------------- */
  function initMagneticButtons() {
    $$(".btn, .mini-btn").forEach((btn) => {
      btn.classList.add("magnetic");

      btn.addEventListener("mousemove", (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        btn.style.transform = `translate(${x * 0.12}px, ${y * 0.12}px)`;
      });

      btn.addEventListener("mouseleave", () => {
        btn.style.transform = "";
      });
    });
  }

  initMagneticButtons();

  /* -----------------------------
     Tilt + glow on cards
  ----------------------------- */
  function initCardEffects() {
    const cards = $$(".product-card, .category-card, .team-card, .info-card, .review-card, .feature-item");

    cards.forEach((card) => {
      card.classList.add("js-tilt", "js-glow");

      card.addEventListener("mousemove", (e) => {
        if (window.innerWidth < 992) return;

        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const rotateY = ((x / rect.width) - 0.5) * 9;
        const rotateX = ((y / rect.height) - 0.5) * -9;

        card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;

        card.style.setProperty("--glow-x", `${x}px`);
        card.style.setProperty("--glow-y", `${y}px`);
        card.classList.add("active-glow");
      });

      card.addEventListener("mouseleave", () => {
        card.style.transform = "";
        card.classList.remove("active-glow");
      });
    });
  }

  initCardEffects();

  /* -----------------------------
     Product gallery
  ----------------------------- */
  function initProductGallery() {
    const mainImg = $(".main-product-image img");
    const thumbs = $$(".thumb-grid img");

    if (!mainImg || !thumbs.length) return;

    thumbs[0].classList.add("is-active");

    thumbs.forEach((thumb) => {
      thumb.addEventListener("click", () => {
        thumbs.forEach((img) => img.classList.remove("is-active"));
        thumb.classList.add("is-active");

        mainImg.style.opacity = "0.35";
        mainImg.style.transform = "scale(.98)";

        setTimeout(() => {
          mainImg.src = thumb.src;
          mainImg.alt = thumb.alt || "Product image";
          mainImg.style.opacity = "1";
          mainImg.style.transform = "scale(1)";
        }, 180);
      });
    });

    mainImg.addEventListener("click", () => {
      const overlay = document.createElement("div");
      overlay.style.cssText = `
        position:fixed;
        inset:0;
        background:rgba(18,12,10,.9);
        display:flex;
        align-items:center;
        justify-content:center;
        padding:20px;
        z-index:6500;
        cursor:zoom-out;
      `;
      overlay.innerHTML = `
        <img src="${mainImg.src}" alt="${mainImg.alt}"
          style="max-width:92vw; max-height:88vh; border-radius:24px; box-shadow:0 28px 80px rgba(0,0,0,.35);">
      `;
      overlay.addEventListener("click", () => overlay.remove());
      document.body.appendChild(overlay);
    });
  }

  initProductGallery();

  /* -----------------------------
     Animated counters
  ----------------------------- */
  function initCounters() {
    const nums = $$(".stat-box h3");
    if (!nums.length) return;

    function parseCounter(text) {
      const raw = text.trim();
      if (raw.includes("K+")) return { target: parseFloat(raw), suffix: "K+", decimals: 0 };
      if (raw.includes("+")) return { target: parseFloat(raw), suffix: "+", decimals: 0 };
      if (raw.includes(".")) return { target: parseFloat(raw), suffix: "", decimals: 1 };
      return { target: parseFloat(raw), suffix: "", decimals: 0 };
    }

    function animate(el) {
      const finalText = el.textContent;
      const { target, suffix, decimals } = parseCounter(finalText);
      if (Number.isNaN(target)) return;

      const startTime = performance.now();
      const duration = 1700;

      function step(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 4);
        const value = (target * eased).toFixed(decimals);
        el.textContent = `${value}${suffix}`;

        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = finalText;
        }
      }

      requestAnimationFrame(step);
    }

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        animate(entry.target);
        obs.unobserve(entry.target);
      });
    }, { threshold: 0.55 });

    nums.forEach((num) => observer.observe(num));
  }

  initCounters();

  /* -----------------------------
     Form animation
  ----------------------------- */
  function initForms() {
    $$(".newsletter-form, .contact-form").forEach((form) => {
      form.addEventListener("submit", (e) => {
        e.preventDefault();

        const btn = $("button", form);
        const oldText = btn ? btn.textContent : "";

        if (btn) {
          btn.classList.add("loading");
          btn.textContent = "Sending...";
        }

        setTimeout(() => {
          form.reset();
          if (btn) {
            btn.classList.remove("loading");
            btn.textContent = oldText;
          }

          showToast(form.classList.contains("newsletter-form")
            ? "Subscribed successfully"
            : "Message sent successfully");
        }, 800);
      });
    });
  }

  initForms();

  /* -----------------------------
     Cart logic
  ----------------------------- */
  const storage = {
    get(key, fallback) {
      try {
        const value = JSON.parse(localStorage.getItem(key));
        return value ?? fallback;
      } catch {
        return fallback;
      }
    },
    set(key, value) {
      localStorage.setItem(key, JSON.stringify(value));
    }
  };

  function normalizeCart(cart) {
    if (!Array.isArray(cart)) return [];
    return cart
      .filter((item) => item && item.name && Number(item.price) >= 0)
      .map((item) => ({
        name: item.name,
        price: Number(item.price),
        image: item.image || "",
        quantity: Math.max(1, Number(item.quantity) || 1)
      }));
  }

  function getCart() {
    return normalizeCart(storage.get(CART_KEY, []));
  }

  function saveCart(cart) {
    storage.set(CART_KEY, normalizeCart(cart));
    updateCartCount();
  }

  function updateCartCount() {
    const cart = getCart();
    const totalQty = cart.reduce((sum, item) => sum + item.quantity, 0);

    $$(".cart-count").forEach((badge) => {
      badge.textContent = totalQty;
      badge.classList.remove("shake");
      void badge.offsetWidth;
      badge.classList.add("shake");
    });
  }

  function addItemToCart(item) {
    const cart = getCart();
    const existing = cart.find((cartItem) => cartItem.name === item.name);

    if (existing) {
      existing.quantity += 1;
    } else {
      cart.push({
        name: item.name,
        price: Number(item.price),
        image: item.image,
        quantity: 1
      });
    }

    saveCart(cart);
  }

  function removeFromCart(index) {
    const cart = getCart();
    cart.splice(index, 1);
    saveCart(cart);
    renderCartPage();
    showToast("Item removed");
  }

  function changeCartQty(index, delta) {
    const cart = getCart();
    if (!cart[index]) return;

    cart[index].quantity += delta;

    if (cart[index].quantity <= 0) {
      cart.splice(index, 1);
      showToast("Item removed");
    } else {
      showToast("Cart updated");
    }

    saveCart(cart);
    renderCartPage();
  }

  window.removeFromCart = removeFromCart;
  window.changeCartQty = changeCartQty;

  function renderCartPage() {
    const cartWrap = $("#cartItems");
    const subtotalEl = $("#subtotal");
    const totalEl = $("#total");
    const itemCountEl = $("#itemCount");

    if (!cartWrap) return;

    const cart = getCart();

    if (!cart.length) {
      cartWrap.innerHTML = `
        <div class="empty-cart">
          <h3>Your cart is empty</h3>
          <p>Add products from the bags page and they will appear here.</p>
          <a href="bags.php" class="btn btn-main">Go Shopping</a>
        </div>
      `;
      if (subtotalEl) subtotalEl.textContent = "$0.00";
      if (totalEl) totalEl.textContent = "$5.00";
      if (itemCountEl) itemCountEl.textContent = "0";
      return;
    }

    cartWrap.innerHTML = cart.map((item, index) => `
      <div class="cart-item hover-up">
        <img src="${item.image}" alt="${item.name}">
        <div class="cart-item-content">
          <h4>${item.name}</h4>
          <p>Price: ${formatMoney(item.price)}</p>
          <div class="qty-controls">
            <button class="qty-btn" onclick="changeCartQty(${index}, -1)">−</button>
            <span class="qty-value">${item.quantity}</span>
            <button class="qty-btn" onclick="changeCartQty(${index}, 1)">+</button>
          </div>
          <div class="cart-line-total">Total: ${formatMoney(item.price * item.quantity)}</div>
          <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
        </div>
      </div>
    `).join("");

    const itemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
    const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    const delivery = 5;
    const total = subtotal + delivery;

    if (subtotalEl) subtotalEl.textContent = formatMoney(subtotal);
    if (itemCountEl) itemCountEl.textContent = itemCount;
    if (totalEl) totalEl.textContent = formatMoney(total);
  }

  function initCartButtons() {
    $$(".add-cart").forEach((button) => {
      button.addEventListener("click", () => {
        const item = {
          name: button.dataset.name,
          price: Number(button.dataset.price),
          image: button.dataset.image
        };

        if (!item.name || Number.isNaN(item.price)) return;

        const oldText = button.textContent;
        button.classList.add("loading");
        button.textContent = "Adding...";

        setTimeout(() => {
          addItemToCart(item);
          button.textContent = "Added";
          showToast("Product added to cart");

          setTimeout(() => {
            button.textContent = oldText;
            button.classList.remove("loading");
          }, 700);
        }, 180);
      });
    });
  }

  initCartButtons();
  updateCartCount();
  renderCartPage();
});

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("pageSearch");
  const cards = document.querySelectorAll(".card");
  const noMatch = document.querySelector(".no-match");
  const year = document.getElementById("currentYear");

  if (year) {
    year.textContent = new Date().getFullYear();
  }

  if (searchInput) {
    searchInput.addEventListener("input", function () {
      const query = searchInput.value.trim().toLowerCase();
      let visibleCount = 0;

      cards.forEach(function (card) {
        const text = card.innerText.toLowerCase();
        const show = text.includes(query);

        card.style.display = show ? "flex" : "none";

        if (show) {
          visibleCount++;
        }
      });

      if (noMatch) {
        noMatch.style.display = visibleCount === 0 ? "block" : "none";
      }
    });
  }
});