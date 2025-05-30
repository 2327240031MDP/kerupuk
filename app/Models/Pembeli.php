<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembelis';
    protected $primaryKey = 'notelp'; // karena pakai notelp sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nama', 'notelp', 'alamat', 'dari_web'];
}