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

echo '<div class="container mt-3">
<div class="card-columns">';

include('components/cards.php');
displayConcerts();
displayThings();
displayRestaurants();

echo '</div>
</div>';

/*createTable(runQuery('*', 'concerts', 'INNER JOIN location ON concerts.locationID = location.ID'));*/

include("components/footer.php");
?>

