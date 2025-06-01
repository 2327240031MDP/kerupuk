<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function pembeli()
    {
        return $this->belongsToMany(Pembeli::class, 'pembeli_produk')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
    
    use HasFactory;
}
