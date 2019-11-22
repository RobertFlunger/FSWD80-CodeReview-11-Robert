<?php

function displayConcerts() {

$sql = "SELECT * FROM concerts INNER JOIN location ON concerts.locationID = location.ID";
global $conn;
$result = $conn->query($sql);

if ( $result -> num_rows > 0) {
	while ( $row = $result->fetch_assoc()) {

		echo 	'<div class="card"> 
					<h5 class="card-header bg-primary">' .$row['type']. '</h5>
					<img src="' .$row['img']. '"class="card-img-top img-fluid">
	    			<div class="card-body">
	    				<h5 class="card-title">' .$row['name']. '</h5>
	    				<p class="card-text">' .$row['address']. '</p>
						<p class="card-text font-weight-bold">' .$row['eventDate']. '<br>' . gmdate("H:i", strtotime($row['eventTime'])). '</p>
	      				<p class="card-text">' .$row['description']. '</p>
	    			</div>
	    			<div class="card-footer">
				      	<p class="card-text">
				      	Price: ' .$row['price']. '€ <br>
				      	For more informations call: ' .$row['telephone']. '</p>
				      	<a href="' .$row['url']. '"><button type="button" class="btn btn-info mb-3">Get Your Tickets online!</button></a><br>';
  			
  			if ( isset($_SESSION['admin']) ) {
  				echo "<a href='update.php?concertID=" .$row['ID']. "'><button type='button' class='btn btn-warning mb-3'>Edit</button></a>
					<a href='delete.php?concertID=" .$row['ID']. "'><button type='button' class='btn btn-danger mb-3'>Delete</button></a>
					</div>
  				</div>";
  			}	
		}
	}
};

function displayRestaurants() {

$sql = "SELECT * FROM restaurants INNER JOIN location ON restaurants.locationID = location.ID";
global $conn;
$result = $conn->query($sql);

if ( $result -> num_rows > 0) {
	while ( $row = $result->fetch_assoc()) {
	
		echo 	'<div class="card"> 
					<h5 class="card-header bg-success">' .$row['type']. ' Restaurant</h5>
					<img src="' .$row['img']. '"class="card-img-top">
	    			<div class="card-body">
	    				<h5 class="card-title">' .$row['name']. '</h5>
	    				<p class="card-text">' .$row['address']. '</p>
	      				<p class="card-text">' .$row['description']. '</p>
	    			</div>
	    			<div class="card-footer">
				      	<p class="card-text">
				      	For more information call: ' .$row['telephone']. '</p>
				      	<a href="' .$row['url']. '"><button type="button" class="btn btn-info mb-3">Book a table online!</button></a><br>';
  			
  			if ( isset($_SESSION['admin']) ) {
  				echo "<a href='update.php?restaurantID=" .$row['ID']. "'><button type='button' class='btn btn-warning mb-3'>Edit</button></a>
					<a href='delete.php?restaurantID=" .$row['ID']. "'><button type='button' class='btn btn-danger mb-3'>Delete</button></a>
					</div>
  				</div>";
  			}
		}
	}
};

function displayThings() {

$sql = "SELECT * FROM things INNER JOIN location ON things.locationID = location.ID";
global $conn;
$result = $conn->query($sql);

if ( $result -> num_rows > 0) {
	while ( $row = $result->fetch_assoc()) {

		echo 	'<div class="card"> 
					<h5 class="card-header bg-warning">' .$row['type']. '</h5>
					<img src="' .$row['img']. '"class="card-img-top">
	    			<div class="card-body">
	    				<h5 class="card-title">' .$row['name']. '</h5>
	    				<p class="card-text">' .$row['address']. '</p>
	      				<p class="card-text">' .$row['description']. '</p>
	    			</div>
	    			<div class="card-footer">
				      	<p class="card-text">
				      	<a href="' .$row['url']. '"><button type="button" class="btn btn-info mb-3">Get your tickets online!</button></a><br>';
	      	
	      	if ( isset($_SESSION['admin']) ) {
  				echo "<a href='update.php?thingsID=" .$row['ID']. "'><button type='button' class='btn btn-warning mb-3'>Edit</button></a>
					<a href='delete.php?thingsID=" .$row['ID']. "'><button type='button' class='btn btn-danger mb-3'>Delete</button></a>
					</div>
  				</div>";
  			}
		}
	}
};

?>

