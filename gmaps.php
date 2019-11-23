<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
	header("Location: index.php");
	exit;
}


/*if ( isset($_SESSION['admin'])) {
	header("Location: adminpanel.php");
	exit;
}*/

/*$query = "SELECT * FROM users WHERE id =" .$_SESSION['user'];
echo $query;
$res = mysqli_query($conn, $query);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
*/


?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>Travel-O-Matic</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="locationData.js"></script>
  </head>
<body onload="loadMap()">
	
<?php 
include 'components/navbar.php'; ?>

<div class="mt-3" id="map"></div>

<script>

 function loadMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: new google.maps.LatLng(48.2025205,16.3723018),
        mapTypeId: 'terrain'
    });


    const locationMarkers = getJSONMarkers();
console.log(locationMarkers.length);

    for (let i=0; i < locationMarkers.length; i++) {
    	let marker = new google.maps.Marker({
    		map: map,
    		position: new google.maps.LatLng(locationMarkers[i].position[0], locationMarkers[i].position[1]),
    		title: location.name,
    		label: locationMarkers[i].name
    	})
    }
}



      // Loop through the results array and place a marker for each
      // set of coordinates.
    /*window.eqfeed_callback = function(results) {
       	for (var i = 0; i < results.markers.length; i++) {
          	var coords = results.markers.position;
          	var latLng = new google.maps.LatLng(coords[1],coords[0]);
          	var marker = new google.maps.Marker({
            	position: latLng,
            	map: map
          	});
        }
    }*/


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M" async defer></script>
 
<?php
	include('components/footer.php');
?>