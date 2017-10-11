<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('kegsizeform')
<form action="{{route ('kegsize.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="kegsizType" type="text" placeholder="Keg Size Type" name="kegsizType" /><br><br>
    <input id="kegsizWeight" type="number" placeholder="Keg Size Weight" name="kegsizWeight"/><br><br>
    <input id="kegsizNumServ" type="number" placeholder="Keg Size Service Number" name="kegsizNumServ"/><br><br>
    <input id="kegsizName" type="text" placeholder="Keg Size Name" name="kegsizName"/><br><br>
    <input id="kegsizCapacity" type="number" placeholder="Keg Size Capacity" name="kegsizCapacity"/><br><br>
    <input type="submit" value="Submit">
@stop
