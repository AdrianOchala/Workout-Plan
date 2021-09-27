<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWorkoutSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_workout_sessions', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('user_id');
             $table->foreign('user_id')->references('id')->on('users');
             $table->unsignedBigInteger('workout_id');
             $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
             $table->string('content');
             $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_workout_sessions');
    }
}
