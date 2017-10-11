<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class LifecycleDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::connection('mysql2')->table('lifecyclelaravel')->get();
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
        $lifeName = $request->input('date');
        $lifeDescr = $request->input('category');
        
        DB::connection('mysql2')->table('lifecyclelaravel')->insert(
        ['lifeName' => $lifeName, 'lifeDescr' => $lifeDescr]);

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
        $lifeName = $request->input('date');
        $lifeDescr = $request->input('category');
        
        DB::connection('mysql2')->table('lifecyclelaravel')->where('id', $id)->update(
        ['lifeName' => $lifeName, 'lifeDescr' => $lifeDescr]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('lifecyclelaravel')->where('id', $id)->delete();
    }
}
