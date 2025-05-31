<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate(); // Clear the table before seeding

        $products = [
            [
                'name' => 'Super Kancing',
                'image' => 'superkancing.jpg',
                'price' => 13000,
                'desc' => 'Kerupuk udang renyah berbentuk kancing, cocok untuk lauk atau camilan.',
                'desc_long' => 'Super Kancing adalah kerupuk khas yang dibuat dari bahan utama udang segar dengan proses pengeringan alami. Teksturnya sangat renyah dengan aroma udang yang kuat dan rasa gurih yang pas. Cocok dinikmati sebagai camilan atau pelengkap hidangan tradisional Anda.',
            ],
            [
                'name' => 'Kerupuk Sanggul Mini',
                'image' => 'sanggulmini.jpg',
                'price' => 14000,
                'desc' => 'Kerupuk ikan tradisional khas pesisir dengan rasa gurih menggoda.',
                'desc_long' => 'Kerupuk Sanggul Mini adalah versi lebih kecil dari kerupuk sanggul klasik yang dibuat dari ikan pilihan dan bumbu tradisional. Memiliki rasa gurih dan tekstur renyah yang unik, cocok untuk menambah cita rasa pada hidangan harian Anda.',
            ],
            [
                'name' => 'Kerupuk Sanggul',
                'image' => 'kerupuksanggul.jpg',
                'price' => 17000,
                'desc' => 'Kerupuk khas berbentuk sanggul dengan rasa gurih dan tekstur renyah.',
                'desc_long' => 'Kerupuk Sanggul adalah kerupuk klasik yang memiliki bentuk unik dan tekstur renyah sempurna. Cocok sebagai teman makan atau camilan di waktu senggang.',
            ],
            [
                'name' => 'Kerupuk Mawar',
                'image' => 'kerupukmawar.jpg',
                'price' => 10000,
                'desc' => 'Varian klasik kerupuk udang dengan aroma khas dan tekstur renyah.',
                'desc_long' => 'Kerupuk Mawar adalah varian klasik kerupuk ikan segar yang memiliki aroma khas udang laut dan tekstur renyah sempurna. Cocok sebagai teman makan atau camilan di waktu senggang.',
            ],
            [
                'name' => 'Kerupuk Mawar Udang',
                'image' => 'kerupukmawarudang.jpg',
                'price' => 10000,
                'desc' => 'Kerupuk ikan dengan bumbu khas dan rasa autentik Indonesia.',
                'desc_long' => 'Kerupuk Mawar Udang terbuat dari udang dengan bumbu khas tradisional yang memberikan cita rasa autentik Indonesia. Teksturnya renyah dan gurih, pas untuk menemani hidangan utama Anda.',
            ],
            [
                'name' => 'Kerupuk Teratai',
                'image' => 'kerupukteratai.jpg',
                'price' => 10000,
                'desc' => 'Kerupuk bawang ringan dan renyah dengan aroma bawang menggoda.',
                'desc_long' => 'Kerupuk Teratai menawarkan rasa unik kerupuk bawang yang ringan, renyah, dan beraroma bawang yang menggoda selera. Cocok sebagai camilan dan pelengkap hidangan sehari-hari.',
            ],
            [
                'name' => 'Getas',
                'image' => 'getas.jpg',
                'price' => 20000,
                'desc' => 'Kerupuk ikan padat rasa, cocok untuk pelengkap makanan berat.',
                'desc_long' => 'Getas adalah kerupuk ikan dengan tekstur padat dan rasa kuat yang cocok sebagai pelengkap makanan berat. Membawa sensasi gurih dan renyah yang nikmat saat disantap.',
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}