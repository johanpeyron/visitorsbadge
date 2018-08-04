<?php
	require('config/config.php');
	require('config/db.php');

  // Check for Submit
  if (isset($_POST['update'])) {
    $query = "UPDATE visitors SET checkout = NULL";

    if (mysqli_query($conn, $query)) {
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  }


	// Create Query
	$query = 'SELECT * FROM visitors ORDER BY checkin DESC';

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
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Company</th>
          <th scope="col">Phone</th>
          <th scope="col">Errand</th>
          <th scope="col">Checked in</th>
          <th scope="col">Checked out</th>
          <th scope="col">Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post) : ?>
          <tr>
            <th scope="row"><a href="post.php?id=<?php echo $post['id']; ?>" class="text-secondary"><?php echo $post['name']; ?></a></th>
            <td><?php echo $post['company']; ?></td>
            <td><?php echo $post['phone']; ?></td>
            <td><?php echo $post['errand']; ?></td>
            <td><?php echo $post['checkin']; ?></td>
            <td><?php echo $post['checkout']; ?></td>
            <td><?php echo $post['image_url']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <input type="submit" value="Check In Everybody" name="update" class="btn btn-outline-dark">
    </form>

	</div>
<?php include('inc/footer.php'); ?>