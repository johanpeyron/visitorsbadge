<?php
	require('config/config.php');
	require('config/db.php');

		// Check For Submit
		if(isset($_POST['checkout'])){
			// Get form data
			$checkout_id = mysqli_real_escape_string($conn, $_POST['checkout_id']);
	
			$query = "UPDATE visitors SET checkout = CURRENT_TIMESTAMP  WHERE id = {$checkout_id}";
	
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
		var_dump($post);

		// Free Result
		mysqli_free_result($result);

		// Close Connection
		mysqli_close($conn);

?>

	<?php include('inc/header.php'); ?>
		<div class="container">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<h1><?php echo $post['name']; ?></h1>	

			Phone: <?php echo $post['phone']; ?>
			<p><?php echo $post['errand']; ?></p>
			<a href="<?php echo ROOT_URL; ?>editpost.php" class="btn btn-outline-success">Print</a>
			<a href="<?php echo ROOT_URL; ?>editpost.php" class="btn btn-outline-secondary">Change</a>
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-outline-dark">Check out</a>
			</form>
		</div>
	<?php include('inc/footer.php'); ?>