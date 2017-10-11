<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('fermenterdata')
<div id="overflow">
<table>
		<th>Inventory</th>
    <th>Name</th>
    <th>Start<br>Volume<br>(gallons)</th>
    <th>Keg<br>Volume<br>(gallons)</th>
    <th>Brew<br>Start</th>
    <th>Dead</th>
    <th>Dead<br>Date</th>
    <th>Beer</th>
		<th>Delete</th>
		<th>Update</th>


	@foreach($data as $fermenterlaraveldata)
		<tr>
			<td><span style="cursor:pointer;"><a onClick="calculateFermenter({{ $fermenterlaraveldata->fermId }})">Calc</a></td>
			<td>{{ $fermenterlaraveldata -> fermName }}</td>
      <td>{{ $fermenterlaraveldata -> fermStartVol }}</td>
      <td>{{ $fermenterlaraveldata -> fermKegVol }}</td>
      <td>{{ $fermenterlaraveldata -> fermBrewStart }}</td>
      <td>{{ $fermenterlaraveldata -> fermDead }}</td>
      <td>{{ $fermenterlaraveldata -> fermDeadDate }}</td>
      <td>{{ $fermenterlaraveldata -> beerName }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteFermenter({{ $fermenterlaraveldata->fermId }})">Delete</a></span></td>
			<td><a href="{{ route('fermenter.edit', $fermenterlaraveldata->fermId) }}">Update</a></td>

	@endforeach
</tr>
</table>
</div>
@stop


<script type="text/javascript">
function deleteFermenter(fermId)
{
	$.ajax({url:'fermenter/'+fermId, type: 'DELETE', success: function(data){
	$.get('fermenter', function(data){
		alert('Entry with Fermenter Id'+' '+fermId+' '+'has been deleted!');
		location.reload();
	})
}
});
}

function calculateFermenter(fermId)
{
	$.ajax({url:'fermenter/'+fermId, type: 'GET', success: function(data){
	var val = data[1];
	var denom = Number(val);
	console.log (denom);
	var numer = data[0];
	console.log (numer);
	var capacity = Number(numer / denom);
	console.log (capacity);
	var x = capacity.toPrecision(3);
	var percent = x * 100;
	console.log (percent);
	if (capacity > 0){
	$.get('fermenter', function(data){
		alert('Current inventory can handle'+' '+percent+' '+'\% of the keg volume');
		location.reload();
	});
	}
	else{
		alert('Current inventory cannot support keg volume');
		location.reload();
	}

}
});
}
</script>
