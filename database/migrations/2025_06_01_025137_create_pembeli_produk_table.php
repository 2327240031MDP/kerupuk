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
        Schema::create('pembeli_produk', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pembeli_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('qty');

            $table->foreign('pembeli_id')->references('id')->on('pembelis')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembeli_produk');
    }
};
