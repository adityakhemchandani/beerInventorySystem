<link href="{{ URL::asset('/css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('lifecycleform')

<?php $dataforlifeedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#lifeForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/lifecycle/'+id, data:$("#lifeForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/lifecycle';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>
<form id="lifeForm" name="lifeForm" method="POST" enctype="multipart/form-data">
  <input id="lifeName" type="text" placeholder="Lifecycle Name" name="lifeName" value="{{ $dataforlifeedit[0]->lifeName }}" /><br><br>
  <input id="lifeDescr" type="text" placeholder="Lifecycle Description " name="lifeDescr" value="{{ $dataforlifeedit[0]->lifeDescr }}" /><br><br>

  <input type="submit" name="submit" value="Submit" />
  <input type="hidden" value="{{ $dataforlifeedit[0]->lifeId }}" name="id" id="id">

</form>

@stop
