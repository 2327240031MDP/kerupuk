<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembelian Kerupuk - Toko Kerupuk 619</title>
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
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .card { border: 2px solid #b00000; border-radius: 12px; overflow: hidden; background: #ffeaea; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    .card:hover { transform: translateY(-5px); }
    .card img { width: 100%; height: 200px; object-fit: cover; }
    .card-content { padding: 16px; }
    .card-content h3 { margin: 0 0 10px 0; color: #b00000; }
    .card-content p { margin: 0; color: #555; font-size: 14px; }
    .btn { padding: 10px 16px; background: #b00000; color: white; border: none; border-radius: 6px; cursor: pointer; margin-top: 10px; display: inline-block; }
    .btn:hover { background: #800000; }
    .btn:disabled { background: #aaa; cursor: not-allowed; }
    .cart-item { display: flex; justify-content: space-between; border-bottom: 1px solid #ddd; padding: 6px 0; }
    .cart-item button { background: none; border: none; color: #b00000; cursor: pointer; font-weight: bold; }
    textarea, input[type="text"] {width: 100%;padding: 8px;border-radius: 6px;border: 1px solid #b00000;margin-top: 6px;margin-bottom: 10px;}
    .total { font-weight: bold; text-align: right; margin-top: 10px; }
    footer { background:#b00000; color:#fff; text-align:center; padding:12px 0; margin-top:40px; font-size:14px; }
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

    <h3>Pembelian Produk</h3>
    <h1>Produk Kerupuk Kami</h1>
    <div class="product-grid" id="productGrid"></div>

    <div style="margin-top: 30px;">
      <h2>Keranjang</h2>
      <div id="cartItems"></div>
      <div class="total" id="totalPrice">Total: Rp0</div>
      <form id="pembelianForm" method="POST" action="{{ route('pembeli.store') }}">
        @csrf
        <label><strong>Nama Pembeli:</strong></label>
        <input type="text" id="nama" name="nama" required />

        <label><strong>Nomor Telepon:</strong></label>
        <input type="text" id="telepon" name="notelp" required />

        <label><strong>Alamat Pengiriman:</strong></label>
        <textarea id="alamat" name="alamat" rows="3" required></textarea>

        <input type="hidden" name="dari_web" value="1">
      </form>
      
      <button id="whatsappLink" class="btn" disabled>Lanjut ke WhatsApp</button>
    </div>
  </div>

  <footer>
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

    const cart = [];
    const number = "6282180397844";
    const $ = (id) => document.getElementById(id);
    function formatTanggalWaktu(date) {
      const bulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
      ];
      const hari = date.getDate();
      const bln = bulan[date.getMonth()];
      const tahun = date.getFullYear();
      const jam = date.getHours().toString().padStart(2, "0");
      const menit = date.getMinutes().toString().padStart(2, "0");
      return `${hari} ${bln} ${tahun}, ${jam}:${menit}`;
    }

    const renderProducts = () => {
      $("productGrid").innerHTML = products
        .map(
          (p) => `
          <div class="card">
            <img src="/images/${p.image}" alt="${p.name}" />
            <div class="card-content">
              <h3>${p.name}</h3>
              <p>Rp${p.price.toLocaleString("id-ID")}</p>
              <button class="btn" onclick='addToCart(${p.id})'>Tambah ke Keranjang</button>
            </div>
          </div>
        `
        )
        .join("");
    };
    
    document.getElementById("whatsappLink").addEventListener("click", function (e) {
      e.preventDefault();
      if (this.hasAttribute("disabled")) return;

      const form = document.getElementById("pembelianForm");

      
      form.querySelectorAll('input[name="produk_id[]"], input[name="qty[]"]').forEach(el => el.remove());

      
      cart.forEach(item => {
        const inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "produk_id[]";
        inputId.value = item.id;

        const inputQty = document.createElement("input");
        inputQty.type = "hidden";
        inputQty.name = "qty[]";
        inputQty.value = item.qty;

        form.appendChild(inputId);
        form.appendChild(inputQty);
      });

      
      const formData = new FormData(form);

      fetch(form.action, {
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
      })
        .then((res) => {
          if (!res.ok) throw new Error("Gagal menyimpan data.");
          window.open(this.dataset.href, "_blank");
        })
        .catch((err) => alert("Gagal menyimpan data pembeli."));
    });


    const addToCart = (id) => {
      const p = products.find((x) => x.id === id);
      const item = cart.find((i) => i.id === id);

      if (item) {
        if (item.qty + 1 > p.stock) {
          alert(`Maaf Stok ${p.name} tidak cukup, sisa stok: ${p.stock}`);
          return;
        }
        item.qty++;
      } else {
        if (p.stock < 1) {
          alert(`Maaf Stok ${p.name} tidak cukup, sisa stok: ${p.stock}`);
          return;
        }
        cart.push({ ...p, qty: 1 });
      }
      renderCart();
    };

    const changeQty = (id, delta) => {
      const item = cart.find((i) => i.id === id);
      const p = products.find((x) => x.id === id);
      if (!item) return;

      if (delta > 0 && item.qty + delta > p.stock) {
        alert(`Maaf Stok ${p.name} tidak cukup, sisa stok: ${p.stock}`);
        return;
      }

      item.qty += delta;
      if (item.qty <= 0) {
        cart.splice(cart.indexOf(item), 1);
      }
      renderCart();
    };


    const renderCart = () => {
      $("cartItems").innerHTML = cart
        .map(
          (item) => `
          <div class="cart-item">
            <span>${item.name} - Rp${item.price.toLocaleString(
            "id-ID"
          )} x ${item.qty}</span>
            <span>
              <button onclick="changeQty(${item.id}, -1)">-</button>
              <button onclick="changeQty(${item.id}, 1)">+</button>
              <button onclick="changeQty(${item.id}, -${item.qty})">Hapus</button>
            </span>
          </div>
        `
        )
        .join("");

      const total = cart.reduce((sum, i) => sum + i.price * i.qty, 0);
      $("totalPrice").textContent = `Total: Rp${total.toLocaleString("id-ID")}`;

      updateWhatsappLink(total);
    }

    const updateWhatsappLink = (total) => {
      const nama = $("nama").value.trim();
      const telepon = $("telepon").value.trim();
      const alamat = $("alamat").value.trim();
      const link = $("whatsappLink");

      if (!cart.length || !nama || !telepon || !alamat) {
        link.href = "#";
        link.setAttribute("disabled", true);
        return;
      }

      const message = cart
        .map((i, idx) => `${idx + 1}. ${i.name} - Rp${i.price} x ${i.qty}`)
        .join("\n");

      const now = new Date();
      const waktuPesan = formatTanggalWaktu(now);

      const fullMessageRaw = `
    WAKTU PEMESANAN: ${waktuPesan}
    NAMA PEMESAN: ${nama}
    No. HP: ${telepon}

    Saya ingin memesan:
    ${message}

    TOTAL HARGA: Rp${total.toLocaleString("id-ID")}

    ALAMAT PENGIRIMAN:
    ${alamat}
    `;

      const encoded = encodeURIComponent(fullMessageRaw.trim());
      link.dataset.href = `https://wa.me/${number}?text=${encoded}`;
      link.removeAttribute("disabled");
    };

    $("nama").addEventListener("input", renderCart);
    $("telepon").addEventListener("input", renderCart);
    $("alamat").addEventListener("input", renderCart);

    renderProducts();

    document.addEventListener("DOMContentLoaded", () => {
      if (slides.length > 0) {
        createDots(); 
        showSlide(currentIndex); 
        setInterval(nextSlide, 5000); 
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