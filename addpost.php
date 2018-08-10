<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$company = mysqli_real_escape_string($conn, $_POST['company']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$errand = mysqli_real_escape_string($conn,$_POST['errand']);
		$checkin = mysqli_real_escape_string($conn,$_POST['checkin']);
		$checkout = mysqli_real_escape_string($conn,$_POST['checkout']);

		$query =
			"INSERT INTO visitors(
			name, company, phone, errand, checkin, checkout)
			VALUES('$name', '$company', '$phone', '$errand', $checkin, $checkout)";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
	?>

	<?php
		$timestamp1 = strtotime('now');
		$timestamp2 = strtotime('+90 minutes');
		$nutid1 = date('ymd-H:i', $timestamp1);
		$nutid2 = date('ymd H:i', $timestamp2);

		$date=date_create("now");
		echo date_format($date,"ymd H:i");
	?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label>Company</label>
				<input type="text" class="form-control" name="company">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" name="phone">
			</div>
			<div class="form-group">
				<label>Errand</label>
				<textarea class="form-control" name="errand"></textarea>
			</div>
			<div class="form-group">
				<label>Check in</label>
				<input type="datetime-local" class="form-control" name="checkin" default>
				<?php echo $nutid1; ?>
			</div>
			<div class="form-group">
				<label>Check out</label>
				<input type="datetime-local" class="form-control" name="checkout">
				<small name="checkoutHelp" class="form-text text-muted">How long will your visitor stay?</small>
			</div>
			<input type="submit" name="submit" value="Check in" class="btn btn-primary">
		</form>
	</div>
<?php include('inc/footer.php'); ?>
