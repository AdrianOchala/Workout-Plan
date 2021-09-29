<?php

use Illuminate\Database\Seeder;
use App\UserLike;

class UserLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLike::create([
            'user_id'=>3,
            'workout_id'=>1
        ]);
        UserLike::create([
                    'user_id'=>4,
                    'workout_id'=>1
                ]);
    }
}
