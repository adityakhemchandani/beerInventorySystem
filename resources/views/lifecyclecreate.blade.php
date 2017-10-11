<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('lifecycleform')
<form action="{{route ('lifecycle.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="lifeName" type="text" placeholder="Lifecycle Name" name="lifeName" /><br><br>
    <input id="lifeDescr" type="text" placeholder="Lifecycle Description " name="lifeDescr"/><br><br>
    <input type="submit" value="Submit">
</form>
@stop
