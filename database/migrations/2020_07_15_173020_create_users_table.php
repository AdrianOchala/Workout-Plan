<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                        $table->id();
                        $table->string('name',30)->nullable();
                        $table->string('surname',40)->nullable();
                        $table->string('nick',20)->nullable();
                        $table->string('email',50)->unique();
                        $table->string('password');
                        $table->string('phone',20)->nullable();
                        $table->integer('age')->nullable();
                        $table->integer('height')->nullable();
                        $table->string('sex');
                        $table->boolean('showUserName')->default(true);
                        $table->string('role')->default('User');
                        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
