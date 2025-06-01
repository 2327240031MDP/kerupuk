<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pembeli extends Model
{
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'pembeli_produk')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
    protected $table = 'pembelis';
    protected $fillable = ['nama', 'notelp', 'alamat', 'dari_web'];
}