document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  const CART_KEY = "bagCart";

  const $ = (selector, scope = document) => scope.querySelector(selector);
  const $$ = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));

  /* -----------------------------
     Add extra styles by JS
  ----------------------------- */
  function addJsStyles() {
    if ($("#js-extra-styles")) return;

    const style = document.createElement("style");
    style.id = "js-extra-styles";
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

  addJsStyles();

  /* -----------------------------
     Basic UI
  ----------------------------- */
  function makeBasicUi() {
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
      loader.innerHTML = '<div class="loader-core"></div>';
      document.body.appendChild(loader);

      window.addEventListener("load", function () {
        setTimeout(function () {
          loader.classList.add("hide");
        }, 350);
      });
    }
  }

  makeBasicUi();

  let toastTimer;
  function showToast(message) {
    const toast = $("#toast");
    if (!toast) return;

    clearTimeout(toastTimer);
    toast.textContent = message || "Done";
    toast.classList.add("show");

    toastTimer = setTimeout(function () {
      toast.classList.remove("show");
    }, 1800);
  }

  function formatMoney(value) {
    return "$" + Number(value).toFixed(2);
  }

  function escapeHtml(value) {
    return String(value)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");
  }

  function buildFallbackImage(label) {
    const text = escapeHtml(label || "BagStore");
    return (
      "data:image/svg+xml;charset=UTF-8," +
      encodeURIComponent(
        "<svg xmlns='http://www.w3.org/2000/svg' width='900' height='900' viewBox='0 0 900 900'>" +
          "<defs>" +
          "<linearGradient id='bg' x1='0' y1='0' x2='1' y2='1'>" +
          "<stop offset='0%' stop-color='#fbf4ee'/>" +
          "<stop offset='100%' stop-color='#f2e1d4'/>" +
          "</linearGradient>" +
          "</defs>" +
          "<rect width='900' height='900' fill='url(#bg)'/>" +
          "<rect x='70' y='70' width='760' height='760' rx='48' fill='#ffffff' stroke='#dfc2ae' stroke-width='6'/>" +
          "<text x='450' y='360' text-anchor='middle' font-size='58' fill='#a56a43' font-family='Arial' font-weight='700'>BagStore</text>" +
          "<text x='450' y='455' text-anchor='middle' font-size='32' fill='#3f3a37' font-family='Arial'>" +
          text +
          "</text>" +
          "<text x='450' y='520' text-anchor='middle' font-size='24' fill='#8a7b71' font-family='Arial'>Image not available</text>" +
          "</svg>"
      )
    );
  }

  function startProductImageFallback() {
    const images = $$(".product-card img, .category-card img, .related-card img");

    images.forEach(function (img) {
      if (img.dataset.fallbackBound === "1") return;
      img.dataset.fallbackBound = "1";

      img.addEventListener("error", function () {
        if (img.dataset.fallbackUsed === "1") return;
        img.dataset.fallbackUsed = "1";

        const card = img.closest(".product-card, .category-card, .related-card");
        const title = card ? $("h3", card) : null;
        const label = img.getAttribute("alt") || (title ? title.textContent.trim() : "BagStore");

        img.src = buildFallbackImage(label);
        img.alt = label || "BagStore image";
      });
    });
  }

  /* -----------------------------
     Top progress and back button
  ----------------------------- */
  function startScrollUi() {
    const progress = $(".progress-line");

    if (!$(".back-top")) {
      const backTop = document.createElement("button");
      backTop.className = "back-top";
      backTop.setAttribute("aria-label", "Back to top");
      backTop.innerHTML = "↑";
      document.body.appendChild(backTop);

      backTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    }

    const backTopBtn = $(".back-top");

    function onScroll() {
      const y = window.scrollY;
      const h = document.documentElement.scrollHeight - window.innerHeight;
      const percent = h > 0 ? (y / h) * 100 : 0;

      if (progress) {
        progress.style.width = percent + "%";
      }

      if (backTopBtn) {
        backTopBtn.classList.toggle("show", y > 500);
      }
    }

    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  startScrollUi();

  /* -----------------------------
     Active nav link
  ----------------------------- */
  function setActiveNav() {
    const currentPage = window.location.pathname.split("/").pop() || "index.php";

    $$(".nav a").forEach(function (link) {
      const href = link.getAttribute("href");
      link.classList.toggle("active", href === currentPage);
    });
  }

  setActiveNav();

  /* -----------------------------
     Reveal animation
  ----------------------------- */
  function startReveal() {
    const items = $$(".reveal");
    if (!items.length) return;

    items.forEach(function (item, index) {
      const variants = ["reveal-left", "reveal-right", "reveal-zoom"];
      const variant = variants[index % variants.length];

      if (
        !item.classList.contains("reveal-left") &&
        !item.classList.contains("reveal-right") &&
        !item.classList.contains("reveal-zoom")
      ) {
        item.classList.add(variant);
      }

      item.style.transitionDelay = Math.min((index % 6) * 90, 450) + "ms";
    });

    const observer = new IntersectionObserver(
      function (entries, obs) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("show");
          obs.unobserve(entry.target);
        });
      },
      { threshold: 0.14 }
    );

    items.forEach(function (item) {
      observer.observe(item);
    });
  }

  startReveal();

  /* -----------------------------
     Slider
  ----------------------------- */
  function startSlider() {
    const slider = $("#mainSlider") || $(".slider");
    if (!slider) return;

    const slides = $$(".slide", slider);
    const prevBtn = $(".slider-arrow.prev", slider);
    const nextBtn = $(".slider-arrow.next", slider);
    const dotsWrap = $(".slider-dots", slider);

    if (!slides.length) return;

    let current = slides.findIndex(function (slide) {
      return slide.classList.contains("active");
    });

    if (current < 0) current = 0;

    let autoPlay = null;
    let touchStartX = 0;
    let touchEndX = 0;
    const duration = 4000;

    let progressWrap = $(".slider-progress", slider);
    if (!progressWrap) {
      progressWrap = document.createElement("div");
      progressWrap.className = "slider-progress";
      progressWrap.innerHTML = '<div class="slider-progress-bar"></div>';
      slider.appendChild(progressWrap);
    }

    const progressBar = $(".slider-progress-bar", progressWrap);

    function runProgress() {
      if (!progressBar) return;

      progressBar.style.transition = "none";
      progressBar.style.width = "0%";

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          progressBar.style.transition = "width " + duration + "ms linear";
          progressBar.style.width = "100%";
        });
      });
    }

    function makeDots() {
      if (!dotsWrap) return;

      dotsWrap.innerHTML = "";

      slides.forEach(function (_, index) {
        const dot = document.createElement("button");
        dot.type = "button";
        dot.setAttribute("aria-label", "Slide " + (index + 1));

        if (index === current) {
          dot.classList.add("active");
        }

        dot.addEventListener("click", function () {
          goTo(index);
          restartAuto();
        });

        dotsWrap.appendChild(dot);
      });
    }

    function updateDots() {
      if (!dotsWrap) return;

      $$("button", dotsWrap).forEach(function (dot, index) {
        dot.classList.toggle("active", index === current);
      });
    }

    function goTo(index) {
      if (index < 0) index = slides.length - 1;
      if (index >= slides.length) index = 0;

      slides.forEach(function (slide, i) {
        slide.classList.toggle("active", i === index);
      });

      current = index;
      updateDots();
      runProgress();
    }

    function nextSlide() {
      goTo(current + 1);
    }

    function prevSlide() {
      goTo(current - 1);
    }

    function stopAuto() {
      clearInterval(autoPlay);
    }

    function startAuto() {
      stopAuto();
      runProgress();
      autoPlay = setInterval(nextSlide, duration);
    }

    function restartAuto() {
      stopAuto();
      startAuto();
    }

    makeDots();
    goTo(current);
    startAuto();

    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        nextSlide();
        restartAuto();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        prevSlide();
        restartAuto();
      });
    }

    slider.addEventListener("mouseenter", stopAuto);
    slider.addEventListener("mouseleave", startAuto);

    slider.addEventListener(
      "touchstart",
      function (e) {
        touchStartX = e.changedTouches[0].screenX;
      },
      { passive: true }
    );

    slider.addEventListener(
      "touchend",
      function (e) {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > 50) {
          if (diff > 0) {
            nextSlide();
          } else {
            prevSlide();
          }
          restartAuto();
        }
      },
      { passive: true }
    );

    document.addEventListener("visibilitychange", function () {
      if (document.hidden) {
        stopAuto();
      } else {
        startAuto();
      }
    });

    window.addEventListener("keydown", function (e) {
      const tag = document.activeElement ? document.activeElement.tagName : "";
      if (["INPUT", "TEXTAREA", "SELECT"].includes(tag)) return;

      if (e.key === "ArrowRight") {
        nextSlide();
        restartAuto();
      }

      if (e.key === "ArrowLeft") {
        prevSlide();
        restartAuto();
      }
    });
  }

  startSlider();
  startProductImageFallback();

  /* -----------------------------
     Button hover move
  ----------------------------- */
  function startButtonEffect() {
    $$(".btn, .mini-btn").forEach(function (btn) {
      btn.classList.add("magnetic");

      btn.addEventListener("mousemove", function (e) {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        btn.style.transform = "translate(" + x * 0.12 + "px, " + y * 0.12 + "px)";
      });

      btn.addEventListener("mouseleave", function () {
        btn.style.transform = "";
      });
    });
  }

  startButtonEffect();

  /* -----------------------------
     Card hover effect
  ----------------------------- */
  function startCardEffect() {
    const cards = $$(".product-card, .category-card, .team-card, .info-card, .review-card, .feature-item");

    cards.forEach(function (card) {
      card.classList.add("js-tilt", "js-glow");

      card.addEventListener("mousemove", function (e) {
        if (window.innerWidth < 992) return;

        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const rotateY = (x / rect.width - 0.5) * 9;
        const rotateX = (y / rect.height - 0.5) * -9;

        card.style.transform =
          "perspective(900px) rotateX(" +
          rotateX +
          "deg) rotateY(" +
          rotateY +
          "deg) translateY(-8px)";

        card.style.setProperty("--glow-x", x + "px");
        card.style.setProperty("--glow-y", y + "px");
        card.classList.add("active-glow");
      });

      card.addEventListener("mouseleave", function () {
        card.style.transform = "";
        card.classList.remove("active-glow");
      });
    });
  }

  startCardEffect();

  /* -----------------------------
     Product image change
  ----------------------------- */
  function startProductGallery() {
    const mainImg = $(".main-product-image img");
    const thumbs = $$(".thumb-grid img");

    if (!mainImg || !thumbs.length) return;

    thumbs[0].classList.add("is-active");

    thumbs.forEach(function (thumb) {
      thumb.addEventListener("click", function () {
        thumbs.forEach(function (img) {
          img.classList.remove("is-active");
        });

        thumb.classList.add("is-active");
        mainImg.style.opacity = "0.35";
        mainImg.style.transform = "scale(.98)";

        setTimeout(function () {
          mainImg.src = thumb.src;
          mainImg.alt = thumb.alt || "Product image";
          mainImg.style.opacity = "1";
          mainImg.style.transform = "scale(1)";
        }, 180);
      });
    });

    mainImg.addEventListener("click", function () {
      const overlay = document.createElement("div");
      overlay.style.cssText =
        "position:fixed;inset:0;background:rgba(18,12,10,.9);display:flex;align-items:center;justify-content:center;padding:20px;z-index:6500;cursor:zoom-out;";
      overlay.innerHTML =
        '<img src="' +
        mainImg.src +
        '" alt="' +
        mainImg.alt +
        '" style="max-width:92vw;max-height:88vh;border-radius:24px;box-shadow:0 28px 80px rgba(0,0,0,.35);">';
      overlay.addEventListener("click", function () {
        overlay.remove();
      });
      document.body.appendChild(overlay);
    });
  }

  startProductGallery();

  /* -----------------------------
     Counter
  ----------------------------- */
  function startCounters() {
    const nums = $$(".stat-box h3");
    if (!nums.length) return;

    function parseCounter(text) {
      const raw = text.trim();

      if (raw.includes("K+")) {
        return { target: parseFloat(raw), suffix: "K+", decimals: 0 };
      }

      if (raw.includes("+")) {
        return { target: parseFloat(raw), suffix: "+", decimals: 0 };
      }

      if (raw.includes(".")) {
        return { target: parseFloat(raw), suffix: "", decimals: 1 };
      }

      return { target: parseFloat(raw), suffix: "", decimals: 0 };
    }

    function animate(el) {
      const finalText = el.textContent;
      const data = parseCounter(finalText);

      if (Number.isNaN(data.target)) return;

      const startTime = performance.now();
      const duration = 1700;

      function step(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 4);
        const value = (data.target * eased).toFixed(data.decimals);

        el.textContent = value + data.suffix;

        if (progress < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = finalText;
        }
      }

      requestAnimationFrame(step);
    }

    const observer = new IntersectionObserver(
      function (entries, obs) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          animate(entry.target);
          obs.unobserve(entry.target);
        });
      },
      { threshold: 0.55 }
    );

    nums.forEach(function (num) {
      observer.observe(num);
    });
  }

  startCounters();

  /* -----------------------------
     Form submit
  ----------------------------- */
  function startForms() {
    $$(".newsletter-form, .contact-form").forEach(function (form) {
      form.addEventListener("submit", function (e) {
        e.preventDefault();

        const btn = $("button", form);
        const oldText = btn ? btn.textContent : "";

        if (btn) {
          btn.classList.add("loading");
          btn.textContent = "Sending...";
        }

        setTimeout(function () {
          form.reset();

          if (btn) {
            btn.classList.remove("loading");
            btn.textContent = oldText;
          }

          if (form.classList.contains("newsletter-form")) {
            showToast("Subscribed successfully");
          } else {
            showToast("Message sent successfully");
          }
        }, 800);
      });
    });
  }

  startForms();

  /* -----------------------------
     Storage
  ----------------------------- */
  const storage = {
    get: function (key, fallback) {
      try {
        const value = JSON.parse(localStorage.getItem(key));
        return value ?? fallback;
      } catch (e) {
        return fallback;
      }
    },
    set: function (key, value) {
      localStorage.setItem(key, JSON.stringify(value));
    }
  };

  function normalizeCart(cart) {
    if (!Array.isArray(cart)) return [];

    return cart
      .filter(function (item) {
        return item && item.name && Number(item.price) >= 0;
      })
      .map(function (item) {
        return {
          name: item.name,
          price: Number(item.price),
          image: item.image || "",
          quantity: Math.max(1, Number(item.quantity) || 1)
        };
      });
  }

  function getCart() {
    return normalizeCart(storage.get(CART_KEY, []));
  }

  function saveCart(cart) {
    storage.set(CART_KEY, normalizeCart(cart));
    updateCartCount();
  }

  const WISHLIST_KEY = "bagWishlist";

  function normalizeWishlist(items) {
    if (!Array.isArray(items)) return [];

    return items
      .filter(function (item) {
        return item && item.name && Number(item.price) >= 0;
      })
      .map(function (item) {
        return {
          name: item.name,
          price: Number(item.price),
          image: item.image || "",
          url: item.url || "wishlist.php"
        };
      });
  }

  function getWishlist() {
    return normalizeWishlist(storage.get(WISHLIST_KEY, []));
  }

  function saveWishlist(items) {
    storage.set(WISHLIST_KEY, normalizeWishlist(items));
    updateWishlistButtons();
  }

  function addItemToWishlist(item) {
    const wishlist = getWishlist();
    const existing = wishlist.find(function (wishItem) {
      return wishItem.name === item.name;
    });

    if (existing) {
      existing.price = Number(item.price);
      existing.image = item.image || existing.image;
      existing.url = item.url || existing.url;
    } else {
      wishlist.push({
        name: item.name,
        price: Number(item.price),
        image: item.image || "",
        url: item.url || "wishlist.php"
      });
    }

    saveWishlist(wishlist);
  }

  function removeFromWishlist(index) {
    const wishlist = getWishlist();
    if (!wishlist[index]) return;

    wishlist.splice(index, 1);
    saveWishlist(wishlist);
    renderWishlistPage();
    showToast("Removed from wishlist");
  }

  function moveWishlistToCart(index) {
    const wishlist = getWishlist();
    const item = wishlist[index];

    if (!item) return;

    addItemToCart(item);
    showToast("Moved to cart");
    window.location.href = "cart.php";
  }

  window.removeFromWishlist = removeFromWishlist;
  window.moveWishlistToCart = moveWishlistToCart;

  function updateCartCount() {
    const cart = getCart();
    const totalQty = cart.reduce(function (sum, item) {
      return sum + item.quantity;
    }, 0);

    $$(".cart-count").forEach(function (badge) {
      badge.textContent = totalQty;
      badge.classList.remove("shake");
      void badge.offsetWidth;
      badge.classList.add("shake");
    });
  }

  function updateWishlistButtons() {
    const wishlist = getWishlist();
    const wishlistCountEl = $("#wishlistCount");

    if (wishlistCountEl) {
      wishlistCountEl.textContent = wishlist.length;
    }

    $$(".wish-btn").forEach(function (button) {
      const name = button.dataset.name;
      const active = wishlist.some(function (item) {
        return item.name === name;
      });

      button.classList.toggle("active", active);
      button.setAttribute("aria-pressed", active ? "true" : "false");
    });
  }

  function clearWishlist() {
    saveWishlist([]);
    renderWishlistPage();
    showToast("Wishlist cleared");
  }

  window.clearWishlist = clearWishlist;

  function addItemToCart(item) {
    const cart = getCart();
    const existing = cart.find(function (cartItem) {
      return cartItem.name === item.name;
    });

    if (existing) {
      existing.quantity += 1;
    } else {
      cart.push({
        name: item.name,
        price: Number(item.price),
        image: item.image || "",
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
      cartWrap.innerHTML =
        '<div class="empty-cart">' +
        "<h3>Your cart is empty</h3>" +
        "<p>Add products from the bags page and they will appear here.</p>" +
        '<a href="all-bags.php" class="btn btn-main">Go Shopping</a>' +
        "</div>";

      if (subtotalEl) subtotalEl.textContent = "$0.00";
      if (totalEl) totalEl.textContent = "$5.00";
      if (itemCountEl) itemCountEl.textContent = "0";
      return;
    }

    cartWrap.innerHTML = cart
      .map(function (item, index) {
        return (
          '<div class="cart-item hover-up">' +
          '<img src="' + item.image + '" alt="' + item.name + '">' +
          '<div class="cart-item-content">' +
          "<h4>" + item.name + "</h4>" +
          "<p>Price: " + formatMoney(item.price) + "</p>" +
          '<div class="qty-controls">' +
          '<button class="qty-btn" onclick="changeCartQty(' + index + ', -1)">−</button>' +
          '<span class="qty-value">' + item.quantity + "</span>" +
          '<button class="qty-btn" onclick="changeCartQty(' + index + ', 1)">+</button>' +
          "</div>" +
          '<div class="cart-line-total">Total: ' + formatMoney(item.price * item.quantity) + "</div>" +
          '<button class="remove-btn" onclick="removeFromCart(' + index + ')">Remove</button>' +
          "</div>" +
          "</div>"
        );
      })
      .join("");

    const itemCount = cart.reduce(function (sum, item) {
      return sum + item.quantity;
    }, 0);

    const subtotal = cart.reduce(function (sum, item) {
      return sum + item.price * item.quantity;
    }, 0);

    const delivery = 5;
    const total = subtotal + delivery;

    if (subtotalEl) subtotalEl.textContent = formatMoney(subtotal);
    if (itemCountEl) itemCountEl.textContent = itemCount;
    if (totalEl) totalEl.textContent = formatMoney(total);
  }

  function renderWishlistPage() {
    const wishlistWrap = $("#wishlistItems");
    const clearBtn = $("#clearWishlistBtn");

    if (!wishlistWrap) return;

    const wishlist = getWishlist();

    if (!wishlist.length) {
      wishlistWrap.innerHTML =
        '<div class="empty-cart empty-wishlist">' +
        "<h3>Your wishlist is empty</h3>" +
        "<p>Tap the heart icon on any product to save it here.</p>" +
        '<a href="all-bags.php" class="btn btn-main">Browse Bags</a>' +
        "</div>";
      if (clearBtn) clearBtn.disabled = true;
      return;
    }

    if (clearBtn) clearBtn.disabled = false;

    wishlistWrap.innerHTML = wishlist
      .map(function (item, index) {
        const safeName = escapeHtml(item.name);
        const safeImage = escapeHtml(item.image);
        const safeUrl = escapeHtml(item.url || "selling.php");

        return (
          '<div class="product-card hover-up">' +
          '<span class="wishlist-badge">Saved</span>' +
          '<a href="' + safeUrl + '">' +
          '<img src="' + safeImage + '" alt="' + safeName + '">' +
          "</a>" +
          '<div class="product-info">' +
          "<h3>" + safeName + "</h3>" +
          "<p>Saved from your shopping journey.</p>" +
          '<div class="price-row">' +
          '<span class="price">' + formatMoney(item.price) + "</span>" +
          "</div>" +
          '<div class="card-actions">' +
          '<a href="' + safeUrl + '" class="btn btn-light small-btn">View Product</a>' +
          '<button class="btn btn-main small-btn" onclick="moveWishlistToCart(' + index + ')">Add to Cart</button>' +
          '<button class="btn btn-light small-btn" onclick="removeFromWishlist(' + index + ')">Remove</button>' +
          "</div>" +
          "</div>" +
          "</div>"
        );
      })
      .join("");
  }

  function startCartButtons() {
    $$(".add-cart").forEach(function (button) {
      button.addEventListener("click", function () {
        const item = {
          name: button.dataset.name,
          price: Number(button.dataset.price),
          image: button.dataset.image,
          url: button.dataset.url || "cart.php"
        };

        if (!item.name || Number.isNaN(item.price)) return;

        const oldText = button.textContent;
        button.classList.add("loading");
        button.textContent = "Adding...";

        setTimeout(function () {
          addItemToCart(item);
          button.textContent = "Added";
          showToast("Product added to cart");

          setTimeout(function () {
            button.classList.remove("loading");
            button.textContent = oldText;
            window.location.href = "cart.php";
          }, 250);
        }, 180);
      });
    });
  }

  function startWishlistButtons() {
    if (window.location.pathname.split("/").pop() === "wishlist.php") return;

    $$(".product-card").forEach(function (card) {
      if (card.querySelector(".wish-btn")) return;

      const titleEl = $("h3", card);
      const imgEl = $("img", card);
      const priceEl = $(".price", card);
      const linkEl = $("a[href*='selling.php'], a[href]", card);
      const imageLink = $(".image-link", card) || $("a", card);

      const name = titleEl ? titleEl.textContent.trim() : "";
      const priceText = priceEl ? priceEl.textContent.replace(/[^0-9.]/g, "") : "";
      const price = Number(priceText) || 0;
      const image = imgEl ? imgEl.getAttribute("src") : "";
      const url = linkEl ? linkEl.getAttribute("href") : (imageLink ? imageLink.getAttribute("href") : "selling.php");

      if (!name) return;

      const button = document.createElement("button");
      button.type = "button";
      button.className = "wish-btn";
      button.dataset.name = name;
      button.dataset.price = String(price);
      button.dataset.image = image;
      button.dataset.url = url || "selling.php";
      button.setAttribute("aria-label", "Save " + name + " to wishlist");
      button.setAttribute("aria-pressed", "false");
      button.textContent = "\u2665";

      button.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        addItemToWishlist({
          name: name,
          price: price,
          image: image,
          url: url || "selling.php"
        });

        button.classList.add("active");
        showToast("Added to wishlist");

        setTimeout(function () {
          window.location.href = "wishlist.php";
        }, 160);
      });

      const mediaSource = imageLink && imageLink.parentElement === card ? imageLink : imgEl;

      if (mediaSource && mediaSource.parentElement === card) {
        const mediaWrap = document.createElement("div");
        mediaWrap.className = "product-media";
        card.insertBefore(mediaWrap, mediaSource);
        mediaWrap.appendChild(mediaSource);
        mediaWrap.appendChild(button);
      } else if (imageLink && imageLink.parentElement) {
        const existingWrap = imageLink.parentElement;
        if (!existingWrap.classList.contains("product-media")) {
          existingWrap.classList.add("product-media");
        }
        existingWrap.appendChild(button);
      } else {
        card.appendChild(button);
      }
    });

    updateWishlistButtons();
  }

  function getCardProductData(card) {
    if (!card) return null;

    const titleEl = $("h3", card);
    const descEl = $("p", card);
    const priceEl = $(".price", card);
    const oldPriceEl = $(".old-price", card);
    const imgEl = $("img", card);
    const badgeEl = $(".catalog-badge", card) || $(".wishlist-badge", card);

    const name = titleEl ? titleEl.textContent.trim() : "";
    const priceText = priceEl ? priceEl.textContent.replace(/[^0-9.]/g, "") : "";
    const oldText = oldPriceEl ? oldPriceEl.textContent.replace(/[^0-9.]/g, "") : "";
    const image = imgEl ? imgEl.getAttribute("src") : "";

    if (!name) return null;

    return {
      id: Number(card.dataset.productId) || 1,
      name: name,
      description: descEl ? descEl.textContent.trim() : "",
      category: badgeEl ? badgeEl.textContent.trim() : "",
      price: Number(priceText) || 0,
      oldPrice: Number(oldText) || 0,
      image: image || "",
      url: "selling.php"
    };
  }

  function saveSelectedProduct(product) {
    if (!product) return;

    try {
      localStorage.setItem("bagstore_selected_product", JSON.stringify(product));
    } catch (err) {
      // Storage can fail in private mode; ignore safely.
    }
  }

  function startProductSelectionCapture() {
    document.addEventListener("click", function (event) {
      const link = event.target.closest("a[href*='selling.php']");
      if (!link) return;

      const card = link.closest(".product-card, .catalog-card, .related-card");
      const product = getCardProductData(card);

      if (product) {
        saveSelectedProduct(product);
      }
    });
  }

  startCartButtons();
  startWishlistButtons();
  startProductSelectionCapture();
  updateCartCount();
  renderCartPage();
  renderWishlistPage();

  const clearWishlistBtn = $("#clearWishlistBtn");
  if (clearWishlistBtn) {
    clearWishlistBtn.addEventListener("click", clearWishlist);
  }

  /* -----------------------------
     Search filter
  ----------------------------- */
  function startSearch() {
    const searchInput = $("#pageSearch");
    const cards = $$(".card");
    const noMatch = $(".no-match");
    const year = $("#currentYear");

    if (year) {
      year.textContent = new Date().getFullYear();
    }

    if (!searchInput) return;

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

  startSearch();

  /* -----------------------------
     Dropdown menu
  ----------------------------- */
  function startDropdown() {
    const dropdown = $(".dropdown");
    const dropBtn = $(".drop-btn");
    const dropdownMenu = $(".dropdown-menu");

    if (!dropBtn || !dropdownMenu) return;

    dropBtn.addEventListener("click", function (e) {
      if (window.innerWidth <= 900) {
        e.preventDefault();
        dropdownMenu.classList.toggle("show-menu");
      }
    });

    document.addEventListener("click", function (e) {
      if (dropdown && !dropdown.contains(e.target) && window.innerWidth <= 900) {
        dropdownMenu.classList.remove("show-menu");
      }
    });
  }

  /* -----------------------------
     Selling page
  ----------------------------- */
  function startSellingPage() {
    const mainImage = $("#sellingMainImage");
    const thumbs = $$(".selling-thumb");
    const qtySelect = $("#sellingQty");
    const addToCartBtn = $("#sellingAddToCart");
    const buyNowBtn = $("#sellingBuyNow");
    const categoryEl = $("#sellingCategory");
    const titleEl = $("#sellingTitle");
    const ratingEl = $("#sellingRating");
    const reviewsEl = $("#sellingReviews");
    const stockEl = $("#sellingStock");
    const priceEl = $("#sellingPrice");
    const oldPriceEl = $("#sellingOldPrice");
    const descEl = $("#sellingDescription");
    const highlightsEl = $("#sellingHighlights");
    const productMeta = $("#sellingMainImage");

    if (!mainImage || !thumbs.length) return;

    const storedProduct = (() => {
      try {
        const raw = localStorage.getItem("bagstore_selected_product");
        return raw ? JSON.parse(raw) : null;
      } catch (err) {
        return null;
      }
    })();

    const productId = Number(mainImage.dataset.productId) || 1;

    function buildPaymentHref(qty, data) {
      if (!data) {
        return "payment.php?id=" + productId + "&qty=" + qty;
      }

      const params = new URLSearchParams();
      params.set("qty", String(qty));
      params.set("name", data.name || "");
      params.set("price", String(data.price || 0));
      params.set("image", data.image || "");
      params.set("category", data.category || "");
      params.set("old", String(data.oldPrice || 0));
      params.set("description", data.description || "");
      return "payment.php?" + params.toString();
    }

    function applyStoredProduct(data) {
      if (!data) return;

      document.title = data.name ? data.name + " - BagStore" : document.title;
      if (titleEl && data.name) titleEl.textContent = data.name;
      if (categoryEl && data.category) categoryEl.textContent = data.category;
      if (ratingEl) ratingEl.textContent = "4.8 ★";
      if (reviewsEl) reviewsEl.textContent = "1,200+ ratings";
      if (stockEl) stockEl.textContent = "In Stock";
      if (priceEl && data.price) priceEl.textContent = "₹" + Number(data.price).toLocaleString();
      if (oldPriceEl && data.oldPrice) {
        oldPriceEl.textContent = "₹" + Number(data.oldPrice).toLocaleString();
        oldPriceEl.style.display = "inline";
      }
      if (descEl && data.description) descEl.textContent = data.description;
      if (mainImage && data.image) {
        mainImage.src = data.image;
      }
      if (addToCartBtn) {
        addToCartBtn.dataset.name = data.name || addToCartBtn.dataset.name || "";
        addToCartBtn.dataset.price = String(data.price || addToCartBtn.dataset.price || 0);
        addToCartBtn.dataset.image = data.image || addToCartBtn.dataset.image || "";
      }

      if (highlightsEl) {
        const points = [
          data.category ? "Best in " + data.category : "Best seller pick",
          "Comfortable for daily use",
          "Smart storage and neat finish",
          "Easy to carry with strong build"
        ];

        highlightsEl.innerHTML = points
          .map(function (text) {
            return '<div class="selling-highlight">' + escapeHtml(text) + "</div>";
          })
          .join("");
      }
    }

    function updateLinks() {
      const qty = qtySelect ? Math.max(1, Number(qtySelect.value) || 1) : 1;

      if (addToCartBtn) {
        addToCartBtn.dataset.quantity = String(qty);
      }

      if (buyNowBtn) {
        buyNowBtn.href = buildPaymentHref(qty, storedProduct);
      }
    }

    if (storedProduct) {
      applyStoredProduct(storedProduct);
      if (productMeta && storedProduct.image) {
        productMeta.setAttribute("data-product-id", String(storedProduct.id || productId));
      }
    }

    thumbs.forEach(function (thumb) {
      thumb.addEventListener("click", function () {
        const nextImage = this.getAttribute("data-image");
        if (!nextImage) return;

        mainImage.src = nextImage;

        thumbs.forEach(function (item) {
          item.classList.remove("active");
        });

        this.classList.add("active");
      });
    });

    if (qtySelect) {
      qtySelect.addEventListener("change", updateLinks);
    }

    updateLinks();
  }

  /* -----------------------------
     Checkout page
  ----------------------------- */
  function startCheckoutPage() {
    const methodsWrap = $(".payment-methods");
    const methodCards = $$(".payment-method");
    const helpBox = $(".payment-help");
    const form = $("#paymentForm");
    const successBox = $("#checkoutSuccess");

    if (!methodsWrap || !methodCards.length) return;

    const helpText = {
      gpay: "UPI ID: bagstore@upi. Use Google Pay to complete payment quickly.",
      upi: "Pay using PhonePe, Paytm, BHIM or any UPI app.",
      card: "Enter your debit or credit card details to pay securely.",
      netbanking: "Choose your bank and continue with net banking.",
      cod: "Cash on delivery will be collected when the order reaches you."
    };

    function setActive(card) {
      methodCards.forEach(function (item) {
        item.classList.remove("active");
        const input = $("input", item);
        if (input) input.checked = false;
      });

      card.classList.add("active");
      const input = $("input", card);
      if (input) input.checked = true;

      if (helpBox && input) {
        helpBox.innerHTML = helpText[input.value] || helpText.gpay;
      }
    }

    methodCards.forEach(function (card) {
      card.addEventListener("click", function () {
        setActive(card);
      });
    });

    methodCards.forEach(function (card) {
      const input = $("input", card);
      if (input && input.checked) {
        setActive(card);
      }
    });

    if (form) {
      form.addEventListener("submit", function (e) {
        e.preventDefault();

        if (successBox) {
          successBox.classList.add("show");
        }

        showToast("Payment details saved");
      });
    }
  }

  startSellingPage();
  startCheckoutPage();
  startDropdown();
});


