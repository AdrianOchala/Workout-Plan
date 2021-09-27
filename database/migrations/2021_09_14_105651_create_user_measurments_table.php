<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMeasurmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_measurments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('date');
            $table->integer('weight');
            $table->integer('neck');
            $table->integer('bicepsL');
            $table->integer('bicepsR');
            $table->integer('wristL');
            $table->integer('wristR');
            $table->integer('chest');
            $table->integer('waist');
            $table->integer('stomach');
            $table->integer('crimson');
            $table->integer('hips');
            $table->integer('thighL');
            $table->integer('thighR');
            $table->integer('calfL');
            $table->integer('calfR');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_measurments');
    }
}
