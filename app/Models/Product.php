<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'desc',
        'desc_long',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:0',
    ];

    /**
     * The pembelian records that belong to the Product.
     */
    public function pembelian()
    {
        return $this->belongsToMany(Pembeli::class, 'pembelian_product', 'product_id', 'pembeli_notelp')
                    ->withPivot('quantity', 'price_at_purchase')
                    ->withTimestamps();
    }
}