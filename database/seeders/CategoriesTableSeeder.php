<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Makanan',
            'description' => 'Ini adalah kategori tentang berbagai produk makanan kami',
            'slug' => 'makanan'
        ]);

        DB::table('categories')->insert([
            'name' => 'Minuman',
            'description' => 'Ini adalah kategori tentang berbagai produk makanan kami',
            'slug' => 'minuman'
        ]);
    }
}
