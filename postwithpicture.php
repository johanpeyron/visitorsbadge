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
		//var_dump($post);
    
		// Free Result
		mysqli_free_result($result);
    
		// Close Connection
		mysqli_close($conn);
    

    ?>

	<?php include('inc/header.php'); ?>
  <div class="container">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="card" style="width: 18rem;">
     <!--  <img class="card-img-top" src="public/images/visitor/10.jpg" alt="Card image cap"> -->
      <img class="card-img-top" src="<?php echo $post['image_url']; ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post['name']; ?></h5>
        <p class="card-text"><?php echo $post['company']; ?></p>
        <p class="card-text"><?php echo $post['company']; ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

		</form>
    </div>
	<?php include('inc/footer.php'); ?>