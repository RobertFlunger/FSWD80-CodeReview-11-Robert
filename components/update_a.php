<?php 
require_once '../dbconnect.php';

if ($_GET) {
  $restaurantID = $_GET['restaurantID'];
  $type = $_GET['type'];
  $img = $_GET['img'];
  $img = mysqli_real_escape_string($conn, $img);
  $name = $_GET['name'];
  $address = $_GET['address'];
  $address = mysqli_real_escape_string($conn, $address);
  $description = $_GET['description'];
  $description = mysqli_real_escape_string($conn, $description);
  $phone = $_GET['phone'];
  $url = $_GET['url'];
  $url = mysqli_real_escape_string($conn, $url);

  $sql = "UPDATE restaurants INNER JOIN location ON concerts.locationID = location.ID SET type = '$type', img = '$img', name = '$name', address = '$address', media_type = '$type', description = '$description', phone = '$phone', url = '$url' WHERE location.ID = '$ID';" ;
   if($conn->query($sql) === TRUE) {
      echo "<p>Successfully Updated</p>";
      echo "<a href='../update.php?ID=" .$ID."'><button type='btn btn-info'>Back</button></a>";
      echo "<a href='../adminpanel.php'><button type='btn btn-success'>Home</button></a>";
   } else {
      echo "Error while updating record : ". $conn->error;
   }
   $conn->close();
}
?> 