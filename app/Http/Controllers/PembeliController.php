<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
<<<<<<< Updated upstream
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
=======
use App\Models\Product; // Tambahkan ini
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk transaksi database
>>>>>>> Stashed changes

class PembeliController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'alamat' => 'required|string',
<<<<<<< Updated upstream
            'dari_web' => 'nullable|boolean',
            'cart' => 'required|json'
        ]);

        $cartItems = json_decode($validated['cart'], true);

        if (empty($cartItems)) {
            return response()->json(['message' => 'Keranjang tidak boleh kosong.'], 422);
        }

        DB::beginTransaction();
        try {
            $totalHarga = 0;
            $productsToAttach = [];
            $mainProductId = null; // Variabel untuk product_id_main

            // Tentukan product_id_main (misalnya, produk pertama di keranjang)
            if (!empty($cartItems)) {
                $firstCartItem = reset($cartItems); // Ambil item pertama
                if (isset($firstCartItem['id'])) {
                    $mainProductCheck = Product::find($firstCartItem['id']);
                    if ($mainProductCheck) {
                        $mainProductId = $firstCartItem['id'];
                    }
                }
            }


            foreach ($cartItems as $item) {
                $product = Product::find($item['id']);
                if (!$product) {
                    DB::rollBack();
                    return response()->json(['message' => 'Produk dengan ID ' . $item['id'] . ' tidak ditemukan.'], 404);
                }
                $priceAtPurchase = $product->price;
                $totalHarga += $priceAtPurchase * $item['qty'];
                $productsToAttach[$item['id']] = [
                    'quantity' => $item['qty'],
                    'price_at_purchase' => $priceAtPurchase
                ];
            }

            $pembeli = Pembeli::updateOrCreate(
                ['notelp' => $validated['notelp']],
                [
                    'nama' => $validated['nama'],
                    'alamat' => $validated['alamat'],
                    'dari_web' => $request->input('dari_web', 0),
                    'total_harga' => $totalHarga,
                    'product_id_main' => $mainProductId // Simpan product_id_main
                ]
            );

            $pembeli->products()->sync($productsToAttach);

            DB::commit();
            return response()->json(['message' => 'Data pembelian berhasil disimpan.', 'pembeli_id' => $pembeli->notelp], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing pembelian: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());
=======
            'cart' => 'required|string', // cart akan dikirim sebagai JSON string
            'dari_web' => 'sometimes|boolean',
        ]);

        // Decode cart dari JSON string
        $cartItems = json_decode($validated['cart'], true);

        if (empty($cartItems)) {
            return response()->json(['message' => 'Keranjang tidak boleh kosong.'], 400);
        }

        $totalHargaKeseluruhan = 0;
        $produkUntukDisimpan = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $subtotal = $product->price * $item['qty'];
                $totalHargaKeseluruhan += $subtotal;
                $produkUntukDisimpan[$item['id']] = [
                    'quantity' => $item['qty'],
                    'subtotal' => $subtotal,
                ];
            } else {
                // Handle jika produk tidak ditemukan, mungkin throw error atau skip
                return response()->json(['message' => 'Produk dengan ID ' . $item['id'] . ' tidak ditemukan.'], 404);
            }
        }
        
        // Gunakan transaksi database untuk memastikan integritas data
        DB::beginTransaction();
        try {
            $pembeli = Pembeli::create([
                'nama' => $validated['nama'],
                'notelp' => $validated['notelp'],
                'alamat' => $validated['alamat'],
                'dari_web' => $request->input('dari_web', 1), // Default ke 1 jika dari_web
                'total_harga' => $totalHargaKeseluruhan,
            ]);

            // Simpan produk ke tabel pivot
            $pembeli->products()->attach($produkUntukDisimpan);

            DB::commit(); // Jika semua berhasil, commit transaksi

            return response()->json(['message' => 'Data pembelian berhasil disimpan.'], 200);

        } catch (\Exception $e) {
            DB::rollBack(); // Jika ada error, rollback transaksi
>>>>>>> Stashed changes
            return response()->json(['message' => 'Gagal menyimpan data pembelian: ' . $e->getMessage()], 500);
        }
    }

    public function index()
    {
<<<<<<< Updated upstream
        // Eager load relasi mainProduct jika akan ditampilkan di histori
        $pembelian = Pembeli::with(['products', 'mainProduct'])->latest()->get();
=======
        // Eager load relasi 'products'
        $pembelian = Pembeli::with('products')->latest()->get();
>>>>>>> Stashed changes
        return view('pemasaran.index', compact('pembelian'));
    }
}