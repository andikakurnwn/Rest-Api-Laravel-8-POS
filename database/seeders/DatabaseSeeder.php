<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsCategoryTableSeeder::class);
        $this->call(ProductPricesTableSeeder::class);
        $this->call(SizeVariationsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
    }
}
