<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('monday')->nullable();
            $table->foreign('monday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('tuesday')->nullable();
            $table->foreign('tuesday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('wednesday')->nullable();
            $table->foreign('wednesday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('thursday')->nullable();
            $table->foreign('thursday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('friday')->nullable();
            $table->foreign('friday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('saturday')->nullable();
            $table->foreign('saturday')->references('id')->on('workouts')->onDelete('set null');
            $table->unsignedBigInteger('sunday')->nullable();
            $table->foreign('sunday')->references('id')->on('workouts')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planners');
    }
}
