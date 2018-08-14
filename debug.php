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

/* 		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		} */
	}
?>

<?php include('inc/header.php'); ?>
<div class="container">
  <div class="form-group">
    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                locale: 'sv'
            });
        });
    </script>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker5').datetimepicker({
                locale: 'sv'
            });
        });
    </script>
  </div>
</div>
<?php include('inc/footer.php'); ?>
