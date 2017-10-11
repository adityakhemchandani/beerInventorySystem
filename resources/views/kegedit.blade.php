<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('kegform')

<?php $dataforkegedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#kegForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/keg/'+id, data:$("#kegForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/keg';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>


<form id="kegForm" name="kegForm" action="" method="POST" enctype="multipart/form-data">

  <select value="kegsizId" name="kegsizId">
  <option value="" disabled selected <?php if($dataforkegedit[0]->kegsizId=='') echo 'selected="selected"'; ?> >Keg Size</option>
  @foreach($kegsizdata as $kegsizlaraveldata)
  <option value="{{ $kegsizlaraveldata->kegsizId }}" <?php if($dataforkegedit[0]->kegsizId==$kegsizlaraveldata->kegsizId) echo 'selected="selected"'; ?> > {{ $kegsizlaraveldata->kegsizName }}</option>
  @endforeach
  </select>
  <br><br>

    <select value="lifecycleId" name="lifeId">
    <option value="" disabled selected <?php if($dataforkegedit[0]->lifeId=='') echo 'selected="selected"'; ?>>Lifecycle</option>
    @foreach($lifedata as $lifelaraveldata)
    <option value="{{ $lifelaraveldata->lifeId }}" <?php if($dataforkegedit[0]->lifeId==$lifelaraveldata->lifeId) echo 'selected="selected"'; ?> > {{ $lifelaraveldata->lifeName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="locationId" name="locId">
    <option value="" disabled selected <?php if($dataforkegedit[0]->locId=='') echo 'selected="selected"'; ?>>Location</option>
    @foreach($locdata as $loclaraveldata)
    <option value="{{ $loclaraveldata->locId }}" <?php if($dataforkegedit[0]->locId==$loclaraveldata->locId) echo 'selected="selected"'; ?> > {{ $loclaraveldata->locName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="beerId" name="beerId">
    <option value="" disabled selected <?php if($dataforkegedit[0]->beerId=='') echo 'selected="selected"'; ?>>Beer</option>
    @foreach($beerdata as $beerlaraveldata)
    <option value="{{ $beerlaraveldata->beerId }}" <?php if($dataforkegedit[0]->beerId==$beerlaraveldata->beerId) echo 'selected="selected"'; ?> > {{ $beerlaraveldata->beerName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforkegedit[0]->kegId }}" name="id" id="id">
    
</form>
@stop
