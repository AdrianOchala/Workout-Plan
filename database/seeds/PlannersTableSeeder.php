<?php

use Illuminate\Database\Seeder;
use App\Planner;

class PlannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Planner::create([
            'user_id'=>2, 'monday'=>1, 'tuesday'=>null,'wednesday'=>2,'thursday'=>1,'friday'=>null,'saturday'=>1,'sunday'=>2
        ]);
    }
}
