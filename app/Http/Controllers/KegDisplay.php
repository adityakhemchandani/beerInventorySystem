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

    public function map()
    {
        return view('googletestmap');
    }



    public function address()
    {
         $kegaddress = DB::connection('mysql2')->table('keglaravel')
        //->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
        //->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
        ->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
        //->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
        ->select('locationlaravel.locAddr', 'locationlaravel.locCity', 'locationlaravel.locState')
        ->get();

    return $kegaddress;
    }

    public function bartender()
    {
      $data = DB::connection('mysql2')->table('keglaravel')
        ->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
        ->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
        ->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
        ->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
        ->select('keglaravel.kegId', 'sizelaravel.kegsizName', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
        ->orderBy('keglaravel.kegId')
        ->get();

      return view('bartender', compact('data'));
    }

    public function bartenderedit()
    {
      $locdata = DB::connection('mysql2')->table('locationlaravel')->get();
      $lifedata = DB::connection('mysql2')->table('lifecyclelaravel')->get();

      $data = DB::connection('mysql2')->table('keglaravel')
        ->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
        ->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
        ->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
        ->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
        ->select('keglaravel.kegId', 'sizelaravel.kegsizId', 'lifecyclelaravel.lifeId', 'locationlaravel.locId', 'beerlaravel.beerId', 'sizelaravel.kegsizType', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
        ->orderBy('sizelaravel.kegsizType')
        ->where('keglaravel.kegId', '=', $id)
        ->get();

        return view('bartenderedit', compact('data', 'locdata', 'lifedata'));

    }

    public function index()
    {

	$data = DB::connection('mysql2')->table('keglaravel')
		->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
		->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
		->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
		->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
		->select('keglaravel.kegId', 'sizelaravel.kegsizName', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
		->orderBy('keglaravel.kegId')
		->get();
	/*$data = DB::connection('mysql2')->table('beerlaravel')
                ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
                //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
                //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
                ->select('beerlaravel.beerName', 'categorylaravel.catName')
                ->get();*/
	return view('index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $locdata = DB::connection('mysql2')->table('locationlaravel')->get();
      $lifedata = DB::connection('mysql2')->table('lifecyclelaravel')->get();
      $kegsizdata = DB::connection('mysql2')->table('sizelaravel')->get();
      $beerdata = DB::connection('mysql2')->table('beerlaravel')
               ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
               //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
               //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
               ->select('beerlaravel.beerId', 'beerlaravel.beerName', 'categorylaravel.catName')
               ->get();

      $data = DB::connection('mysql2')->table('keglaravel')
    		->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
    		->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
    		->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
    		->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
    		->select('keglaravel.kegId', 'sizelaravel.kegsizType', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
    		->orderBy('sizelaravel.kegsizType')
    		->get();
        return view('kegcreate', compact('data','locdata','lifedata','kegsizdata','beerdata'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $kegsizId = $request->input('kegsizId');
      $lifeId = $request->input('lifeId');
      $locId = $request->input('locId');
      $beerId = $request->input('beerId');

      DB::connection('mysql2')->table('keglaravel')->insert(
      ['kegsizId' => $kegsizId, 'lifeId' => $lifeId, 'locId' => $locId, 'beerId' => $beerId]);

      return redirect()->route('keg.index');
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
      $locdata = DB::connection('mysql2')->table('locationlaravel')->get();
      $lifedata = DB::connection('mysql2')->table('lifecyclelaravel')->get();
      $kegsizdata = DB::connection('mysql2')->table('sizelaravel')->get();
      $beerdata = DB::connection('mysql2')->table('beerlaravel')
               ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
               //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
               //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
               ->select('beerlaravel.beerId', 'beerlaravel.beerName', 'categorylaravel.catName')
               ->get();

      $data = DB::connection('mysql2')->table('keglaravel')
        ->join('sizelaravel', 'keglaravel.kegsizId', '=', 'sizelaravel.kegsizId')
        ->join('beerlaravel', 'keglaravel.beerId', '=', 'beerlaravel.beerId')
        ->join('locationlaravel', 'keglaravel.locId', '=', 'locationlaravel.locId')
        ->join('lifecyclelaravel', 'keglaravel.lifeId', '=', 'lifecyclelaravel.lifeId')
        ->select('keglaravel.kegId', 'sizelaravel.kegsizId', 'lifecyclelaravel.lifeId', 'locationlaravel.locId', 'beerlaravel.beerId', 'sizelaravel.kegsizType', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
        ->orderBy('sizelaravel.kegsizType')
        ->where('keglaravel.kegId', '=', $id)
        ->get();

        return view('kegedit', compact('data', 'beerdata', 'kegsizdata', 'locdata', 'lifedata'));
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
      $kegsizId = $request->input('kegsizId');
      $lifeId = $request->input('lifeId');
      $locId = $request->input('locId');
      $beerId = $request->input('beerId');

      DB::connection('mysql2')->table('keglaravel')->where('kegId', $id)->update(
     ['kegsizId' => $kegsizId, 'lifeId' => $lifeId, 'locId' => $locId, 'beerId' => $beerId]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     DB::connection('mysql2')->table('keglaravel')->where('kegId', $id)->delete();
     return 'Row Deleted';
    }
}
