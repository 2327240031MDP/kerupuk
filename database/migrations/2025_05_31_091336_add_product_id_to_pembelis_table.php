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
        Schema::table('pembelis', function (Blueprint $table) {
            // Tambahkan product_id setelah kolom 'dari_web' atau sesuaikan posisinya
            // Kolom ini bisa null jika tidak semua pembelian harus terkait langsung dengan satu produk utama
            $table->foreignId('product_id_main')->nullable()->after('dari_web')
                  ->constrained('products') // Mengacu ke tabel 'products'
                  ->onDelete('set null'); // Jika produk dihapus, set product_id_main menjadi null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelis', function (Blueprint $table) {
            // Pastikan nama constraint sesuai dengan yang dibuat Laravel atau definisikan secara eksplisit
            // Biasanya formatnya: namatabel_namakolom_foreign
            $table->dropForeign(['product_id_main']); // Hapus foreign key constraint dulu
            $table->dropColumn('product_id_main');   // Kemudian hapus kolomnya
        });
    }
};