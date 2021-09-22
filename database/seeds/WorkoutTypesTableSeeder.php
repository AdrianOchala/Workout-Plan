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
        WorkoutType::create(['name'=>'FBW - full body workout','description'=>'Trening wszystkich partii mięśniowych.']);
        WorkoutType::create(['name'=>'Split','description'=>'Trening z podziałem na partie mięśniowe.']);
        WorkoutType::create(['name'=>'Trening siłowy','description'=>'Trening na wzrost siły.']);
        WorkoutType::create(['name'=>'Cardio','description'=>'Rodzaj ćwiczeń wytrzymałościowych, których celem jest poprawienie wydolności serca.']);
    }
}
