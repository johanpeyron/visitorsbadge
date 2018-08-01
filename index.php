<?php
	require('config/config.php');
	require('config/db.php');

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
          <th scope="col">Leaving</th>
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
            <th scope="row"><a href="post.php?id=<?php echo $post['id']; ?>"><button type="button" class="btn btn-outline-dark btn-sm">CheckOut</button></a></th>
            <!-- <th scope="row"><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['name']; ?></a></th> -->
            <td><?php echo $post['name']; ?></td>
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

	</div>
<?php include('inc/footer.php'); ?>