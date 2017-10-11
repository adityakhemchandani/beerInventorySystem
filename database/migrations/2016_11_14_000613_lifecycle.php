<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lifecycle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::connection('mysql2')->create('lifecyclelaravel', function ($table){
                $table->increments('lifeId');
                $table->string('lifeName', 50);
		$table->string('lifeDescr', 150);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('lifecyclelaravel');
    }
}
