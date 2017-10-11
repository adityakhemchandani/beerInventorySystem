<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('categoryform')
<form action="{{route ('category.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="catName" type="text" placeholder="Category Name" name="catName" /><br><br>
    <input id="catDesc" type="text" placeholder="Category Description" name="catDesc"/><br><br>
    <input type="submit" value="Submit">
</form>
@stop
