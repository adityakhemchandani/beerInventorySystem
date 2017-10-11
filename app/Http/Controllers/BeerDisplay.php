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
                ->select('beerlaravel.beerId', 'beerlaravel.beerName', 'categorylaravel.catName')
                ->get();
       return view('beerdata', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $catdata = DB::connection('mysql2')->table('categorylaravel')->get();
      $ingreddata = DB::connection('mysql2')->table('ingredientslaravel')->get();
        return view('beercreate', compact('catdata','ingreddata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $beerName = $request->input('beerName');
        $beerAbv = $request->input('beerAbv');
        $beerIbu = $request->input('beerIbu');
        $catId = $request->input('catId');
        $beerTastNote = $request->input('beerTastNote');
        $ingredId = $request->input('ingredId');

        DB::connection('mysql2')->table('beerlaravel')->insert(
        ['beerName' => $beerName, 'beerAbv' => $beerAbv, 'beerIbu' => $beerIbu, 'catId' => $catId, 'beerTastNote' => $beerTastNote, 'ingredId' => $ingredId]);

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
      $catdata = DB::connection('mysql2')->table('categorylaravel')->get();
      $ingreddata = DB::connection('mysql2')->table('ingredientslaravel')->get();
      $data = DB::connection('mysql2')->table('beerlaravel')
               ->join('categorylaravel', 'beerlaravel.catId', '=', 'categorylaravel.catId')
               //->join('loglaravel', 'beerlaravel.brewlogId', '=', 'loglaravel.brewlogId')
               //->join('ingredientslaravel', 'beerlaravel.ingredId', '=', 'ingredientslaravel.ingredId')
               ->select('beerlaravel.beerId', 'beerlaravel.catId', 'beerlaravel.ingredId', 'beerlaravel.beerName', 'beerlaravel.beerAbv', 'beerlaravel.beerIbu', 'beerlaravel.beerTastNote','categorylaravel.catName')
               ->where('beerlaravel.beerId', '=', $id)
               ->get();

               return view('beeredit', compact('data', 'catdata', 'ingreddata'));
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
        $beerName = $request->input('beerName');
        $beerAbv = $request->input('beerAbv');
        $beerIbu = $request->input('beerIbu');
        $catId = $request->input('catId');
        $beerTastNote = $request->input('beerTastNote');
        $ingredId = $request->input('notes');
        $brewlogId = $request->input('');

      DB::connection('mysql2')->table('beerlaravel')->where('beerId', $id)->update(
      ['beerName' => $beerName, 'beerAbv' => $beerAbv, 'beerIbu' => $beerIbu, 'beerTastNote' => $beerTastNote, 'catId' => $catId, 'ingredId' => $ingredId]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::connection('mysql2')->table('beerlaravel')->where('beerId', $id)->delete();
        return "Row Deleted";
      }
}
