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
       return view('kegsizedata', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegsizecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kegsizType = $request->input('kegsizType');
        $kegsizWeight = $request->input('kegsizWeight');
        $kegsizNumServ = $request->input('kegsizNumServ');
        $kegsizName = $request->input('kegsizName');
        $kegsizCapacity = $request->input('kegsizCapacity');

        DB::connection('mysql2')->table('sizelaravel')->insert(
        ['kegsizType' => $kegsizType, 'kegsizWeight' => $kegsizWeight, 'kegsizNumServ' => $kegsizNumServ, 'kegsizName' => $kegsizName, 'kegsizCapacity' => $kegsizCapacity]);

        return redirect()->route('kegsize.index');
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
      $data = DB::connection('mysql2')->table('sizelaravel')
      ->select('sizelaravel.kegsizId', 'sizelaravel.kegsizType', 'sizelaravel.kegsizWeight', 'sizelaravel.kegsizNumServ', 'sizelaravel.kegsizName', 'sizelaravel.kegsizCapacity')
      ->where('sizelaravel.kegsizId', '=', $id)
      ->get();

      return view('sizeedit', compact('data'));

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
        $kegsizType = $request->input('kegsizType');
        $kegsizWeight = $request->input('kegsizWeight');
        $kegsizNumServ = $request->input('kegsizNumServ');
        $kegsizName = $request->input('kegsizName');
        $kegSizCapacity = $request->input('kegSizCapacity');

        DB::connection('mysql2')->table('sizelaravel')->where('kegsizId', $id)->update(
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
        DB::connection('mysql2')->table('sizelaravel')->where('kegsizid', $id)->delete();
        return 'Row Deleted';
    }
}
