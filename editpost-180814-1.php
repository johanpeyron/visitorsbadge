<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$errand = mysqli_real_escape_string($conn,$_POST['errand']);
		$image_url = mysqli_real_escape_string($conn,$_POST['image_url']);

		$query = "UPDATE  visitors
							SET 		name = '$name',
											company = '$company',
											phone = '$phone',
											errand = '$errand',
											image_url = '$image_url'
							WHERE 	id = {$update_id}";

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
			<div class="form-group">
				<label>Name</label>
				<input type="text" value="<?php echo $post['name']; ?>" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Company</label>
				<input type="text" value="<?php echo $post['company']; ?>" name="company" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" value="<?php echo $post['phone']; ?>" name="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Errand</label>
				<textarea name="errand" class="form-control"><?php echo $post['errand']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Photo</label>
				<input type="text" value="<?php echo $post['image_url']; ?>" name="image_url" class="form-control">
			</div>

			<div class="form-group">
					<label>Check in</label>
					<input type="text" class="form-control datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" name="checkin"/>
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker1').datetimepicker({
							locale: 'sv'
						});
					});
				</script>
			</div>

        <div class="form-group">
				<label>Check out</label>
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="checkout"/>
						<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
        </div>
				<small name="checkoutHelp" class="form-text text-muted">How long will your visitor stay?</small>
            </div>
			<script type="text/javascript">
				$(function () {
					$('#datetimepicker2').datetimepicker({
						locale: 'sv'
					});
				});
			</script>

			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="Save changes" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>