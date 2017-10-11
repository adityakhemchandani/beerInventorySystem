<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('kegform')
<form action="{{route ('keg.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">

  <select value="kegsizId" name="kegsizId">
  <option value="" disabled selected>Keg Size</option>
  @foreach($kegsizdata as $kegsizlaraveldata)
  <option value="{{ $kegsizlaraveldata->kegsizId }}"> {{ $kegsizlaraveldata->kegsizName }}</option>
  @endforeach
  </select>
  <br><br>

    <select value="lifecycleId" name="lifeId">
    <option value="" disabled selected>Lifecycle</option>
    @foreach($lifedata as $lifelaraveldata)
    <option value="{{ $lifelaraveldata->lifeId }}">{{ $lifelaraveldata->lifeName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="locationId" name="locId">
    <option value="" disabled selected>Location</option>
    @foreach($locdata as $loclaraveldata)
    <option value="{{ $loclaraveldata->locId }}">{{ $loclaraveldata->locName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="beerId" name="beerId">
    <option value="" disabled selected>Beer</option>
    @foreach($beerdata as $beerlaraveldata)
    <option value="{{ $beerlaraveldata->beerId }}">{{ $beerlaraveldata->beerName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" value="Submit">
@stop
