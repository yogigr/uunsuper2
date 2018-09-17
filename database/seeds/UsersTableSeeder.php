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
        		'name' => 'Mumu Mukhlas',
        		'email' => 'mumumukhlas91@gmail.com',
        		'password' => bcrypt('admin'),
        		'role_id' => 1,
                'phone' => '085324015676',
                'address' => 'Blok Sabtu RT 14 RW 07 Desa Pinangraja Kecamatan Jatiwangi',
                'city_id' => 252,
                'province_id' => 9,
                'postal_code' => '45454',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
                'id' => 2,
        		'name' => 'Sopyan Jajuli',
        		'email' => 'sopyanjajuli@gmail.com',
        		'password' => bcrypt('user'),
        		'role_id' => 2,
                'phone' => '089676876781',
                'address' => 'Blok Sabtu RT 14 RW 07 Desa Baribis Kecamatan Cigasong',
                'city_id' => 252,
                'province_id' => 9,
                'postal_code' => '45454',
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ]);	
    }
}
