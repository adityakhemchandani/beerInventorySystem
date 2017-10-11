<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('fermenterform')
<form action="{{ route('fermenter.store') }}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="fermName" type="text" placeholder="Fermenter Name" name="fermName" /><br><br>
    <input id="fermStartVol" type="number" placeholder="Fermenter Start Volume" name="fermStartVol"/><br><br>
    <input id="fermKegVol" type="number" placeholder="Fermenter Keg Volume" name="fermKegVol"/><br><br>
    Brew Start Date:<input id="fermBrewStart" type="date" placeholder="Fermenter Brew Start" name="fermBrewStart"/><br><br>

<select value="fermDead" name="fermDead">
    <option value="" disabled selected>Fermenter Dead</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    </select>
    <br><br>

    Fermenter Dead Date:<input id="fermDeadDate" type="date" placeholder="Fermenter Dead Date" name="fermDeadDate" /><br><br>

    <select value="beerId" name="beerId">
    <option value="" disabled selected>Beer</option>
    @foreach($beerdata as $beerlaraveldata)
    <option value="{{ $beerlaraveldata->beerId }}">{{ $beerlaraveldata->beerName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" value="Submit">
</form>
@stop
