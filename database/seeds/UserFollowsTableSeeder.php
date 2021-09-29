<?php

use Illuminate\Database\Seeder;
use App\UserFollow;

class UserFollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFollow::create([
            'user_id'=>3,
            'workout_id'=>1
        ]);
    }
}
