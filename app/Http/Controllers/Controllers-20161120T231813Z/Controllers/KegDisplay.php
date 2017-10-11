<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Http\Controllers\Session;

class KegDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
	

	$data = DB::connection('mysql2')->table('keglaravel')
		->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
		->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
		->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
		->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
		->select('keglaravel.kegId', 'sizelaravel.kegsizType', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
		->orderBy('sizelaravel.kegsizType')
		->get();
	/*$data = DB::connection('mysql2')->table('beerlaravel')
                ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
                //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                ->select('beerlaravel.beerName', 'categorylaravel.catName')
                ->get();*/
	return $data;	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
