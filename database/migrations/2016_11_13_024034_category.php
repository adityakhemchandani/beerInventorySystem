<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::connection('mysql2')->create('categorylaravel', function ($table){
                $table->increments('catId');
                $table->string('catName', 50)->nullable();
                $table->string('catDesc', 150)->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::connection('mysql2')->drop('categorylaravel');
    }
}
