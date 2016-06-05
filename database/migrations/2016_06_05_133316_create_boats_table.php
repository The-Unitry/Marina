<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('type');
            $table->integer('height');
            $table->integer('length');
            $table->integer('depth');
            $table->integer('width');
            $table->timestamps();
        });

        Schema::table('boats', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boats');
    }
}
