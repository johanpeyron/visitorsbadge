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
			<div class="p-0 card-header">
				<img class="float-left" src="public/images/logo-lexicon.gif" alt="" width="58" height="20">
			</div>
			<img class="card-img-top" src="<?php echo $post['image_url']; ?>" alt="Card image cap">
      <div class="card-body">
				<h5 class="card-title"><?php echo $post['name']; ?></h5>
        <class="card-text"><small class="text-muted">Company</small><br>
        <class="card-text"><?php echo $post['company']; ?><br>
        <class="card-text"><small class="text-muted">Phone</small><br>
        <class="card-text"><?php echo $post['phone']; ?><br>
        <class="card-text"><small class="text-muted">Errand</small><br>
        <class="card-text"><?php echo $post['errand']; ?><br>
        <class="card-text"><small class="text-muted">Check in</small><br>
        <class="card-text"><?php echo $post['checkin']; ?><br>
        <class="card-text"><small class="text-muted">Check out</small><br>
        <class="card-text"><?php echo $post['checkout']; ?><br>
			  <button type="button" class="btn btn-outline-secondary" onclick="window.print()">Print</button>
				<!-- <a href="<?php echo ROOT_URL; ?>postwithpicture.php?id=<?php echo $post['id']; ?>"><button type="button" class="btn btn-outline-primary">Print</button></a> -->
				<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-secondary">Change</a>
    	</div>
    </div>

		</form>
    </div>
	<?php include('inc/footer.php'); ?>