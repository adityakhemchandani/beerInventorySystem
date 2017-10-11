<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class FermenterDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::connection('mysql2')->table('fermenterlaravel')
                ->join('beerlaravel', 'fermenterlaravel.beerId', '=', 'beerlaravel.beerId')
                //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                ->select('fermenterlaravel.*', 'beerlaravel.beerName')
                ->get();
       return view('fermenterdata', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $fermdata = DB::connection('mysql2')->table('fermenterlaravel')
             ->join('beerlaravel', 'fermenterlaravel.beerId', '=', 'beerlaravel.beerId')
             //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
             //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
             ->select('fermenterlaravel.*', 'beerlaravel.beerName')
             ->get();

      $beerdata = DB::connection('mysql2')->table('beerlaravel')
               ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
               //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
               //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
               ->select('beerlaravel.beerId', 'beerlaravel.beerName', 'categorylaravel.catName')
               ->get();

        return view('fermentercreate', compact('data','beerdata','fermdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fermName = $request->input('fermName');
        $fermStartVol = $request->input('fermStartVol');
        $fermKegVol = $request->input('fermKegVol');
        $beerId = $request->input('beerId');
        $fermBrewStart = $request->input('fermBrewStart');
        $fermDead = $request->input('fermDead');
        $fermDeadDate = $request->input('fermDeadDate');
//        $brewlogId = $request->input('brewlogId');

        DB::connection('mysql2')->table('fermenterlaravel')->insert(
        ['fermName' => $fermName, 'fermStartVol' => $fermStartVol, 'fermKegVol' => $fermKegVol, 'beerId' => $beerId, 'fermBrewStart' => $fermBrewStart, 'fermDead' => $fermDead, 'fermDeadDate' => $fermDeadDate]);

        return redirect()->route('fermenter.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capacity = DB::connection('mysql2')->table('keglaravel')
        ->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
        ->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
        ->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
        ->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
        ->select('sizelaravel.kegSizCapacity')
        ->where('lifecyclelaravel.lifeId', '=', 1)
        ->sum('sizelaravel.kegSizCapacity');

        $volume = DB::connection('mysql2')->table('fermenterlaravel')->where('fermId', $id)
                //->join('beerlaravel', 'fermenterlaravel.beerId', '=', 'beerlaravel.beerId')
                //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                ->pluck('fermenterlaravel.fermKegVol');




        return [$capacity, $volume];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $beerdata = DB::connection('mysql2')->table('beerlaravel')
               ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
               //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
               //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
               ->select('beerlaravel.beerId', 'beerlaravel.beerName', 'categorylaravel.catName')
               ->get();
       $data = DB::connection('mysql2')->table('fermenterlaravel')
                      ->join('beerlaravel', 'fermenterlaravel.beerId', '=', 'beerlaravel.beerId')
                      //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                      //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                      ->select('fermenterlaravel.*', 'beerlaravel.beerName')
                      ->where('fermenterlaravel.fermId', '=', $id)
                      ->get();

          return view('fermenteredit', compact('beerdata','data'));
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

        $fermName = $request->input('fermName');
        $fermStartVol = $request->input('fermStartVol');
        $fermKegVol = $request->input('fermKegVol');
        $beerId = $request->input('beerId');
        $fermBrewStart = $request->input('fermBrewStart');
        $fermDead = $request->input('fermDead');
        $fermDeadDate = $request->input('fermDeadDate');
        $brewlogId = $request->input('brewlogId');

        DB::connection('mysql2')->table('fermenterlaravel')->where('fermId', $id)->update(
        ['fermName' => $fermName, 'fermStartVol' => $fermStartVol, 'fermKegVol' => $fermKegVol, 'beerId' => $beerId, 'fermBrewStart' => $fermBrewStart, 'fermDead' => $fermDead, 'fermDeadDate' => $fermDeadDate, 'brewlogId' => $brewlogId]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('fermenterlaravel')->where('fermId', $id)->delete();
        return "Row Deleted";
    }
}
