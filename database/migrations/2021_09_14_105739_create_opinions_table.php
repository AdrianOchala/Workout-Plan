<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('author_id')->nullable();
             $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
             $table->unsignedBigInteger('workout_id');
             $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
             $table->string('content');
             $table->bigInteger('mark');
             $table->dateTime('date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
