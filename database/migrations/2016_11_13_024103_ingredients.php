<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ingredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::connection('mysql2')->create('ingredientslaravel', function ($table){
                $table->increments('beerId');
                $table->string('ingredName', 50)->nullable();
		$table->string('ingredDescrip', 150)->nullable();
                $table->float('ingredQuant', 7, 2)->nullable();
                $table->string('ingredMeasur', 20)->nullable();
                $table->string('ingredSource', 50)->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::connection('mysql2')->drop('ingredientslaravel');
    }
}
