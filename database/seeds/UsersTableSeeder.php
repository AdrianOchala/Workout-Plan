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
        User::create(['name'=>'User',
                              'surname'=>'user',
                              'nick'=>'user',
                              'email'=>'user@gmail.com',
                              'password'=>bcrypt('haslo123'),
                              'phone'=>'500200100',
                              'age'=>20,
                              'height'=>190,
                              'sex'=>'male']);
                 User::create(['name'=>'Admin',
                                      'surname'=>'admin',
                                      'nick'=>'admin',
                                      'email'=>'admin@gmail.com',
                                      'password'=>bcrypt('haslo123'),
                                      'phone'=>'123456789',
                                      'age'=>24,
                                      'height'=>175,
                                      'sex'=>'male',
                                      'role'=>'Admin']);

    }
}
