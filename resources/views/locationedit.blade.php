<link href="{{ URL::asset('/css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('locationform')

<?php $dataforlocedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#locForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/location/'+id, data:$("#locForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/location';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>
<form id="locForm" name="locForm" method="POST" enctype="multipart/form-data">
    <input id="locName" type="text" placeholder="Location Name" name="locName" value="{{ $dataforlocedit[0]->locName }}" /><br><br>
    <input id="locAddr" type="text" placeholder="Address" name="locAddr" value="{{ $dataforlocedit[0]->locAddr }}" /><br><br>
    <input id="locCity" type="text" placeholder="City" name="locCity" value="{{ $dataforlocedit[0]->locCity }}" ><br><br>
    <input id="locState" type="text" placeholder="State" name="locState" value="{{ $dataforlocedit[0]->locState }}" /><br><br>
    <input id="locZip" type="number" placeholder="Zip Code" name="locZip" value="{{ $dataforlocedit[0]->locZip }}" /><br><br>

    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforlocedit[0]->locId }}" name="id" id="id">

</form>

@stop
