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

<a href="create.php?category=restaurant"><button type="button" class="btn btn-dark">New Restaurant</button></a>
<a href="create.php?category=thing"><button type="button" class="btn btn-dark">New Thing to Do</button></a>
<a href="create.php?category=concert"><button type="button" class="btn btn-dark">New Concert</button></a>

<div class="container mt-3">
<div class="card-columns">

<?php

include('components/cards.php');
displayConcerts();
displayThings();
displayRestaurants();

echo '</div></div>';

include("components/footer.php");
?>

