<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Size extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	 Schema::connection('mysql2')->create('sizelaravel', function ($table){
                $table->increments('kegsizId');
                $table->string('kegsizType', 50);
                $table->string('kegsizWeight', 4);
                $table->integer('kegNumServ');
                $table->string('kegsizName', 50);
                $table->integer('kegsizCapacity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->drop('sizelaravel');
    }
}
