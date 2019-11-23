<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if ( !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
	header("Location: index.php");
	exit;
}

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
	$sql = "SELECT * FROM restaurants INNER JOIN location ON restaurants.locationID = location.ID";
	displayRestaurants($sql);
?>

</div>
</div>

<?php
	include("components/footer.php");
?>