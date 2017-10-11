<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('beerform')
<form action="{{route ('beer.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="beerName" type="text" placeholder="Beer Name" name="beerName" /><br><br>
    <input id="beerAbv" type="number" step="0.01" placeholder="Beer Alcohol by Unit" name="beerAbv"/><br><br>
    <input id="beerIbu" type="number" step="0.01" placeholder="Beer International Bitterness Units" name="beerIbu"/><br><br>
    <input id="beerTastNote" type="text" placeholder="Notes..." name="beerTastNote"/><br><br>

    <select value="catId" name="catId">
    <option value="" disabled selected>Category</option>
    @foreach($catdata as $catlaraveldata)
    <option value="{{ $catlaraveldata->catId }}">{{ $catlaraveldata->catName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="ingredId" name="ingredId">
    <option value="" disabled selected>Ingredient</option>
    @foreach($ingreddata as $ingredlaraveldata)
    <option value="{{ $ingredlaraveldata->ingredId }}">{{ $ingredlaraveldata->ingredName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" value="Submit">
@stop
