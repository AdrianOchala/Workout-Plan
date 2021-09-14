<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('article_categories');
            $table->string('content');
            $table->date('date');
            $table->unsignedBigInteger('workout_id')->nullable();
            $table->foreign('workout_id')->references('id')->on('workouts');
            $table->bigInteger('views');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}