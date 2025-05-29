<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/produk', function () {
    return view('pemasaran.produk');
});

Route::get('/pembelian', function () {
    return view('pemasaran.pembelian');
});

Route::get('/produk/{id}', function ($id) {
    $products = [
    1 => [
        'name' => 'Kerupuk Sanggul',
        'image' => 'Screenshot 2025-05-28 200120.png',
        'desc' => 'Kerupuk udang renyah berbentuk sanggul, cocok untuk lauk atau camilan.',
        'desc_long' => 'Kerupuk Sanggul adalah kerupuk khas yang dibuat dari bahan utama udang segar dengan proses pengeringan alami. Teksturnya sangat renyah dengan aroma udang yang kuat dan rasa gurih yang pas. Cocok dinikmati sebagai camilan atau pelengkap hidangan tradisional Anda. Dikemas dengan higienis dan tahan lama.',
        'price' => 15000
    ],
    2 => [
        'name' => 'Getas',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Kerupuk ikan tradisional khas pesisir dengan rasa gurih menggoda.',
        'desc_long' => 'Getas adalah kerupuk ikan khas pesisir yang dibuat dari ikan pilihan dan bumbu tradisional. Memiliki rasa gurih dan tekstur renyah yang unik, cocok untuk menambah cita rasa pada hidangan harian Anda. Produk ini diproses dengan standar kebersihan tinggi dan dikemas rapi.',
        'price' => 12000
    ],
    3 => [
        'name' => 'Kerupuk 1',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Varian klasik kerupuk udang dengan aroma khas dan tekstur renyah.',
        'desc_long' => 'Kerupuk 1 adalah varian klasik kerupuk udang yang memiliki aroma khas udang laut dan tekstur renyah sempurna. Cocok sebagai teman makan atau camilan di waktu senggang. Diproses secara higienis dengan bahan berkualitas.',
        'price' => 14000
    ],
    4 => [
        'name' => 'Kerupuk 2',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Kerupuk ikan dengan bumbu khas dan rasa autentik Indonesia.',
        'desc_long' => 'Kerupuk 2 terbuat dari ikan segar dengan bumbu khas tradisional yang memberikan cita rasa autentik Indonesia. Teksturnya renyah dan gurih, pas untuk menemani hidangan utama Anda. Dihasilkan dari bahan pilihan dengan proses pengolahan modern.',
        'price' => 13000
    ],
    5 => [
        'name' => 'Kerupuk 3',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Pilihan ekonomis untuk kerupuk udang rasa original.',
        'desc_long' => 'Kerupuk 3 merupakan pilihan ekonomis bagi yang ingin menikmati kerupuk udang rasa original dengan kualitas baik. Cocok untuk camilan sehari-hari maupun pelengkap hidangan tradisional. Diproduksi dengan standar kebersihan dan kualitas yang terjaga.',
        'price' => 10000
    ],
    6 => [
        'name' => 'Kerupuk 4',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Kerupuk ikan padat rasa, cocok untuk pelengkap makanan berat.',
        'desc_long' => 'Kerupuk 4 adalah kerupuk ikan dengan tekstur padat dan rasa kuat yang cocok sebagai pelengkap makanan berat. Membawa sensasi gurih dan renyah yang nikmat saat disantap. Dibuat dari bahan pilihan dan proses yang higienis.',
        'price' => 11000
    ],
    7 => [
        'name' => 'Kerupuk 5',
        'image' => 'suir6jg3ujfu8j6fw0fpovp9z6lkgjwv.jpg',
        'desc' => 'Kerupuk bawang ringan dan renyah dengan aroma bawang menggoda.',
        'desc_long' => 'Kerupuk 5 menawarkan rasa unik kerupuk bawang yang ringan, renyah, dan beraroma bawang yang menggoda selera. Cocok sebagai camilan dan pelengkap hidangan sehari-hari. Diproduksi dengan proses modern agar kualitas tetap terjaga.',
        'price' => 12500
    ],
];
    if (!isset($products[$id])) abort(404);

    $product = (object) $products[$id];
    return view('produk.detail', compact('product'));
});
