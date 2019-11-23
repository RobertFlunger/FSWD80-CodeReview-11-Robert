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

<?php 
	include("components/head.php");
	include("components/navbar.php");

 ?>


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