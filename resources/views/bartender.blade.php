<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@extends('bartenderlayout')

@section('bartender')
<div id="overflow">
<table>
		<th>Keg Id</th>
		<th>Keg Size</th>
		<th>Beer</th>
		<th>Location</th>
		<th>Lifecycle</th>
		<th>Update</th>

	@foreach($data as $keglaraveldata)
		<tr>
			<td>{{ $keglaraveldata -> kegId }}</td>
			<td>{{ $keglaraveldata -> kegsizName }}</td>
			<td>{{ $keglaraveldata -> beerName }}</td>
			<td>{{ $keglaraveldata -> locName }}</td>
			<td>{{ $keglaraveldata -> lifeName }}</td>
			<td><span style="cursor:pointer;"><a href="{{ route('bartender.edit', $keglaraveldata->kegId) }}">Update</span></a></td>
	@endforeach
</tr>
</table>
</div>
@stop


@section('googlemaps')
	<br>
    <div id="map"></div>

		<script>
      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 39.313844, lng: -77.630284}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
				$.get('Address',function(data){
	        $.each(data,function(i,dat){
	                  var address = dat.locAddr;
	                  console.log(address);
	                  var city = dat.locCity;
	                  var state = dat.locState;
	                  var apicall =  "https://maps.googleapis.com/maps/api/geocode/json?address="+address+","+city+","+state+"&key=AIzaSyC1a-EPY4k7SieFFijTJbRmwwPJqiaKZLY";
	                  var encapicall = encodeURI(apicall);
	                  //console.log (encapicall);
	        $.getJSON(encapicall, function(myJSONResult){
	                    //var locations = [];
	                    for (i = 0; i < myJSONResult.results.length; i++) {
	                      latlngtest = (myJSONResult.results[i].geometry.location.lat, myJSONResult.results[i].geometry.location.lng);
	                      //console.log(latlngtest);
	                      var latLng = new google.maps.LatLng(myJSONResult.results[i].geometry.location.lat, myJSONResult.results[i].geometry.location.lng);
	                      //console.log(latLng);
	                      var markers = new google.maps.Marker({
	                        position:   latLng,
	                        map: map
	                        //label: labels[i % labels.length]
	                    });
	                    var markerCluster = new MarkerClusterer(map, markers,
	                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

	                    }



	        });
	      });
	    });
		}
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1a-EPY4k7SieFFijTJbRmwwPJqiaKZLY&callback=initMap">
    </script>
@stop
