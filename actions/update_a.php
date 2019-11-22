<?php 
require_once '../dbconnect.php';

if ($_GET) {
  $ID = $_GET['ID'];
  $category = $_GET['category'];
  $type = $_GET['type'];
  $img = $_GET['img'];
  $img = mysqli_real_escape_string($conn, $img);
  $name = $_GET['name'];
  $address = $_GET['address'];
  $address = mysqli_real_escape_string($conn, $address);
  $description = $_GET['description'];
  $description = mysqli_real_escape_string($conn, $description);
  $url = $_GET['url'];
  $url = mysqli_real_escape_string($conn, $url);

  echo $category;
if ($category == "restaurant") {
    $phone = $_GET['phone'];
    $sql = "UPDATE restaurants INNER JOIN location ON restaurants.locationID = location.ID SET type = '$type', img = '$img', name = '$name', address = '$address', description = '$description', telephone = '$phone', url = '$url' WHERE location.ID = '$ID';" ;
  } else if ($category == "concert") {
    $date = $_GET['eventdate'];
    $time = $_GET['eventtime'];
    $price = $_GET['price'];
    $phone = $_GET['phone'];
    $sql = "UPDATE concerts INNER JOIN location ON concerts.locationID = location.ID SET type = '$type', img = '$img', name = '$name', eventDate = '$date', eventTime = '$time', price = '$price', address = '$address', description = '$description', telephone = '$phone', url = '$url' WHERE location.ID = '$ID';" ; 
  } else if ($category == "things") {
    $sql = "UPDATE things INNER JOIN location ON things.locationID = location.ID SET type = '$type', img = '$img', name = '$name', address = '$address', description = '$description', url = '$url' WHERE location.ID = '$ID';" ; 
  }

  if($conn->query($sql) == TRUE) {
      echo "<p>Successfully Updated</p>";
      echo "<a href='../update.php?"; 
      if ($category == "restaurant") { 
        echo 'restaurantID='; 
        } else if ($category == "concert") 
        { echo 'concertID='; 
        } else { echo 'thingsID='; } 
      echo $ID. "'><button type='btn btn-info'>Back</button></a>";
      echo "<a href='../adminpanel.php'><button type='btn btn-success'>To Admin Panel</button></a>";
   } else {
      echo "Error while updating record : ". $conn->error;
   }
   $conn->close();

}

?> 