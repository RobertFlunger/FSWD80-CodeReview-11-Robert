<?php 
require_once '../dbconnect.php';
if ($_GET) {
   	$ID = $_GET['ID'];
   	$category = $_GET['category'];
   	
   	if ($category == "restaurant") {
   	$sql = "DELETE FROM restaurants WHERE ID = '$ID'";
   } else if ($category == "concert") {
   		$sql = "DELETE FROM restaurants WHERE ID = '$ID'";
   	} else if ($category == "thing") {
   		$sql = "DELETE FROM things WHERE ID = '$ID'"
   	}

    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../index.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $connect->error;
   }
   unset($sql);
   $conn->close();
}
?>