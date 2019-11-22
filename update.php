<?php 

if ( isset($_SESSION['user'])) {
  header("Location: home.php");
  exit;
}

include("components/head.php");
include("components/navbar.php");


include 'dbconnect.php';
if (isset($_GET['concertID'])) {
   $ID = $_GET['concertID'];
   $sql = "SELECT * FROM concerts INNER JOIN location ON concerts.locationID = location.ID WHERE location.ID = '$ID'";
   $result = mysqli_query($conn, $sql);
   $data = $result->fetch_assoc();
   $conn->close();
   $category = 'concert';
 } else if (isset($_GET['restaurantID'])) {
   $ID = $_GET['restaurantID'];
   $sql = "SELECT * FROM restaurants INNER JOIN location ON restaurants.locationID = location.ID WHERE location.ID = '$ID'";
   $result = mysqli_query($conn, $sql);
   $data = $result->fetch_assoc();
   $conn->close();
   $category = 'restaurant';
  } else if (isset($_GET['thingsID'])) {
   $ID = $_GET['thingsID'];
   $sql = "SELECT * FROM things INNER JOIN location ON things.locationID = location.ID WHERE location.ID = '$ID'";
   $result = mysqli_query($conn, $sql);
   $data = $result->fetch_assoc();
   $conn->close();
   $category = 'things';
 }
?>

<div class="container mb-5">
  <h3 class="text-center mt-3">Update Information</h3>

<div class="card"> 
  <form action="actions/update_a.php" method="get">
    <input type="text" class="form-control" name="ID" value="<?php echo $data["ID"]; ?>">
    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
  <div class="card-header">
  <label for="type">Type:</label>
  <input type="text" class="form-control" name="type" value="<?php echo $data["type"]; ?>">
    <label for="img">Image Link:</label>
    <input type="text" class="form-control" name="img" value="<?php echo $data["img"]; ?>">
  </div>
    <div class="card-body">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $data["name"]; ?>">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" value="<?php echo $data["address"]; ?>">
      <?php if (isset($_GET['concertID'])) { echo '
        <label for="date">Event Date:</label>
        <input type="text" class="form-control" name="eventdate" value="' .$data["eventDate"]. '">
        <label for="time">Event Time:</label>
        <input type="text" class="form-control" name="eventtime" value="' .$data["eventTime"]. '">';
      } ?>      
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $data["description"]; ?>">
     </div>
    <div class="card-footer">
      <?php if (isset($_GET['concertID'])) { echo '
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" value="' .$data["price"]. '">'; }
      ?>
      <?php if (!isset($_GET['thingsID'])) { echo '<label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" value="' .$data["telephone"].'">'; }
      ?>
      <label for="url">URL:</label>
      <input type="text" class="form-control" name="url" value="<?php echo $data["url"]; ?>">
    <button type="submit" class="btn btn-info my-3">Update</button></a>
  </div>
</form>
</div>

<?php 
  include('components/footer.php');
?>