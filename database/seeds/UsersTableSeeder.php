<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
                'id' => 1,
        		'name' => 'Admin',
        		'email' => 'admin@admin.com',
        		'password' => bcrypt('admin'),
        		'role_id' => 1,
                'phone' => '089653490941',
                'address' => 'Blok A RT 02 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
                'city_id' => 252,
                'province_id' => 9,
                'postal_code' => '45472',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
                'id' => 2,
        		'name' => 'User',
        		'email' => 'user@user.com',
        		'password' => bcrypt('user'),
        		'role_id' => 2,
                'phone' => '089653490941',
                'address' => 'Blok A RT 02 RW 01 Desa Rajagaluhlor Kecamatan Rajagaluh',
                'city_id' => 252,
                'province_id' => 9,
                'postal_code' => '45472',
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ]);	
    }
}
