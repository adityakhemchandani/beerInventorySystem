<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Google Maps</title>
   <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
   </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    
</head>
 <body>
  <header>
    <h1>My Bourbon Whiskey Tastings</h1>
    <nav>
      <ul id="menu">
    	  <li><a href="#">About Us</a></li>
        <li><a href="https://www.google.com/search?hl=en&q=bourbon&gws_rd=ssl">Search for Bourbon</a></li>
        <li><a href="View_My_Collection.php">My Collection</a></li>
      </ul> 
    </nav>
  </header>

  <div id="map"></div>  
  <script type="text/javascript">

          $(document).ready(function(){           
            $.get('Address',function(data){ 
            //console.log ("made it to get json");  
            //console.log (data); 
            generateLatLong(data);
            });


          function generateLatLong (data){
                 //clearContainer(target);  
                 $.each(data,function(i,dat){ 
                  var address = dat.locAddr;
                  //console.log(address);
                  var city = dat.locCity;
                  var state = dat.locState;
                  var apicall =  "https://maps.googleapis.com/maps/api/geocode/json?address="+address+","+city+","+state+"&key=AIzaSyC1a-EPY4k7SieFFijTJbRmwwPJqiaKZLY";
                  var encapicall = encodeURI(apicall);
                  console.log (encapicall);

                   $.get(encapicall, function(myJSONResult){
                    for (i = 0; i < myJSONResult.results.length; i++) {
                        var coords = myJSONResult.results[i].geometry.location;
                        console.log (coords);
                        //initMap();
              
                      }


                    });
                  });

          }
      
            
/*
            $.ajaxSetup({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            }); */

      
       

    
      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: {lat: 39.313844, lng: -77.630284}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [{lat: 39.313844, lng: -77.630284},
                      {lat: -43.999792, lng: 170.463352}
      ];
    
   
   }); 
 </script> 
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP3kwmbKVP1Daa7IMxiOzRTh82MdgzeNc&callback=initMap">
  </script>
     
  
  <footer>
    <p><a href="Project I_Matthew_Martin.html">Home</a> | <a href="#">Contact Us</a> </p>
    <p><em>Copyright &copy; 2016 My Bourbon Whiskey Collection</em></p>
  </footer>
</body>
</html>