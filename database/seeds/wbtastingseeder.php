<?php

use Illuminate\Database\Seeder;

class wbtastingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wbtastinglaravel')->insert([
	'date' => str_random(10),
	'distilleryname' => str_random(10),
	'notes' =>  str_random(10),
	]);

    }
}
