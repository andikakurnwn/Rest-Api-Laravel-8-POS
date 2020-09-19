<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id' => '1',
            'name' => 'ice_coffe_cappucino.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '1',
            'name' => 'ice_coffe_cappucino_2.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '2',
            'name' => 'ice_coffe_milk.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '2',
            'name' => 'ice_coffe_milk_2.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '3',
            'name' => 'japanese_ice_coffe,jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '4',
            'name' => 'affogato_coffe.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '5',
            'name' => 'frappe_coffe.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '6',
            'name' => 'espresso_coffe.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '7',
            'name' => 'roti_bakar.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '7',
            'name' => 'roti_bakar_2.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '8',
            'name' => 'donat.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '9',
            'name' => 'pisang_goreng.jpg',
        ]);

        DB::table('product_images')->insert([
            'product_id' => '10',
            'name' => 'singkong_goreng.jpg',
        ]);
    }
}
