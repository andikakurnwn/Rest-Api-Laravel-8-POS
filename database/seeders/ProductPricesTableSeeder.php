<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_prices')->insert([
            'product_id' => '7',
            'stock' => '35',
            'price' => '7000'
        ]);

        DB::table('product_prices')->insert([
            'product_id' => '8',
            'stock' => '35',
            'price' => '10000'
        ]);

        DB::table('product_prices')->insert([
            'product_id' => '9',
            'stock' => '35',
            'price' => '13000'
        ]);

        DB::table('product_prices')->insert([
            'product_id' => '10',
            'stock' => '35',
            'price' => '16000'
        ]);
    }
}
