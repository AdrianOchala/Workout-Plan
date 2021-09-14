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
             $table->unsignedBigInteger('author_id');
             $table->foreign('author_id')->references('id')->on('users');
             $table->unsignedBigInteger('article_id');
             $table->foreign('article_id')->references('id')->on('articles');
             $table->string('content');
             $table->bigInteger('mark')->nullable();
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
        Schema::dropIfExists('opinions');
    }
}