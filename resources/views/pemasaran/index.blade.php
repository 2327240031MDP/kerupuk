<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori Pembelian - Toko Kerupuk 619</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: linear-gradient(to right, #ffecec, #ffdbdb); margin: 0; padding: 0; }
        header { background: #b00000; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        .navbar-title { font-size: 20px; font-weight: bold; }
        .nav-links a { color: #ffdbdb; margin-left: 20px; text-decoration: none; font-weight: bold; }
        .nav-links a:hover { text-decoration: underline; }
        .container { max-width: 1000px; margin: 40px auto; background: #fff0f0; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 30px; }
        h1 { color: #b00000; text-align: center; margin-bottom: 25px; }
        h3 { text-align: center; margin-bottom: 20px; color: #b00000; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 14px; border-bottom: 1px solid #ccc; text-align: left; }
        th { background: #b00000; color: white; }
        tr:hover { background: #ffeaea; }
        .ad-container { margin: 40px 0; position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
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
    <h1>Histori Pembelian</h1>
    <h3>Berdasarkan Peringkat Terbaru</h3>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Dari Website?</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembelian as $index => $pembeli)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembeli->nama }}</td>
                    <td>{{ $pembeli->notelp }}</td>
                    <td>{{ $pembeli->alamat }}</td>
                    <td>{{ $pembeli->dari_web ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada data pembeli.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="ad-container">
        <div class="ad-slider" id="adSlider">
            <div class="ad-slide"><img src="{{ asset('images/1.png') }}" alt="Iklan 1"></div>
            <div class="ad-slide"><img src="{{ asset('images/2.png') }}" alt="Iklan 2"></div>
            <div class="ad-slide"><img src="{{ asset('images/3.png') }}" alt="Iklan 3"></div>
            <div class="ad-slide"><img src="{{ asset('images/4.png') }}" alt="Iklan 4"></div>
            <div class="ad-slide"><img src="{{ asset('images/5.png') }}" alt="Iklan 5"></div>
        </div>
        <div class="slider-nav">
            <button class="slider-btn" onclick="prevSlide()">‹</button>
            <button class="slider-btn" onclick="nextSlide()">›</button>
        </div>
        <div class="slider-dots"></div>
    </div>
</div>

<footer style="background:#b00000; color:white; text-align:center; padding:14px 0; margin-top:40px;">
    &copy; 2025 Toko Kerupuk 619 - Semua Hak Dilindungi
</footer>

<script>
    const adSlider = document.getElementById("adSlider");
    const slides = document.querySelectorAll(".ad-slide");
    const sliderDotsContainer = document.querySelector(".slider-dots");
    let dots = [];
    let currentIndex = 0;

    function createDots() {
        slides.forEach((_, i) => {
            const dot = document.createElement("span");
            dot.classList.add("dot");
            dot.addEventListener("click", () => currentSlide(i));
            sliderDotsContainer.appendChild(dot);
            dots.push(dot);
        });
    }

    function showSlide(index) {
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

    document.addEventListener("DOMContentLoaded", () => {
        createDots();
        showSlide(currentIndex);
        setInterval(nextSlide, 5000);
    });
</script>

</body>
</html>
