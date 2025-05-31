<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PembeliController;
use App\Models\Product; // <-- Add this

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    $products = Product::all(); // Fetch all products from the database
    return view('pemasaran.produk', compact('products')); // Pass products to the view
});

Route::get('/pembelian', function () {
    $products = Product::all(); // Fetch all products
    return view('pemasaran.pembelian', compact('products')); // Pass products to the view
});

Route::get('/produk/{id}', function ($id) {
    $product = Product::findOrFail($id); // Fetch the product by ID or fail
    return view('produk.detail', compact('product'));
});

Route::post('/pembeli', [PembeliController::class, 'store'])->name('pembeli.store');

Route::get('/histori', [PembeliController::class, 'index'])->name('pemasaran.index');