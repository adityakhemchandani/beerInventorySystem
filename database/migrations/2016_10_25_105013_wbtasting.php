<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class Wbtasting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      	Schema::create('wbtastinglaravel', function (Blueprint $table){

		$table->increments('id');
		$table->string('date', 10);
		$table->string('category', 15);
		$table->string('distilleryname', 50);
		$table->string('location', 25);
		$table->integer('rating');
		$table->string('notes', 75);
		//$table->string('addwishlist', 3)->change()->nullable();
	
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::drop('wbtastinglaravel'); 	
    }
}
