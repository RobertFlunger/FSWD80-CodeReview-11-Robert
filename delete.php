<?php 
require_once 'dbconnect.php';

if (isset($_GET['ID'])) {
   $ID = $_GET['ID'];
   $category = $_GET['category'];
   if ($category == "restaurant") {
   $sql = "SELECT * FROM restaurants WHERE locationID = '$ID'" ;
} else if ($category == "concert")  {
	$sql = "SELECT * FROM concerts WHERE locationID = '$ID'";
} else if ($category == "thing")  {
	$sql = "SELECT * FROM things WHERE locationID = '$ID'";
}
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();
   $conn->close();
}

print_r($data);
include("components/head.php");
include("components/navbar.php");

?>

<h3 class="h3 text-center m-5">Do you really want to delete this object?</h3>

<form action ="actions/delete_a.php" method="get" class="text-center">
    <input type="text" class="form-control" name="ID" value="<?php echo $data["locationID"]; ?>">
    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">

<!-- 
   <input type="hidden" name= "ID" value="<?php echo $data['locationID'] ?>" />
   <input type="hidden" name= "category" value="<?php echo $category ?>" /> -->
 	<button class="btn btn-success m-2" type="submit">Yes, delete it!</button>
   <a href="index.php"><button type="button" class="btn btn-danger m-2">No, go back!</button></a>
</form>




<?php 
	include("components/footer.php");
?>