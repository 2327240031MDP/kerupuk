<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $product->name }} - Detail Produk</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 0; margin: 0; background: linear-gradient(135deg, #f0f0f0, #ffffff); color: #333; }
        header { background: #b00000; padding: 10px 20px; color: white; display: flex; align-items: center; justify-content: space-between; }
        .navbar-title { font-size: 20px; font-weight: bold; }
        .nav-links a { color: white; margin-left: 20px; text-decoration: none; font-weight: bold; }
        .nav-links a:hover { text-decoration: underline; }
        .container { padding: 20px; max-width: 700px; margin: 40px auto 80px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(176, 0, 0, 0.2); }
        img { width: 100%; border-radius: 12px; margin-bottom: 20px; }
        h1 { margin-bottom: 10px; color: #b00000; }
        p { font-size: 16px; color: #555; line-height: 1.4; }
        a.back-link { display: inline-block; margin-bottom: 20px; color: #b00000; text-decoration: none; font-weight: bold; }
        a.back-link:hover { text-decoration: underline; }
        footer { background: #b00000; color: #fff; text-align: center; padding: 12px 0; font-size: 14px; position: fixed; width: 100%; bottom: 0; left: 0; }
    </style>
</head>
<body>
    <header>
        <div class="navbar-title">Toko Kerupuk 619</div>
        <nav class="nav-links">
            <a href="/produk">Produk</a>
            <a href="/pembelian">Pembelian</a>
        </nav>
    </header>

    <div class="container">
        <a href="/produk" class="back-link">&larr; Kembali ke Produk</a>
        <h1>{{ $product->name }}</h1>
        <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" />
        <p style="font-weight:bold; font-size:18px; color:#b00000;">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p>{{ $product->desc_long }}</p>
    </div>


    <footer>
        &copy; 2025 Toko Kerupuk 619 - Semua hak cipta dilindungi
    </footer>
</body>
</html>

