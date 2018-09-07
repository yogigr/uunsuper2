<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::insert([
       	[
       		'id' => 1,
       		'name' => 'Plentong',
       		'slug' => 'plentong',
       		'created_at' => now(),
       		'updated_at' => now()
       	],
       	[
       		'id' => 2,
       		'name' => 'Morando',
       		'slug' => 'morando',
       		'created_at' => now(),
       		'updated_at' => now()
       	],
       	[
       		'id' => 3,
       		'name' => 'NOK',
       		'slug' => 'nok',
       		'created_at' => now(),
       		'updated_at' => now()
       	]
       ]);
    }
}
