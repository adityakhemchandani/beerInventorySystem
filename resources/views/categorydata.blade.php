<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('categorydata')
<div id="overflow">
<table>
		<!-- <th>Category ID</th> -->
		<th>Category</th>
    	<th>Description</th>
		<th>Delete</th>
		<th>Update</th>


	@foreach($data as $categorylaraveldata)
		<tr>
			<!-- <td>{{ $categorylaraveldata -> catId }}</td> -->
			<td>{{ $categorylaraveldata -> catName }}</td>
			<td style="width:20%; text-align:left">{{ $categorylaraveldata -> catDesc }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteCategory({{ $categorylaraveldata->catId }})">Delete</a></span></td>
			<td><a href="{{ route('category.edit', $categorylaraveldata->catId) }}">Update</a></td>
	@endforeach
</tr>
</table>
</div>
@stop

<script type="text/javascript">
function deleteCategory(catId)
{
	$.ajax({url:'category/'+catId, type: 'DELETE', success: function(data){
	$.get('category', function(data){
		alert('Entry with Category Id'+' '+catId+' '+'has been deleted!');
		location.reload();
	})
}
});
}
</script>
