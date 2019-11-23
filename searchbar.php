<?php 
require_once('dbconnect.php');
require_once('components/cards.php');

$val = isset($_POST['search']) ? $_POST['search'] : null;
if (!$val == "") {
	
	$sql1 = "SELECT * FROM concerts INNER JOIN location ON locationID = location.ID WHERE name LIKE '%$val%' OR location.address LIKE '%$val%'";
		
	$sql2 = "SELECT * FROM things INNER JOIN location ON locationID = location.ID WHERE name LIKE '%$val%' OR location.address LIKE '%$val%'";

	$sql3 = "SELECT * FROM restaurants INNER JOIN location ON locationID = location.ID WHERE name LIKE '%$val%' OR location.address LIKE '%$val%'";

	$queries = [$sql1, $sql2, $sql3];

	foreach ($queries as $query) {
		if (strpos($query, "concerts")) {
			displayConcerts($query);
		} 
		if (strpos($query, "things")){
			displayThings($query);
		}
		if (strpos($query, "restaurants")){
			displayRestaurants($query);
		}
}
}

?>

<script>
	$("#search").keyup(function(){
		$('#allcards').addClass("invisible"); 
		var inputVal = $(this).val();
		if (inputVal == "") {
			$('#allcards').removeClass("invisible");
		}
		var searchcontent = $("#searchcontent");
		  
		var $form = $(this);
		var serializedData = $form.serialize();

  	if (serializedData) {
	  	$.ajax({
	    	url: "searchbar.php",
	    	type: "post",
	    	data: serializedData,
	  	success: function(response) {
	    	document.getElementById("searchcontent").innerHTML =response;
	    	}
		})
	
} });
</script>