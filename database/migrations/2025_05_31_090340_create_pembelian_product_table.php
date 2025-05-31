<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_product', function (Blueprint $table) {
            $table->id();
            $table->string('pembeli_notelp'); // Foreign key to pembelis table
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price_at_purchase', 15, 0); // Harga produk saat pembelian
            $table->timestamps();

            // Foreign key constraint (manual karena primary key pembelis adalah string 'notelp')
            $table->foreign('pembeli_notelp')
                  ->references('notelp')
                  ->on('pembelis')
                  ->onDelete('cascade');

            // Unique constraint untuk mencegah duplikasi produk dalam satu pembelian
            // $table->unique(['pembeli_notelp', 'product_id']); // Komentari jika satu produk bisa muncul berkali-kali dalam satu cart (misal beda varian, walau disini tidak ada)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_product');
    }
};