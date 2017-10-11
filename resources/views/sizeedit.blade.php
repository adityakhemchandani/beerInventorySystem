<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('kegsizeform')
<?php $dataforkegsizeedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#kegsizeForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/kegsize/'+id, data:$("#kegsizeForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/kegsize';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>

<form name="kegsizeForm" id="kegsizeForm" method="POST" enctype="multipart/form-data">
    <input id="kegsizType" type="text" placeholder="Keg Size Type" name="kegsizType" value="{{ $dataforkegsizeedit[0]->kegsizType }}" /><br><br>
    <input id="kegsizWeight" type="number" placeholder="Keg Size Weight" name="kegsizWeight" value="{{ $dataforkegsizeedit[0]->kegsizWeight }}" /><br><br>
    <input id="kegsizNumServ" type="number" placeholder="Keg Size Service Number" name="kegsizNumServ" value="{{ $dataforkegsizeedit[0]->kegsizNumServ }}" /><br><br>
    <input id="kegsizName" type="text" placeholder="Keg Size Name" name="kegsizName" value="{{ $dataforkegsizeedit[0]->kegsizName }}" /><br><br>
    <input id="kegsizCapacity" type="number" placeholder="Keg Size Capacity" name="kegsizCapacity" value="{{ $dataforkegsizeedit[0]->kegsizCapacity }}" /><br><br>

    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforkegsizeedit[0]->kegsizId }}" name="id" id="id">
</form>

@stop
