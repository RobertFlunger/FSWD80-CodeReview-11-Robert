<?php 
require_once '../dbconnect.php';
if ($_GET) {
   	$ID = $_GET['ID'];
   	$category = $_GET['category'];
   	echo $ID;
   	if ($category == "restaurant") {
   	$sql = "DELETE FROM restaurants WHERE locationID = '$ID'";
   } else if ($category == "concert") {
   		$sql = "DELETE FROM restaurants WHERE locationID = '$ID'";
   	} else if ($category == "thing") {
   		$sql = "DELETE FROM things WHERE locationID = '$ID'";
   	}

    $conn->query($sql);
    unset($sql);

    $sql = "DELETE FROM location WHERE ID = '$ID'";


    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../adminpanel.php'><button type='button' class='btn btn-info'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }
   unset($sql);
   $conn->close();
}
?>