<?php 
require_once("../dbconnect.php");

$val = isset($_POST['search']) ? $_POST['search'] : null;

$sql1 = "SELECT * FROM restaurants WHERE name LIKE '$val%'
		UNION
		SELECT * FROM location WHERE address LIKE '$val%'";

$sql2 = "SELECT * FROM things WHERE name LIKE '$val%'
		UNION
		SELECT * FROM location WHERE address LIKE '$val%'";

$sql3 = "SELECT * FROM concerts WHERE name LIKE '$val%'
		UNION 
		SELECT * FROM location WHERE address LIKE '$val%'";


	
	if(mysqli_query($conn, $sql)) {
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
			$rows = $res->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				echo $value['name'] . "<br>";
			}
		} else {
			echo "No results";
		}
}

?>

<form id="searchbar">
   <label for="searchbar">Search:</label><br>
   <input id="search" name="search" type="text"/>
   <input type="submit" value="Send"/>
</form>

<table id="tablecontent"></table>

<script>
	$("#search").keyup(function(){

  var inputVal = $(this).val();
  var table = $("#tablecontent");

  var $form = $(this);
  var serializedData = $form.serialize();

  $.ajax({
    url: "form.php",
    type: "post",
    data: serializedData,
  success: function(response) {
    document.getElementById("tablecontent").innerHTML=response;
  }
});
})
</script>