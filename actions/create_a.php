<?php 
require_once '../db_connect.php';
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

$sql = "INSERT INTO location (address, img)
        VALUES ('$address', '$img')";

mysqli_query($conn, $sql);
$locationID = mysqli_insert_id();

if (!empty($locationID))
  if ($category == "restaurant") {
    $phone = $_GET['phone'];
    $sql = "INSERT INTO restaurants (locationID, type, name, description, telephone, url)
    VALUES ($locationID, '$type', '$name', '$address', '$description', '$phone', '$url'";
  } else if ($category == "concert") {
    $date = $_GET['eventdate'];
    $time = $_GET['eventtime'];
    $price = $_GET['price'];
    $phone = $_GET['phone'];
    $sql = "INSERT INTO concerts (locationID, type, name, eventDate, eventTime, price, description, telephone, url) 
      VALUES ($locationID, '$type', '$name', '$date', '$time', '$price', '$address', '$description', '$phone', '$url'"; 
  } else if ($category == "things") {
    $sql = "INSERT INTO things (locationID, type, name, description, url)
    VALUES ($locationID, '$type', '$img', '$name', '$address', '$description'"; 
  }

  if($conn->query($sql) == TRUE) {
      echo "<p>Succesfully created new entry</p>";
      echo "<a href='../create.php?"; 
      echo "<a href='../adminpanel.php'><button type='btn btn-success'>To Admin Panel</button></a>";
      } else {
      echo "Error while updating record : ". $conn->error;
   }
   $conn->close();

}

?> 
