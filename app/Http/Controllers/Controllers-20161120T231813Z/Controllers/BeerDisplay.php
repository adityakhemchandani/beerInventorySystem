<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Session;






class BeerDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = DB::connection('mysql2')->table('beerlaravel')
                ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
                //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                ->select('beerlaravel.beerName', 'categorylaravel.catName')
                ->get();
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

        $beerName = $request->input('date');
        $beerAbv = $request->input('category');
        $beerIbu = $request->input('distilleryname');
        $catId = $request->input('location');
        $beerTastNote = $request->input('rating');
        $ingredId = $request->input('notes');
	$brewlogId = $requet->input('');

        DB::connection('mysql2')->table('beerlaravel')->insert(
        ['beerName' => $beerName, 'beerAbv' => $beerAbv, 'beerIbu' => $beerIbu, 'catId' => $catId, 'beerTasNote' => $beerTastNote, 'ingredId' => $ingredId, 'brewlogId' => $brewlogId]);

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
        $beerName = $request->input('date');
        $beerAbv = $request->input('category');
        $beerIbu = $request->input('distilleryname');
        $catId = $request->input('location');
        $beerTastNote = $request->input('rating');
        $ingredId = $request->input('notes');
        $brewlogId = $requet->input('');

        DB::connection('mysql2')->table('beerlaravel')->where('id', $id)->update(
        ['beerName' => $beerName, 'beerAbv' => $beerAbv, 'beerIbu' => $beerIbu, 'catId' => $catId, 'beerTasNote' => $beerTastNote, 'ingredId' => $ingredId, 'brewlogId' => $brewlogId]);

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('beerlaravel')->where('id', $id)->delete();
    }
}
