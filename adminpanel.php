<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if ( isset($_SESSION['user'])) {
	header("Location: home.php");
	exit;
}

include("components/head.php");
include("components/navbar.php");

?>
<div class="container text-center mt-3">
	<a href="create.php?category=restaurant"><button type="button" class="btn btn-dark">New Restaurant</button></a>
	<a href="create.php?category=thing"><button type="button" class="btn btn-dark">New Thing to Do</button></a>
	<a href="create.php?category=concert"><button type="button" class="btn btn-dark">New Concert</button></a>
</div>

<div class="container mt-3">
<div class="card-columns" id="searchcontent">
<?php include("searchbar.php"); ?>
</div>
</div>

<div class="container mt-3">
<div class="card-columns" id="allcards">

<?php
	require_once("components/cards.php");
	$sql = "SELECT * FROM concerts INNER JOIN location ON concerts.locationID = location.ID";
	displayConcerts($sql);
	$sql = "SELECT * FROM restaurants INNER JOIN location ON restaurants.locationID = location.ID";
	displayRestaurants($sql);
	$sql = "SELECT * FROM things INNER JOIN location ON things.locationID = location.ID";
	displayThings($sql);
?>

</div>
</div>


<?php

include("components/footer.php");
?>

