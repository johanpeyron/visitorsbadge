<?php
	require('config/config.php');
	require('config/db.php');

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM visitors WHERE visitors.id = '.$id;

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
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
			<h1><?php echo $post['full_name']; ?></h1>	
			<small>Phone: <?php echo $post['phone']; ?></small>
			<p><?php echo $post['errand']; ?></p>
		</div>
	<?php include('inc/footer.php'); ?>