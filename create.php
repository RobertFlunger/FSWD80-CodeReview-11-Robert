<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if ( isset($_SESSION['user'])) {
	header("Location: home.php");
	exit;
}

include("components/head.php");
include("components/navbar.php");

$category = $_GET('category');

?>

<div class="container mb-5">
  <h3 class="text-center mt-3">Update Information</h3>

<div class="card"> 
  <form action="actions/create_a.php" method="get">
    <input type="text" class="form-control" name="ID">
    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
  <div class="card-header">
  <label for="type">Type:</label>
  <input type="text" class="form-control" name="type" placeholder="Type">
    <label for="img">Image Link:</label>
    <input type="text" class="form-control" name="img" placeholder="Image link">
  </div>
    <div class="card-body">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Name">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address">
      <?php if ($category == 'concert') { echo '
        <label for="date">Event Date:</label>
        <input type="text" class="form-control" name="eventdate" placeholder="YYYY-MM-DD">
        <label for="time">Event Time:</label>
        <input type="text" class="form-control" name="eventtime" placeholder="Hr:Min">';
      } ?>      
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $data["description"]; ?>">
     </div>
    <div class="card-footer">
      <?php if ($category == 'concert')) { echo '
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" placeholder="Price in €">'; }
      ?>
      <?php if ($category == 'thing') { echo '<label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone Number">'; }
      ?>
      <label for="url">URL:</label>
      <input type="text" class="form-control" name="url" placeholder="Homepage">
    <button type="submit" class="btn btn-info my-3">Create new entry</button></a>
  </div>
</form>
</div>
</div>


<?php


include("components/footer.php");
?>