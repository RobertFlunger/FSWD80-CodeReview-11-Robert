<?php

ob_start();
session_start();
if ( isset($_SESSION['user'])) {
	header("Location: home.php");
	exit;
}

if ( isset($_SESSION['admin'])) {
	header("Location: home.php");
	exit;
}


include_once 'dbconnect.php';
include 'registration_validation.php';

if (isset($_POST['email_check'])) {
	$email = $_POST['email'];
	$sql = "SELECT * FROM users WHERE userEmail = '$email'";
	$res = mysqli_query($conn, $sql);
	if (mysqli_num_rows($res) > 0) {
		echo "taken";
	} else {
		echo "not_taken";
	}
	exit();
}

if (isset($_POST['pass_check'])) {
	$pass1 = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	
	if ($pass1 == $pass2) {
		echo "match";
	} else {
		echo "no_match";
	}
	exit();
}

?>

<?php 
	include("components/head.php");
	include("components/navbar.php");
?>

	<div class="container p-4 mt-5 border rounded w-25" id="registration-form ">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		<h2>Sign Up</h2>
		<hr>

		<?php 
			if ( isset($errMsg) ) {
		?>
		
		<div class="alert alert-<?php echo $errType ?>">
			<?php echo $errMsg; ?>
		</div>

		<?php 
			}
		?>
		
		<input type="text" name="name" class="form-control my-3" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>"/>
			<span class="text-danger"><?php echo $nameError; ?></span>
		
		<input type="email" id="email" name="email" class="form-control my-3" placeholder="Enter Your Email" maxlength="50" value="<?php echo $email ?>"/>
			<span class = "text-danger" id="emailFormErr">
				<?php //echo $emailError; ?></span>

		<input type="password" name="pass" class="form-control my-3" placeholder="Enter Your Password" maxlength="20"/>
			<span class="text-danger">
				<?php if ($errors) {
					foreach ($errors as $error) {
						echo $error . "<br>";
					}
					
				} ?> 
			</span>
			<hr>
		<div class="text-center">

			<button type="submit" class="btn btn-primary mt-3" name="btn-signup">Sign Up!</button>
			<hr>
			<h4>Already registered?</h4>
			<a href="index.php"><button type="button" class="btn btn-success mt-3">Sign in here</button></a>
		</div>
	</form>
</div>
<script src="validation.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>