<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('locationdata')
<div id="overflow">
<table>
	<!-- 	<th>Location Id</th> -->
    <th>Location</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Zip Code</th>
		<th>Delete</th>
		<th>Update</th>


	@foreach($data as $locationlaraveldata)
		<tr>
      <!-- <td>{{ $locationlaraveldata -> locId }}</td> -->
      <td>{{ $locationlaraveldata -> locName }}</td>
      <td>{{ $locationlaraveldata -> locAddr }}</td>
      <td>{{ $locationlaraveldata -> locCity }}</td>
      <td>{{ $locationlaraveldata -> locState }}</td>
      <td>{{ $locationlaraveldata -> locZip }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteLocation({{ $locationlaraveldata->locId }})">Delete</a></span></td>
			<td><a href="{{ route('location.edit', $locationlaraveldata->locId) }}">Update</a></td>
	@endforeach
</tr>
</table>
</div>
@stop

<script type="text/javascript">
function deleteLocation(locId)
{
	$.ajax({url:'location/'+locId, type: 'DELETE', success: function(data){
	$.get('location', function(data){
		alert('Entry with Location Id'+' '+locId+' '+'has been deleted!');
		location.reload();
	})
}
});
}
</script>
