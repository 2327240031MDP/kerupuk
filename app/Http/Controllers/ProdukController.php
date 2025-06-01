<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        return view('pemasaran.produk', compact('products'));
    }

    public function show($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk.detail', compact('product'));
    }
}