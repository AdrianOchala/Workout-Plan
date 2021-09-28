<?php

use Illuminate\Database\Seeder;
use App\UserMeasurment;

class UserMeasurmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        UserMeasurment::create([
            'user_id'=>2,
                        'date'=>'2021-07-01',
                        'weight'=>115,
                        'neck'=>39,
                        'bicepsL'=>37.5,
                        'bicepsR'=>37.5,
                        'wristL'=>20,
                        'wristR'=>20,
                        'chest'=>117,
                        'waist'=>107,
                        'stomach'=>120,
                        'crimson'=>110,
                        'hips'=>118,
                        'thighL'=>74,
                        'thighR'=>74,
                        'calfL'=>47,
                        'calfR'=>47
        ]);
        UserMeasurment::create([
                    'user_id'=>2,
                                'date'=>'2021-08-01',
                                'weight'=>108,
                                'neck'=>38,
                                'bicepsL'=>37.5,
                                'bicepsR'=>37.5,
                                'wristL'=>20,
                                'wristR'=>20,
                                'chest'=>115,
                                'waist'=>105,
                                'stomach'=>110,
                                'crimson'=>105,
                                'hips'=>110,
                                'thighL'=>73,
                                'thighR'=>73,
                                'calfL'=>46,
                                'calfR'=>46
                ]);
    }
}
