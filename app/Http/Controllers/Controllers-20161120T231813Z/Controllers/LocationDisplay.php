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
        $locName = $request->input('date');
        $locAddr = $request->input('category');
        $locCity = $request->input('distilleryname');
        $locState = $request->input('location');
        $locZip = $request->input('rating');
        $locDelDate = $request->input('notes');
        $locPickDate = $requet->input('');

        DB::connection('mysql2')->table('locationlaravel')->insert(
        ['locName' => $locName, 'locAddr' => $locAddr, 'locCity' => $locCity, 'locState' => $locState, 'locZip' => $locZip, 'locDelDate' => $locDelDate, 'locPickDate' => $locPickDate]);

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
        $locName = $request->input('date');
        $locAddr = $request->input('category');
        $locCity = $request->input('distilleryname');
        $locState = $request->input('location');
        $locZip = $request->input('rating');
        $locDelDate = $request->input('notes');
        $locPickDate = $requet->input('');
    
        DB::connection('mysql2')->table('locationlaravel')->where('id', $id)->update(
        ['locName' => $locName, 'locAddr' => $locAddr, 'locCity' => $locCity, 'locState' => $locState, 'locZip' => $locZip, 'locDelDate' => $locDelDate, 'locPickDate' => $locPickDate]);    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::connection('mysql2')->table('locationlaravel')->where('id', $id)->delete();
    }
}
