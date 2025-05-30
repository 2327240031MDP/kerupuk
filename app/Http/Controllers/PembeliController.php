<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);
        
        Pembeli::create([
            'nama' => $validated['nama'],
            'notelp' => $validated['notelp'],
            'alamat' => $validated['alamat'],
            'dari_web' => $request->input('dari_web', 0)
        ]);

        return response()->json(['message' => 'Data berhasil disimpan.'], 200);
    }
        public function index()
    {
        $pembelian = Pembeli::latest()->get();
        return view('pemasaran.index', compact('pembelian'));
    }
}
