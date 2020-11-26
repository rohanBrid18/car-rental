<?php
	session_start();
	include("config.php");

	$reg = $_POST['car_no'];
	$driver = $_POST['driver_id'];
	// echo $reg;
	// echo $driver;
	$sql = "DELETE FROM book_car WHERE reg_no = '$reg'";

	if (mysqli_query($conn, $sql)) {
		mysqli_query($conn, "UPDATE drivers SET start_date = NULL, end_date = NULL WHERE license_no = '$driver'");
		echo "<script type='text/javascript'>";
		echo "alert('Your Ride has been Cancelled')"; 
		echo "</script>";
	} else {
	    echo "<script type='text/javascript'>";
	    echo "alert('ERROR! Could not cancel ride')";
	    echo "</script>";
	}

	echo "<script>location.href='rides.php'</script>";
	mysqli_close($conn);
?>