<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout')

@section('lifecycledata')
<div id="overflow">
<table>
		<!-- <th>Lifecycle Id</th> -->
    	<th>Lifecycle</th>
    	<th>Desciption</th>
		<th>Delete</th>
		<th>Update</th>


	@foreach($data as $lifecyclelaraveldata)
		<tr>
      <!-- <td>{{ $lifecyclelaraveldata -> lifeId }}</td> -->
      <td>{{ $lifecyclelaraveldata -> lifeName }}</td>
      <td>{{ $lifecyclelaraveldata -> lifeDescr }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteLifecycle({{ $lifecyclelaraveldata->lifeId }})">Delete</a></span></td>
			<td><a href="{{ route('lifecycle.edit', $lifecyclelaraveldata->lifeId) }}">Update</a></td>
			@endforeach
</tr>
</table>
</div>
@stop

<script type="text/javascript">
function deleteLifecycle(lifeId)
{
	$.ajax({url:'lifecycle/'+lifeId, type: 'DELETE', success: function(data){
	$.get('lifecycle', function(data){
		alert('Entry with Lifecycle Id'+' '+lifeId+' '+'has been deleted!');
		location.reload();
	})
}
});
}
</script>
