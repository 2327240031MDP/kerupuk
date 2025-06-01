<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $produkList = [
            ['name' => 'Super Kancing', 'image' => 'superkancing.jpg', 'desc' => 'Kerupuk udang renyah berbentuk kancing, cocok untuk lauk atau camilan.', 'desc_long' => 'Super Kancing adalah kerupuk khas yang dibuat dari bahan utama udang segar dengan proses pengeringan alami. Teksturnya sangat renyah dengan aroma udang yang kuat dan rasa gurih yang pas. Cocok dinikmati sebagai camilan atau pelengkap hidangan tradisional Anda.', 'price' => 13000,'stock'=>50],
            ['name' => 'Kerupuk Sanggul Mini', 'image' => 'sanggulmini.jpg', 'desc' => 'Kerupuk ikan tradisional khas pesisir dengan rasa gurih menggoda', 'desc_long' => 'Kerupuk Sanggul Mini adalah versi lebih kecil dari kerupuk sanggul klasik yang dibuat dari ikan pilihan dan bumbu tradisional. Memiliki rasa gurih dan tekstur renyah yang unik, cocok untuk menambah cita rasa pada hidangan harian Anda.', 'price' => 14000,'stock'=>50],
            ['name' => 'Kerupuk Sanggul', 'image' => 'kerupuksanggul.jpg', 'desc' => 'Kerupuk khas berbentuk sanggul dengan rasa gurih dan tekstur renyah', 'desc_long' => 'Kerupuk Sanggul adalah kerupuk klasik yang memiliki bentuk unik dan tekstur renyah sempurna. Cocok sebagai teman makan atau camilan di waktu senggang', 'price' => 13000,'stock'=>50],
            ['name' => 'Kerupuk Mawar', 'image' => 'kerupukmawar.jpg', 'desc' => 'Varian klasik kerupuk dengan aroma khas dan tekstur renyah', 'desc_long' => 'Kerupuk Mawar terbuat dari ikan segar dengan bumbu khas tradisional yang memberikan cita rasa autentik Indonesia. Teksturnya renyah dan gurih, pas untuk menemani hidangan utama Anda.', 'price' => 10000,'stock'=>50],
            ['name' => 'Kerupuk Mawar Udang', 'image' => 'kerupukmawarudang.jpg', 'desc' => 'Varian klasik kerupuk udang dengan aroma khas dan tekstur renyah', 'desc_long' => 'Kerupuk Mawar adalah varian klasik kerupuk udang yang memiliki aroma khas udang laut dan tekstur renyah sempurna. Cocok sebagai teman makan atau camilan di waktu senggang.', 'price' => 10000,'stock'=>50],
            ['name' => 'Kerupuk Teratai', 'image' => 'kerupukteratai.jpg', 'desc' => 'Kerupuk renyah dengan aroma ikan menggoda', 'desc_long' => 'Kerupuk Teratai menawarkan rasa unik kerupuk yang ringan, renyah, dan beraroma ikan yang menggoda selera. Cocok sebagai camilan dan pelengkap hidangan sehari-hari.', 'price' => 10000,'stock'=>50],
            ['name' => 'Kerupuk Getas', 'image' => 'getas.jpg', 'desc' => 'Kerupuk ikan padat rasa, cocok untuk pelengkap makanan berat.', 'desc_long' => 'Getas adalah kerupuk ikan dengan tekstur padat dan rasa kuat yang cocok sebagai pelengkap makanan berat. Membawa sensasi gurih dan renyah yang nikmat saat disantap.', 'price' => 20000,'stock'=>50],
            
        ];

        foreach ($produkList as $data) {
            Produk::create(array_merge($data, ['stock' => 50]));
        }
    }
}