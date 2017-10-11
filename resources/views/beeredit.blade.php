<link href="{{ URL::asset('/css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('beerform')

<?php $dataforbeeredit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#beerForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/beer/'+id, data:$("#beerForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/beer';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>
<form id="beerForm" name="beerForm" action="" method="POST" enctype="multipart/form-data">
    <input id="beerName" type="text" placeholder="Beer Name" name="beerName" value="{{ $dataforbeeredit[0]->beerName }}" /><br><br>
    <input id="beerAbv" type="number" step="0.01" placeholder="Beer Alcohol by Unit" name="beerAbv" value="{{ $dataforbeeredit[0]->beerAbv }}" /><br><br>
    <input id="beerIbu" type="number" step="0.01" placeholder="Beer International Bitterness Units" name="beerIbu" value="{{ $dataforbeeredit[0]->beerIbu }}" /><br><br>
    <input id="beerTastNote" type="text" placeholder="Notes..." name="beerTastNote" value="{{ $dataforbeeredit[0]->beerTastNote }}" /><br><br>

    <select value="catId" name="catId">
    <option value="" disabled selected <?php if($dataforbeeredit[0]->catId=='') echo 'selected="selected"'; ?>>Category</option>
    @foreach($catdata as $catlaraveldata)
    <option value="{{ $catlaraveldata->catId }}" <?php if($dataforbeeredit[0]->catId== $catlaraveldata->catId) echo 'selected="selected"'; ?>>{{ $catlaraveldata->catName }}</option>
    @endforeach
    </select>
    <br><br>

    <select value="ingredId" name="ingredId">
    <option value="" disabled selected <?php if($dataforbeeredit[0]->ingredId=='') echo 'selected="selected"'; ?>>Ingredient</option>
    @foreach($ingreddata as $ingredlaraveldata)
    <option value="{{ $ingredlaraveldata->ingredId }}" <?php if($dataforbeeredit[0]->ingredId== $ingredlaraveldata->ingredId) echo 'selected="selected"'; ?>>{{ $ingredlaraveldata->ingredName }}</option>
    @endforeach
    </select>
    <br><br>

    <input type="submit" name="submit" value="Submit" />
    <input type="hidden" value="{{ $dataforbeeredit[0]->beerId }}" name="id" id="id">

</form>

@stop
