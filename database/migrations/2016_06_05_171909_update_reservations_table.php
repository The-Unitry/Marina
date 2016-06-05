<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function ($table) {
            $table->integer('amount_of_persons');
        });
        
        Schema::table('reservations', function ($table) {
            $table->integer('boat_id')->unsigned();
            $table->foreign('boat_id')->references('id')->on('boats')->onDelete('cascade');
        });

        Schema::table('reservations', function ($table) {
            $table->timestamp('start');
            $table->timestamp('end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
