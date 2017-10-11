<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	 Schema::connection('mysql2')->create('keglaravel', function ($table){
                $table->increments('kegId');
                $table->integer('kegsizId')->unsigned();
                //$table->foreign('kegsizId')->references('kesizId')->on('sizelaravel');
                $table->integer('lifeId')->unsigned();
                //$table->foreign('lifeId')->references('lifeId')->on('lifecyclelaravel');
		$table->integer('locId')->unsigned();
                //$table->foreign('locId')->references('locId')->on('locationlaravel');
		$table->integer('beerId')->unsigned();
                //$table->foreign('beerId')->references('beerId')->on('beerlaravel');

        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('keglaravel');
    }
}
