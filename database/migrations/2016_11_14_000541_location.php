<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('locationlaravel', function ($table){
                $table->increments('locId');
                $table->string('locName', 100);
                $table->string('locAddr', 100);
                $table->string('locCity', 50);
                $table->string('locState', 50);
                $table->integer('locZip');
                $table->date('locDelDate');
                $table->date('locPickDate');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	 Schema::connection('mysql2')->drop('locationlaravel');
    }
}
