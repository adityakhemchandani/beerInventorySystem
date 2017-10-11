<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Session;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class TastingDisplay extends Controller
{
   
	 public function session(Request $request)
        {
                //$data = $request->session()->all();
		//return $data;
		$sid = session()->getId();
		return $sid;
        }


	public function homepage()
	{
		return view('tastingview');
	}		

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$data = DB::table('wbtastinglaravel')->get();
        return $data;
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//not currently used
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
	$date = $request->input('date');
	$category = $request->input('category');
	$distilleryname = $request->input('distilleryname');
	$location = $request->input('location');
	$rating = $request->input('rating');
	$notes = $request->input('notes');

	DB::table('wbtastinglaravel')->insert(
	['date' => $date, 'category' => $category, 'distilleryname' => $distilleryname, 'location' => $location, 'rating' => $rating, 'notes' => $notes]);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$data = DB::table('wbtastinglaravel')->where('id', $id)->get();
        return $data;
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //not currently used

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
	$date = $request->input('date');
        $category = $request->input('category');
        $distilleryname = $request->input('distilleryname');
        $location = $request->input('location');
        $rating = $request->input('rating');
        $notes = $request->input('notes');
       // $addwishlist = $request->input('addwishlist');

	$data = DB::table('wbtastinglaravel')->where('id', $id)->update(
	['date' => $date, 'category' => $category, 'distilleryname' => $distilleryname, 'location' => $location, 'rating' => $rating, 'notes' => $notes]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('wbtastinglaravel')->where('id', $id)->delete();
        
    }
}
