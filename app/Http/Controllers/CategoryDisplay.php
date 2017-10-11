<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryDisplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::connection('mysql2')->table('categorylaravel')->get();
       return view('categorydata', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catName = $request->input('catName');
        $catDesc = $request->input('catDesc');

        DB::connection('mysql2')->table('categorylaravel')->insert(
        ['catName' => $catName, 'catDesc' => $catDesc]);

        return redirect()->route('category.index');

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
      $data = DB::connection('mysql2')->table('categorylaravel')
      ->select('categorylaravel.catId', 'categorylaravel.catName', 'categorylaravel.catDesc')
      ->where('categorylaravel.catId', '=', $id)
      ->get();
    return view('categoryedit', compact('data'));

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
        $catName = $request->input('catName');
        $catDesc = $request->input('catDesc');

        DB::connection('mysql2')->table('categorylaravel')->where('catId', $id)->update(
        ['catName' => $catName, 'catDesc' => $catDesc]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('categorylaravel')->where('catId', $id)->delete();
        return "Row Deleted";
    }
}
