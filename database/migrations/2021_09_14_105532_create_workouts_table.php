<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->string('plan');
            $table->integer('likes')->default(0);
            $table->integer('follows')->default(0);
            $table->float('rating',3,2)->default(0);
            $table->boolean('public');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('workout_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workouts');
    }
}
