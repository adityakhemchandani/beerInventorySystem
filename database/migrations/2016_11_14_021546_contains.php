<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	  Schema::connection('mysql2')->create('containslaravel', function ($table){
                $table->integer('kegId')->unsigned();
                $table->integer('beerId')->unsigned();


        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('containslaravel');
    }
}
