<?php
	require('config/config.php');
	require('config/db.php');

		// Check For Submit
		if(isset($_POST['update'])){
			// Get form data
			$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
	
			$query = "UPDATE visitors SET checkout = NOW()  WHERE id = {$update_id}";
			//var_dump($query);
	
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
		//var_dump($query);

		// Get Result
		$result = mysqli_query($conn, $query);

		// Fetch Data
		$post = mysqli_fetch_assoc($result);

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
			<!-- <button type="button" class="btn btn-primary" onclick="window.print()">Print</button> -->
			<a href="<?php echo ROOT_URL; ?>postwithpicture.php?id=<?php echo $post['id']; ?>"><button type="button" class="btn btn-outline-primary">Print</button></a>
			<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-secondary">Change</a>

			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>" class="btn btn-outline-dark">

			<input type="submit" value="Check out" name="update" class="btn btn-outline-dark">
		</form>
		</div>
	<?php include('inc/footer.php'); ?>