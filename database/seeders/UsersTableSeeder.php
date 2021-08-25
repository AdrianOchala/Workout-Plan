<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for($i=0;$i<=10;$i++){
             DB::table('users')->insert([
                        'name'=> $faker->firstName,
                        'surname'=> $faker->lastName,
                        'nick'=>'testowy nick',
                        'email'=>$faker->unique()->email,
                        'sex'=>'male',
                        'password'=>bcrypt('password'),
                        'phone'=>'111222333',
                        'age'=>13,
                        'height'=>166,
                        'showUserName'=>true,
                    ]);
        }

    }
}
