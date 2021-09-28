<?php

use Illuminate\Database\Seeder;
use App\Opinion;

class OpinionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opinion::create([
            'author_id'=>3, 'workout_id'=>1,'content'=>'Bardzo fajnie ułożony plan treningowy, polecam!','mark'=>5,'date'=>'2021-09-25 19:56:22'
        ]);
    }
}
