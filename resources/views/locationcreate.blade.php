<link href="{{ URL::asset('css/layout.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@extends('layout')


@section('locationform')
<form action="{{route ('location.store')}}" id="myForm" action="" method="POST" enctype="multipart/form-data">
    <input id="autocomplete" onFocus="initAutocomplete()" type="text" placeholder="Search for Location"/><br><br>
    <input id="locName" type="text" placeholder="Location Name" name="locName" /><br><br>
    <input type="text" placeholder="Address" name="locAddr" class="field" id="street_number"></input><br><br>
    <input type="text" placeholder="Address2" name="locAddr1" class="field" id="route"></input><br><br>
    <input type="text" placeholder="City" name="locCity" input class="field" id="locality"></input><br><br>
    <input type="text" placeholder="State" name="locState" class="field"
              id="administrative_area_level_1"></input><br><br>
    <input type="number" placeholder="Zip Code" name="locZip" input class="field" id="postal_code"></input><br><br>
    <input type="submit" value="Submit">
</form>
@stop
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'short_name',
        administrative_area_level_1: 'short_name',
        //country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['establishment']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        console.log (place);

       	/*var address = place.adr_address;
       	console.log (address);*/

       	var name = place.name;
       	console.log (name);
       	$( "#locName" ).val(name);


        for (var component in componentForm) {
          /*document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;*/
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          //console.log (addressType);
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            console.log (val);
            $( "#"+addressType ).val(val);
          }
        }
      }

     /*// Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }*/
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhftgDITXKHFIgOARNjoBLrkOtSWjEl9c&libraries=places&callback=initAutocomplete"
        async defer></script>