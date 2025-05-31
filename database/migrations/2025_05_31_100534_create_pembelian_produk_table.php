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
        Schema::create('pembelian_produk', function (Blueprint $table) {
            $table->id('id_pembelian_produk'); // Kolom ID untuk tabel pivot
            $table->string('pembeli_notelp'); // Foreign key ke tabel pembelis (notelp)
            $table->unsignedBigInteger('product_id'); // Foreign key ke tabel products (id)
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 0); // Harga per item * quantity
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('pembeli_notelp')->references('notelp')->on('pembelis')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_produk');
    }
};