<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'username' => 'ADME202008300001',
            'name' => 'Md.Admin',
            'telephone' => '123456789',
            'email' => 'admin@blog.com',
            'password' => bcrypt('rootadmin'),

        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'username' => 'KSRE202008300001',
            'name' => 'Md.Cashier',
            'telephone' => '123456789',
            'email' => 'cashier@blog.com',
            'password' => bcrypt('rootcashier'),

        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'username' => 'CSTE202008300001',
            'name' => 'Md.Customer',
            'telephone' => '123456789',
            'email' => 'customer@blog.com',
            'password' => bcrypt('rootcustomer'),

        ]);

    }
}
