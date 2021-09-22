<?php

use Illuminate\Database\Seeder;
use App\WorkoutType;

class WorkoutTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkoutType::create(['name'=>'FBW','description'=>'Trening wszystkich partii mięśniowych']);
        WorkoutType::create(['name'=>'Split','description'=>'Trening z podziałem na partie mięśniowe']);
    }
}
