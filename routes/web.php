<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('my-second-route/{id}', function($id){
return $id;
});
Route::resource('tasting', 'TastingDisplay');
Route::get('MyTastings', 'TastingDisplay@homepage');
Route::get('MySession', 'TastingDisplay@session');
Route::get('my-first-route', function () {
    return 'Hello World';
});




Route::resource('keg', 'KegDisplay');
Route::resource('beer', 'BeerDisplay');
Route::resource('location', 'LocationDisplay');
Route::resource('lifecycle', 'LifecycleDisplay');
Route::resource('kegsize', 'KegSizDisplay');
//Route::post('fermenterupdate/{fermId}', 'FermenterDisplay@update');
Route::resource('fermenter', 'FermenterDisplay');
Route::resource('category', 'CategoryDisplay');
Route::get('Address', 'KegDisplay@address');
Route::get('Map', 'KegDisplay@map');
Route::resource('bartender', 'BartenderDisplay');
