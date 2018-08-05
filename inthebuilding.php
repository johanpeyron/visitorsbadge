<?php
	require('config/config.php');
	require('config/db.php');

  // Check for Submit
  if (isset($_POST['update'])) {
    $query = "UPDATE visitors SET checkin = now(), checkout = NULL";

    if (mysqli_query($conn, $query)) {
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  }


	// Create Query
	$query = 'SELECT * FROM visitors WHERE checkout IS NULL';

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
          <th scope="col">Checked in</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post) : ?>
          <tr>
            <th scope="row"><class="text-secondary"><?php echo $post['name']; ?></th>
            <td><?php echo $post['company']; ?></td>
            <td><?php echo $post['phone']; ?></td>
            <td><?php echo $post['checkin']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <input type="button" value="Print" name="printsummary" class="btn btn-primary" onclick="window.print()">
    </form>

	</div>
<?php include('inc/footer.php'); ?>