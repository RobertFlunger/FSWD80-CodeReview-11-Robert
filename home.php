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
<div class="card-columns">

<?php
	include("components/cards.php");
	displayConcerts();
	displayRestaurants();
	displayThings();
?>

</div>
</div>

<?php
  	include("components/footer.php");
?>