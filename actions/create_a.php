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

$sql = "INSERT INTO location (address, img)
        VALUES ('$address', '$img')";
echo $sql;
mysqli_query($conn, $sql);
$locationID = mysqli_insert_id($conn);
echo $locationID;

if (!empty($locationID))
  if ($category == "restaurant") {
    $phone = $_GET['phone'];
    $sql = "INSERT INTO restaurants (locationID, name, type, description, url, telephone)
    VALUES ($locationID, '$name', '$type', '$description', '$url', '$phone')";
  } else if ($category == "concert") {
    $date = $_GET['eventdate'];
    $time = $_GET['eventtime'];
    $price = $_GET['price'];
    $phone = $_GET['phone'];
    $sql = "INSERT INTO concerts (locationID, name, eventDate, eventTime, price, type, description, url, telephone) 
      VALUES ($locationID, '$name', '$date', '$time', '$price', '$type', '$description', '$url', '$phone')"; 
  } else if ($category == "thing") {
    $sql = "INSERT INTO things (locationID, name, type, description, url)
    VALUES ($locationID, '$name', '$type', '$description', '$url')"; 
  }
echo $sql;
  if($conn->query($sql) == TRUE) {
      echo "<p>Succesfully created new entry</p>"; 
      echo "<a href='../adminpanel.php'><button type='btn btn-success'>To Admin Panel</button></a>";
      } else {
      echo "Error while updating record : ". $conn->error;
   }
   $conn->close();

}

?> 
