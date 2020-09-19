<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeVariationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size_variations')->insert([
            'product_id' => '1',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '10000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '1',
            'size' => 'Medium',
            'Stock' => '50',
            'price' => '16000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '1',
            'size' => 'Big',
            'Stock' => '50',
            'price' => '20000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '2',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '12000'
        ]);


        DB::table('size_variations')->insert([
            'product_id' => '2',
            'size' => 'Medium',
            'Stock' => '50',
            'price' => '15000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '3',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '7000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '3',
            'size' => 'Big',
            'Stock' => '50',
            'price' => '13000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '4',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '8000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '4',
            'size' => 'Medium',
            'Stock' => '50',
            'price' => '18000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '4',
            'size' => 'King',
            'Stock' => '50',
            'price' => '22000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '5',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '7000'
        ]);

        DB::table('size_variations')->insert([
            'product_id' => '6',
            'size' => 'Small',
            'Stock' => '50',
            'price' => '7000'
        ]);
    }
}
