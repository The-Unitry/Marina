<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depth');
            $table->integer('length');
            $table->integer('width');
            $table->timestamps();
        });

        Schema::table('boxes', function ($table) {
            $table->integer('scaffold_id')->unsigned();
            $table->foreign('scaffold_id')->references('id')->on('scaffolds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boxes');
    }
}
