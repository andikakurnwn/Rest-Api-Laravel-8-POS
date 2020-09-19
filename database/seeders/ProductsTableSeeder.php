<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => '1',
            'user_id' => '2',
            'name' => 'Ice Coffe Cappucino',
            'description' => 'Ice Coffe Cappucino yang kami miliki ini bukanlah Ice Coffe Cappucino kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau ..!!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '2',
            'user_id' => '2',
            'name' => 'Ice Coffe Milk',
            'description' => 'Ice Coffe Milk yang kami miliki ini bukanlah Ice Coffe Milk kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '3',
            'user_id' => '2',
            'name' => 'Japanese Ice Coffe',
            'description' => 'Japanese Ice Coffe yang kami miliki ini bukanlah Japanese Ice Coffe kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '4',
            'user_id' => '2',
            'name' => 'Affogato Coffe',
            'description' => 'Affogato Coffe yang kami miliki ini bukanlah Affogato Coffe kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau ..!!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '5',
            'user_id' => '2',
            'name' => 'Frappe Coffe',
            'description' => 'Frappe Coffe yang kami miliki ini bukanlah Frappe Coffe kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '6',
            'user_id' => '2',
            'name' => 'Espresso Coffe',
            'description' => 'Espresso Coffe yang kami miliki ini bukanlah Espresso Coffe kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '1'
        ]);

        DB::table('products')->insert([
            'id' => '7',
            'user_id' => '2',
            'name' => 'Roti Bakar',
            'description' => 'Roti Bakar yang kami miliki ini bukanlah Roti Bakar.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '0'
        ]);

        DB::table('products')->insert([
            'id' => '8',
            'user_id' => '2',
            'name' => 'Donat',
            'description' => 'Donat yang kami miliki ini bukanlah Donat kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau ..!!',
            'available_size' => '0'
        ]);

        DB::table('products')->insert([
            'id' => '9',
            'user_id' => '2',
            'name' => 'Pisang Goreng',
            'description' => 'Pisang Goreng yang kami miliki ini Pisang Goreng Susu kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '0'
        ]);

        DB::table('products')->insert([
            'id' => '10',
            'user_id' => '2',
            'name' => 'Singkong Goreng',
            'description' => 'Singkong Goreng yang kami miliki ini bukanlah Singkong Goreng kaleng-kaleng.. silakan coba kalau kau tak percaya.. bilang tak enak retak ginjal kau.. !!',
            'available_size' => '0'
        ]);
    }
}
