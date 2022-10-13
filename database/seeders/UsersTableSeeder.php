<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Suport\Facades\DB;
use Illuminate\Suport\Facades\Hash;
use Faker\Factory as Faker;

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
            'name' => 'Admin',
            'email' => 'admin@algo.com',
            'username' => 'admin',
            'password' => Hash::make('123'),
            'avatar' => 'https//thiscatdoesnotexist.com/',
            'role' => 'admin',
        ]);

        $faker = Faker::create();
        for($i = 0; $i<10; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'username' => $faker->userName,
                'password' => Hash::make('111'),
                'avatar' => 'https//thiscatdoesnotexist.com/',
                'role' => 'user',
            ]);
        }
    }
}
