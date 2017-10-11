<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('bartenderform')

<?php $dataforbaredit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#barForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/bartender/'+id, data:$("#barForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/bartender';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>


<form id="barForm" name="barForm" action="" method="POST" enctype="multipart/form-data">

    <select value="lifecycleId" name="lifeId">
    <option value="" disabled selected <?php if($dataforbaredit[0]->lifeId=='') echo 'selected="selected"'; ?>>Lifecycle</option>
    @foreach($lifedata as $lifelaraveldata)
    <option value="{{ $lifelaraveldata->lifeId }}" <?php if($dataforbaredit[0]->lifeId==$lifelaraveldata->lifeId) echo 'selected="selected"'; ?> > {{ $lifelaraveldata->lifeName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="locationId" name="locId">
    <option value="" disabled selected <?php if($dataforbaredit[0]->locId=='') echo 'selected="selected"'; ?>>Location</option>
    @foreach($locdata as $loclaraveldata)
    <option value="{{ $loclaraveldata->locId }}" <?php if($dataforbaredit[0]->locId==$loclaraveldata->locId) echo 'selected="selected"'; ?> > {{ $loclaraveldata->locName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforbaredit[0]->kegId }}" name="id" id="id">
</form>
@stop
