<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Http\Controllers\Session;

class BartenderDisplay extends Controller
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
        ->select('keglaravel.kegId', 'sizelaravel.kegsizName', 'beerlaravel.beerName', 'locationlaravel.locName', 'lifecyclelaravel.lifeName')
        ->orderBy('keglaravel.kegId')
        ->get();

      return view('bartender', compact('data'));
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

        return view('bartenderedit', compact('data','locdata', 'lifedata'));
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
      $lifeId = $request->input('lifeId');
      $locId = $request->input('locId');

      DB::connection('mysql2')->table('keglaravel')->where('kegId', $id)->update(
     ['lifeId' => $lifeId, 'locId' => $locId]);

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
