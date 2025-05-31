<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembelis';
    protected $primaryKey = 'notelp';
    public $incrementing = false;
    protected $keyType = 'string';
    // Tambahkan 'product_id_main' ke fillable
    protected $fillable = ['nama', 'notelp', 'alamat', 'dari_web', 'total_harga', 'product_id_main'];

    /**
     * Relasi untuk banyak produk dalam pembelian (melalui pivot table).
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'pembelian_product', 'pembeli_notelp', 'product_id')
                    ->withPivot('quantity', 'price_at_purchase')
                    ->withTimestamps();
    }

    /**
     * Relasi untuk produk utama yang terkait langsung dengan pembelian ini (jika ada).
     */
    public function mainProduct()
    {
        return $this->belongsTo(Product::class, 'product_id_main');
    }
}