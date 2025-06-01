<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk Kerupuk - Toko 619</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-dBwEXRJBgrzWZ2vSP1XRVQu/jKkQfbtIsXf1T9pUjE3rVULK4e4I2V6KXfU7uzWq+6YBfZ6inB/b5y3lYzLL7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body { font-family: Arial, sans-serif; padding: 0; margin: 0; background: linear-gradient(135deg, #ffffff, #ffdbdb); color: #333; }
    header { background-color: #b00000; padding: 10px 20px; color: #ffdbdb; display: flex; align-items: center; justify-content: space-between; }
    .navbar-title { font-size: 20px; font-weight: bold; }
    .nav-links a { color: #ffdbdb; margin-left: 20px; text-decoration: none; font-weight: bold; }
    .nav-links a:hover { text-decoration: underline; }
    .container { padding: 20px; max-width: 1200px; margin: auto; }
    h1 { text-align: center; margin-bottom: 20px; color: #b00000; }
    h3 { text-align: center; margin-bottom: 20px; color: #b00000; }
    .search-container { text-align: center; margin-bottom: 20px; }
    .search-input { width: 100%; max-width: 500px; padding: 10px; border-radius: 6px; border: 1px solid #b00000; }
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .card { border: 2px solid #b00000; border-radius: 12px; overflow: hidden; background: #ffeaea; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    .card:hover { transform: translateY(-5px); }
    .card img { width: 100%; height: 180px; object-fit: cover; }
    .card-content { padding: 16px; }
    .card-content h3 { margin: 0 0 10px 0; color: #b00000; text-align: left; }
    .card-content p { margin: 0; color: #555; font-size: 14px; }
    .ad-container { margin: 20px 0; position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    .ad-slider { display: flex; transition: transform 0.5s ease; }
    .ad-slide { min-width: 100%; box-sizing: border-box; }
    .ad-slide img { width: 100%; height: auto; aspect-ratio: 2/1; object-fit: cover; display: block; }
    .slider-nav { position: absolute; top: 50%; left: 0; right: 0; display: flex; justify-content: space-between; transform: translateY(-50%); padding: 0 15px; z-index: 2; }
    .slider-btn { background: rgba(255,255,255,0.8); color: #b00000; border: none; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: bold; box-shadow: 0 2px 10px rgba(0,0,0,0.2); transition: all 0.3s ease; }
    .slider-btn:hover { background: #b00000; color: white; transform: scale(1.1); }
    .slider-dots { position: absolute; bottom: 15px; left: 0; right: 0; display: flex; justify-content: center; gap: 8px; z-index: 3; padding-top: 5px; }
    .dot { width: 10px; height: 10px; border-radius: 50%; background: rgba(226, 226, 226, 0.5); cursor: pointer; transition: all 0.3s ease; }
    .dot.active { background: #b00000; transform: scale(1.3); }
  </style>
</head>
<body>
  <header>
    <div class="navbar-title">Toko Kerupuk 619</div>
    <nav class="nav-links">
      <a href="/produk">Produk</a>
      <a href="/pembelian">Pembelian</a>
      <a href="/histori">Histori Pembelian</a>
    </nav>
  </header>

  <div class="container">
    <h3>Selamat datang di Toko Kerupuk 619!</h3>
    <h1>Produk Kerupuk Kami</h1>
    <div class="search-container">
      <input type="text" id="searchInput" class="search-input" placeholder="Cari produk kerupuk..." />
    </div>
    <div class="product-grid" id="productGrid"></div>

    <div class="ad-container">
    <div class="ad-slider" id="adSlider">
        <div class="ad-slide">
            <img src="{{ asset('images/1.png') }}" alt="Iklan 1">
        </div>
        <div class="ad-slide">
            <img src="{{ asset('images/2.png') }}" alt="Iklan 2">
        </div>
        <div class="ad-slide">
            <img src="{{ asset('images/3.png') }}" alt="Iklan 3">
        </div>
        <div class="ad-slide">
            <img src="{{ asset('images/4.png') }}" alt="Iklan 4">
        </div>
        <div class="ad-slide">
            <img src="{{ asset('images/5.png') }}" alt="Iklan 5">
        </div>
    </div>

      <div class="slider-nav">
        <button class="slider-btn" onclick="prevSlide()">‹</button>
        <button class="slider-btn" onclick="nextSlide()">›</button>
      </div>
      <div class="slider-dots"></div>
    </div>

  </div>

  <footer style="background:#b00000; color:#fff; text-align:center; padding:12px 0; margin-top:40px; font-size:14px;">
    &copy; 2025 Toko Kerupuk 619 - Semua hak cipta dilindungi
  </footer>

  <script>
    const products = @json($products);

    const adSlider = document.getElementById("adSlider");
    const slides = document.querySelectorAll(".ad-slide");
    const sliderDotsContainer = document.querySelector(".slider-dots");
    let dots = []; 
    let currentIndex = 0;

    function createDots() {
        if (!sliderDotsContainer || slides.length === 0) return;
        slides.forEach((_, i) => {
            const dot = document.createElement("span");
            dot.classList.add("dot");
            dot.addEventListener("click", () => currentSlide(i));
            sliderDotsContainer.appendChild(dot);
            dots.push(dot);
        });
    }

    function showSlide(index) {
      if (!adSlider || slides.length === 0 || dots.length === 0) {
        return;
      }

      const numSlides = slides.length;

      if (index >= numSlides) {
        currentIndex = 0;
      } else if (index < 0) {
        currentIndex = numSlides - 1;
      } else {
        currentIndex = index;
      }

      adSlider.style.transform = `translateX(-${currentIndex * 100}%)`;

      dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentIndex);
      });
    }

    function prevSlide() {
      showSlide(currentIndex - 1);
    }

    function nextSlide() {
      showSlide(currentIndex + 1);
    }

    function currentSlide(index) {
      showSlide(index);
    }

    // let favorites = new Set(); /* Removed */
    const $ = id => document.getElementById(id); 

    const renderProducts = (filter = '') => {
      const productGrid = $("productGrid");
      if (!productGrid) return;

      const list = products
        .filter(p => p.name.toLowerCase().includes(filter.toLowerCase()))
        .map(p => `
          <div class="card">
            <a href="/produk/${p.id}" style="text-decoration:none; color:inherit; display:block;">
              <img src="/images/${p.image}" alt="${p.name}" />
              <div class="card-content">
                <h3>${p.name}</h3>
                <p>${p.desc}</p>
              </div>
            </a>
          </div>
        `).join('');
      productGrid.innerHTML = list;
    };

    document.addEventListener("DOMContentLoaded", () => {
      if (slides.length > 0) {
        createDots(); 
        showSlide(currentIndex); 
        setInterval(nextSlide, 5000); //otomatis slide setiap 5 detik
      }
      const searchInput = $("searchInput");
      if (searchInput) {
        searchInput.addEventListener('input', e => renderProducts(e.target.value));
      }
      renderProducts();
    });
  </script>
</body>
</html>