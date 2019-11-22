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
<div class="card-columns">

<?php
	include("components/cards.php");
	displayRestaurants();
?>

</div>
</div>

<?php
	include("components/footer.php");
?>