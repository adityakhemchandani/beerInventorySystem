<link href="{{ URL::asset('/css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('fermenterform')

<?php $dataforedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#fermForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/fermenter/'+id, data:$("#fermForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/fermenter';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>
<form id="fermForm" name="fermForm" action="" method="POST" enctype="multipart/form-data">
    <input id="fermName" type="text" placeholder="Fermenter Name" name="fermName" value="{{ $dataforedit[0]->fermName }}" /><br><br>
    <input id="fermStartVol" type="number" placeholder="Fermenter Start Volume" name="fermStartVol" value="{{ $dataforedit[0]->fermStartVol }}" /><br><br>
    <input id="fermKegVol" type="number" placeholder="Fermenter Keg Volume" name="fermKegVol" value="{{ $dataforedit[0]->fermKegVol }}" /><br><br>
    Brew Start Date:<input id="fermBrewStart" type="date" placeholder="Fermenter Brew Start" name="fermBrewStart" value="{{ $dataforedit[0]->fermBrewStart }}" /><br><br>

<select value="fermDead" name="fermDead">
    <option value="" disabled selected <?php if($dataforedit[0]->fermDead=='') echo 'selected="selected"'; ?>>Fermenter Dead</option>
    <option value="Yes" <?php if($dataforedit[0]->fermDead=='Yes') echo 'selected="selected"'; ?>Yes</option>
    <option value="No" <?php if($dataforedit[0]->fermDead=='No') echo 'selected="selected"'; ?>>No</option>
    </select>
    <br><br>

    Fermenter Dead Date:<input id="fermDeadDate" type="date" placeholder="Fermenter Dead Date" name="fermDeadDate" value="{{ $dataforedit[0]->fermDeadDate }}" /><br><br>

    <select value="beerId" name="beerId">
    <option value="" disabled selected <?php if($dataforedit[0]->beerId=='') echo 'selected="selected"'; ?> >Beer</option>
    @foreach($beerdata as $beerlaraveldata)
    <option value="{{ $beerlaraveldata->beerId }}" <?php if($dataforedit[0]->beerId==$beerlaraveldata->beerId) echo 'selected="selected"'; ?>>{{ $beerlaraveldata->beerName }}</option>
    @endforeach
    </select>
    <br><br>
    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforedit[0]->fermId }}" name="id" id="id">

</form>

@stop
