<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use App\Models\Produk;

class PembeliController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'produk_id' => 'required|array',
            'qty' => 'required|array',
        ]);

        $pembeli = Pembeli::updateOrCreate(
            ['notelp' => $validated['notelp']],
            [
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'],
                'dari_web' => $request->input('dari_web', 0)
            ]
        );

        foreach ($request->produk_id as $i => $produkId) {
            $produk = Produk::findOrFail($produkId);
            $qty = (int) $request->qty[$i];

            if ($produk->stock < $qty) {
                return response()->json(['error' => "Stok untuk {$produk->nama} tidak mencukupi."], 422);
            }

            
            $produk->stock -= $qty;
            $produk->save();

            
            $pembeli->produk()->attach($produkId, ['qty' => $qty]);
        }

        return response()->json(['message' => 'Pembelian berhasil disimpan dan stok dikurangi.'], 200);
    }

    public function index()
    {
        $pembelian = Pembeli::latest()->get();
        return view('pemasaran.index', compact('pembelian'));
    }
}