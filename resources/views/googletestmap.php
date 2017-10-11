<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <title>Marker Clustering</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    
  </head>
  <body>
<script type="text/javascript">

</script>
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
                  //console.log(address);
                  var city = dat.locCity;
                  var state = dat.locState;
                  var apicall =  "https://maps.googleapis.com/maps/api/geocode/json?address="+address+","+city+","+state+"&key=AIzaSyC1a-EPY4k7SieFFijTJbRmwwPJqiaKZLY";
                  var encapicall = encodeURI(apicall);
                  //console.log (encapicall);
        $.getJSON(encapicall, function(myJSONResult){
                    //var locations = [];
                    for (i = 0; i < myJSONResult.results.length; i++) {
                    latlngtest = (myJSONResult.results[i].geometry.location.lat, myJSONResult.results[i].geometry.location.lng);
                    console.log(latlngtest);  
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
        /*var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });*/

        // Add a marker clusterer to manage the markers.
       

      }
     
     var locations = [];

      //console.log(locations);
      
 //$(document).ready(function(){ 
      //function getlocations(){
      
   // }
   // });
       
 // $(document).ready(function(){ 
    /*$.get('Address',function(data){ 
    $.each(data,function(i,dat){ 
                  var address = dat.locAddr;
                  //console.log(address);
                  var city = dat.locCity;
                  var state = dat.locState;
                  var apicall =  "https://maps.googleapis.com/maps/api/geocode/json?address="+address+","+city+","+state+"&key=AIzaSyC1a-EPY4k7SieFFijTJbRmwwPJqiaKZLY";
                  var encapicall = encodeURI(apicall);
                  //console.log (encapicall);
        $.get(encapicall, function(myJSONResult){
                    for (i = 0; i < myJSONResult.results.length; i++) {
                        var coords = myJSONResult.results[i].geometry.location;
                        console.log (coords);
                        
              
                    }
          });
      });    
    });*/
//});


    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP3kwmbKVP1Daa7IMxiOzRTh82MdgzeNc&callback=initMap">
    </script>
  </body>
</html>