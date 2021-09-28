<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(WorkoutTypesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleCategoriesTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);


    }
}
