<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$errand = mysqli_real_escape_string($conn,$_POST['errand']);

		$query = "DELETE FROM  visitors
							WHERE 	id = {$update_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM visitors WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($post);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>


<?php include('inc/header.php'); ?>
	<div class="container">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" value="<?php echo $post['name']; ?>" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Company</label>
				<input type="text" value="<?php echo $post['company']; ?>" name="company" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" value="<?php echo $post['phone']; ?>" name="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Errand</label>
				<textarea class="form-control" name="errand"></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="Delete" class="btn btn-danger">
		</form>
	</div>
<?php include('inc/footer.php'); ?>