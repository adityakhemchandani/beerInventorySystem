<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@extends('layout')

@section('kegsizedata')
<div id="overflow">
<table id="table">
		<!-- <th>Keg Size Id</th> -->
		<th>Keg Size</th>
    	<th>Keg Weight</th>
		<th>No. of Servings<br>(12oz)</th>
		<th>Keg Name</th>
		<th>Keg Capacity<br>(gallons)</th>
		<th>Delete</th>
		<th>Update</th>

	@foreach($data as $kegsizelaraveldata)
		<tr>
			<!-- <td>{{ $kegsizelaraveldata -> kegsizId }}</td> -->
			<td>{{ $kegsizelaraveldata -> kegsizType }}</td>
			<td>{{ $kegsizelaraveldata -> kegsizWeight }}</td>
			<td>{{ $kegsizelaraveldata -> kegsizNumServ }}</td>
			<td>{{ $kegsizelaraveldata -> kegsizName }}</td>
			<td>{{ $kegsizelaraveldata -> kegsizCapacity }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteKegSize({{ $kegsizelaraveldata->kegsizId }})">Delete</a></span></td>
			<td><a href="{{ route('kegsize.edit', $kegsizelaraveldata->kegsizId) }}">Update</a></td>

	@endforeach
</tr>
</table>
</div>
@stop

<script type="text/javascript">
function deleteKegSize(kegsizId)
{
	$.ajax({url:'kegsize/'+kegsizId, type: 'DELETE', success: function(data){
	$.get('kegsize', function(data){
		alert('Entry with Keg Size Id'+' '+kegsizId+' '+'has been deleted!');
		location.reload();
	})
}
});
}
</script>
