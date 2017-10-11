<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::connection('mysql2')->create('fillslaravel', function ($table){
                $table->integer('kegId')->unsigned();
                $table->integer('fermId')->unsigned();


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('fillslaravel');
    }
}
