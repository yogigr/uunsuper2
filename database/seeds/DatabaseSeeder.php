<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProvincesTableSeeder::class,
            CitiesTableSeeder::class,
        	RolesTableSeeder::class,
        	UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            OrderStatusesTableSeeder::class,
            AdminBanksTableSeeder::class
        ]);
    }
}
