<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Log extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      	 Schema::connection('mysql2')->create('loglaravel', function ($table){
                $table->increments('brewlogId');
                $table->date('brewlogDate')->nullable();
		$table->integer('brewlogDensity')->nullable();
                $table->string('brewlogTastNote', 150)->nullable();
           	$table->integer('brewlogMashMat')->nullable();
		$table->integer('brewlogOG')->nullable();
		$table->integer('brewlogFG')->nullable();




        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::connection('mysql2')->drop('loglaravel');
    }
}
