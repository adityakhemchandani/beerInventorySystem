<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DataDisplay extends Controller
{
    public function readMyTable(id)
        {
                $id = id;
		$data = DB::table('wbtastinglaravel')->where('id',$id)->get();
                echo $data;



        }

}
