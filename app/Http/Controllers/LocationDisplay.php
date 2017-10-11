<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::connection('mysql2')->table('locationlaravel')->get();
       return view('locationdata', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locationcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locName = $request->input('locName');
        $locAddr = $request->input('locAddr');
        $locCity = $request->input('locCity');
        $locState = $request->input('locState');
        $locZip = $request->input('locZip');
//        $locDelDate = $request->input('locDelDate');
  //      $locPickDate = $requet->input('locPickDate');

        DB::connection('mysql2')->table('locationlaravel')->insert(
        ['locName' => $locName, 'locAddr' => $locAddr, 'locCity' => $locCity, 'locState' => $locState, 'locZip' => $locZip]);

        return redirect()->route('location.index');

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
      $data = DB::connection('mysql2')->table('locationlaravel')
      ->select('locationlaravel.locId', 'locationlaravel.locName', 'locationlaravel.locAddr', 'locationlaravel.locCity', 'locationlaravel.locState', 'locationlaravel.locZip')
      ->where('locationlaravel.locId', '=', $id)
      ->get();
     return view('locationedit', compact('data'));

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
        $locName = $request->input('locName');
        $locAddr = $request->input('locAddr');
        $locCity = $request->input('locCity');
        $locState = $request->input('locState');
        $locZip = $request->input('locZip');

        DB::connection('mysql2')->table('locationlaravel')->where('locId', $id)->update(
        ['locName' => $locName, 'locAddr' => $locAddr, 'locCity' => $locCity, 'locState' => $locState, 'locZip' => $locZip]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::connection('mysql2')->table('locationlaravel')->where('locId', $id)->delete();
         return "Row Deleted";
    }
}
