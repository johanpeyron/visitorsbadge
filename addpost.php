<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$errand = mysqli_real_escape_string($conn,$_POST['errand']);
		$checkin = mysqli_real_escape_string($conn,$_POST['checkin']);
		$checkout = mysqli_real_escape_string($conn,$_POST['checkout']);

		$query = "INSERT INTO visitors(title, author,body) VALUES('$title', '$author', '$body')";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Company</label>
				<input type="text" name="company" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Errand</label>
				<textarea name="errand" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Check in</label>
				<input type="text" name="checkin" class="form-control">
			</div>
			<div class="form-group">
				<label>Check out</label>
				<input type="text" name="checkout" class="form-control">
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>