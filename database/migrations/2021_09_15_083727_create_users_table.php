<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->json('name')->nullable();
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('phone');
            $table->string('remember_token')->nullable();
            $table->boolean('status')->nullable()->default(1);
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
