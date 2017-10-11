<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class KegSizDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::connection('mysql2')->table('sizelaravel')->get();
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
        $kegsizType = $request->input('date');
        $kegsizWeight = $request->input('category');
        $kegsizNumServ = $request->input('distilleryname');
        $kegsizName = $request->input('location');
        $kegSizCapacity = $request->input('rating');
    
        DB::connection('mysql2')->table('sizelaravel')->insert(
        ['kegsizType' => $kegsizType, 'kegsizWeight' => $kegsizWeight, 'kegsizNumServ' => $kegsizNumServ, 'kegsizName' => $kegsizName, 'kegSizCapacity' => $kegSizCapacity]);
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
        $kegsizType = $request->input('date');
        $kegsizWeight = $request->input('category');
        $kegsizNumServ = $request->input('distilleryname');
        $kegsizName = $request->input('location');
        $kegSizCapacity = $request->input('rating');
    
        DB::connection('mysql2')->table('sizelaravel')->where('id', $id)->update(
        ['kegsizType' => $kegsizType, 'kegsizWeight' => $kegsizWeight, 'kegsizNumServ' => $kegsizNumServ, 'kegsizName' => $kegsizName, 'kegSizCapacity' => $kegSizCapacity]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('sizelaravel')->where('id', $id)->delete();
    }
}
