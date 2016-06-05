<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('approved');
            $table->timestamps();
        });

        Schema::table('reservations', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->integer('box_id')->unsigned();
            $table->integer('reservation_type_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
            $table->foreign('reservation_type_id')->references('id')->on('reservation_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations');
    }
}
