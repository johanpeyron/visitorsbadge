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
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Errand</th>
          <th scope="col">Arrive</th>
          <th scope="col">Leave</th>
          <th scope="col">Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post) : ?>
          <tr>
            <th scope="row"> <?php echo $post['id']; ?> </th>
                <td> <?php echo $post['full_name']; ?> </td>
                <td> <?php echo $post['phone']; ?> </td>
                <td> <?php echo $post['errand']; ?> </td>
                <td> <?php echo $post['arrive']; ?> </td>
                <td> <?php echo $post['depart']; ?> </td>
                <td> <?php echo $post['image_url']; ?> </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

	</div>
<?php include('inc/footer.php'); ?>