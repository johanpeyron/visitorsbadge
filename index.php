<?php
	require('config/config.php');
	require('config/db.php');

	// Create Query
	$query = 'SELECT * FROM visitors ';

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Visitors</h1>
		<?php foreach($posts as $post) : ?>
			<div class="well">
				<h3><?php echo $post['id']; ?></h3>
				Visitor: <?php echo $post['full_name']; ?><br>
				Phone: <?php echo $post['phone']; ?>
				<p>Errand: <?php echo $post['errand']; ?></p>
				Arrived: <?php echo $post['arrive']; ?><br>
				Left: <?php echo $post['depart']; ?><br>
				Image: <?php echo $post['image_url']; ?><br>
			</div>
		<?php endforeach; ?>
	</div>
<?php include('inc/footer.php'); ?>