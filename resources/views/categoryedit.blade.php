<link href="{{ URL::asset('/css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@extends('layout')

@section('categoryform')

<?php $dataforcatedit=$data; ?>
<script type="text/javascript">

          $(document).ready(function(){
            $("#catForm").on('submit', function(event){
              event.preventDefault();
              var id = $( "#id" ).val();
              console.log (id);
              $.ajax({url:'/laravel/index.php/category/'+id, data:$("#catForm").serialize(), type: 'PUT', success: function(data){
                var url = '/laravel/index.php/category';
                alert("Successful update");
                window.location = url;
              }
            });
          });
        });
</script>
<form id="catForm" name="catForm" method="POST" enctype="multipart/form-data">
  <input id="catName" type="text" placeholder="Lifecycle Name" name="catName" value="{{ $dataforcatedit[0]->catName }}" /><br><br>

  <input id="catDescr" type="text" placeholder="Category Description " name="catDesc" value="{{ $dataforcatedit[0]->catDesc }}" /><br><br>
  <input type="submit" name="submit" value="Submit" />
  <input type="hidden" value="{{ $dataforcatedit[0]->catId }}" name="id" id="id">

</form>

@stop
