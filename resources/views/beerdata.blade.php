<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@extends('layout')

@section('beerdata')
<div id="overflow">
<table>
		<!-- <th>Beer Id</th> -->
		<th>Beer</th>
    	<th>Category</th>
		<th>Delete</th>
		<th>Update</th>
		<th>Social</th>

	@foreach($data as $beerlaraveldata)
		<tr>
			<!-- <td>{{ $beerlaraveldata -> beerId }}</td> -->
			<td>{{ $beerlaraveldata -> beerName }}</td>
			<td>{{ $beerlaraveldata -> catName }}</td>
			<td><span style="cursor:pointer;"><a onClick="deleteBeer({{ $beerlaraveldata->beerId }})">Delete</a></span></td>
			<td><a href="{{ route('beer.edit', $beerlaraveldata->beerId) }}">Update</a></td>
			<td><div class="fb-share-button" data-href="http://ec2-52-89-97-116.us-west-2.compute.amazonaws.com/laravel/beer" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Fbeer&amp;src=sdkpreparse">Share</a></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-show-count="false">Tweet</a>
			<div class="g-plus" data-action="share" data-annotation="none" data-href="http://ec2-52-89-97-116.us-west-2.compute.amazonaws.com/laravel/beer"></div></td>

	@endforeach
</tr>
</table>
</div>
@stop

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<script src="https://apis.google.com/js/platform.js" async defer></script>


<script type="text/javascript">
function deleteBeer(beerId)
{
	$.ajax({url:'beer/'+beerId, type: 'DELETE', success: function(data){
	$.get('beer', function(data){
		alert('Entry with Beer Id'+' '+beerId+' '+'has been deleted!');
		location.reload();
	})
}
});
}
</script>
