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

		//var_dump($checkin);
		//echo $checkin;

		$query =
			"INSERT INTO visitors(
			name, company, phone, errand, checkin, checkout)
			VALUES('$name', '$company', '$phone', '$errand', '$checkin', '$checkout')";
		
		echo $query;

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
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
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="checkin"/>
          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
				</div>
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
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker2').datetimepicker({
							locale: 'sv'
						});
					});
				</script>
			</div>

		<input type="submit" name="submit" value="Add visitor" class="btn btn-primary">
	</form>
</div>
<?php include('inc/footer.php'); ?>
