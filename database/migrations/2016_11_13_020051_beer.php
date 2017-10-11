<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Beer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::connection('mysql2')->create('beerlaravel', function ($table){
		$table->increments('beerId');
		$table->string('beerName', 150);
		$table->float('beerAbv', 5, 2)->nullable();
		$table->float('beerIbu', 5, 2)->nullable();
		$table->integer('catId')->unsigned();
		$table->foreign('catId')->references('catId')->on('categorylaravel');
		$table->string('beerTastNote', 150);
		$table->integer('ingredId')->nullable()->unsigned();
		$table->foreign('ingredId')->references('ingredId')->on('ingredientslaravel');
		$table->integer('brewlogId')->nullable()->unsigned();
		$table->foreign('brewlogId')->references('brewlogId')->on('loglaravel');

	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('beerlaravel');
    }
}
