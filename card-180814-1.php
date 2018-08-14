<?php
	require('config/config.php');
	require('config/db.php');

		// Check For Submit
		if(isset($_POST['submit'])){
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
		//print_r($post) ."<br>";
		//echo ('$post["name"] = '. $post['name']);
		
		//var_dump($post[2]);
    
		// Free Result
		mysqli_free_result($result);
    
		// Close Connection
		mysqli_close($conn);
		
		// QR Code text
		$qrcodetext = $post['name'] .", " .$post['company'] .", " .$post['phone'];
		//var_dump($qrcodetext);

    ?>

	<?php include('inc/header.php'); ?>
  <div class="container">
		<!-- <div class="card" style="width: 20rem;"> -->
		<div class="card" style="width: 400px;">
			<!-- <div class="container-fluid">
			</div> -->
			<!-- <div class="p-0 card-header">
				<img class="float-left" src="public/images/logo-lexicon.gif" alt="" width="58" height="20">
			</div> -->
			<!-- <img class="card-img-top" src="<?php echo $post['image_url']; ?>" alt="Card image cap"> -->
			<div class="container-fluid">
					<div class="row">
							<div class="col-8"><img class="card-img-top" src="<?php echo $post['image_url']; ?>"></div>
							<div class="col-4" id="qrcode"></div>
					</div>
			</div>
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
				
				<!-- <div id="qrcode" style="width:100px;" class="m-0"></div><br> -->



    	</div>

			<div class="container">
					<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

						<input type="text" id="text" value="<?php echo $qrcodetext; ?>" style="width:80%;display:none;"/><br>
						<button type="button" class="btn btn-primary btn-sm" onclick="window.print()">Print</button>
						<!-- <a href="<?php echo ROOT_URL; ?>postwithpicture.php?id=<?php echo $post['id']; ?>"><button type="button" class="btn btn-outline-primary">Print</button></a> -->
						<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Change</a>
						<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
						<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Check out">
						<a href="<?php echo ROOT_URL; ?>deletepost.php?id=<?php echo $post['id']; ?>" class="btn btn-danger btn-sm">Delete</a>

					</form>
			</div>
    </div>

    </div>
		<script type="text/javascript">
		var qrcode = new QRCode(document.getElementById("qrcode"), {
			width : 100,
			height : 100
		});

		function makeCode () {		
			var elText = document.getElementById("text");
			
			if (!elText.value) {
				alert("Input a text");
				elText.focus();
				return;
			}
			
			qrcode.makeCode(elText.value);
		}

		makeCode();

		/* 
		$("#text").
			on("blur", function () {
				makeCode();
			}).
			on("keydown", function (e) {
				if (e.keyCode == 13) {
					makeCode();
				}
			});
		*/
		</script>


	<?php include('inc/footer.php'); ?>