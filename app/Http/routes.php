<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('myRoute', function(){
return "Hi";
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
Route::resource('fermenter', 'FermenterDisplay');
Route::resource('category', 'CategoryDisplay');
Route::get('Address', 'KegDisplay@address');
Route::get('Map', 'KegDisplay@map');
Route::resource('bartender', 'BartenderDisplay');
