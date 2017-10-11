<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fermenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	 Schema::connection('mysql2')->create('fermenterlaravel', function ($table){
                $table->increments('fermId');
                $table->string('fermName', 50)->nullable();
                $table->integer('fermStartVol')->nullable();
		$table->integer('fermKegVol')->nullable();
		$table->integer('beerId')->unsigned();
                $table->date('fermBrewStart')->nullable;
		$table->integer('fermDead')->nullable();
		$table->date('fermDeadDate')->nullable;

	});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection('mysql2')->drop('fermenterlaravel');
    }
}
