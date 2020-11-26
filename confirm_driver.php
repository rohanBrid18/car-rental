<?php
	session_start();

	$b_id = $_POST['book_id'];
	$l_no = $_POST['lic_no'];

	include 'config.php';

	try {
		mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
		mysqli_autocommit($conn, FALSE);

		mysqli_query($conn, "UPDATE book_car SET driver = '$l_no' WHERE book_id = $b_id");
		$result = mysqli_query($conn, "SELECT start_time, end_time FROM book_car WHERE book_id = $b_id");
		
		if (mysqli_num_rows($result) > 0) {
			//$count = 0;
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
				$start_dt = $row['start_time'];
				$end_dt = $row['end_time'];
				// echo $start_dt;
				// echo $end_dt;
				mysqli_query($conn, "UPDATE drivers SET start_date='$start_dt', end_date='$end_dt' WHERE license_no = '$l_no'");
				// mysqli_commit($conn);
			}
		}

		// mysqli_query($conn, "UPDATE drivers SET start_date = '$start_dt' AND end_date = '$end_dt' WHERE license_no = '$l_no'");

		mysqli_commit($conn);

	} catch (Exception $e) {
		echo "<script type='text/javascript'>";
		echo "alert('ERROR! Could not allot driver')"; 
		echo "</script>";

		mysqli_rollback($conn);
	}

	/*$sql = "UPDATE book_car
	SET driver = '$l_no'
	WHERE book_id = $b_id";

	if (mysqli_query($conn, $sql)) {
		$sql1 = "UPDATE drivers
		SET status = 1
		WHERE license_no = '$l_no'";

		if (mysqli_query($conn, $sql1)) {
			echo "<script type='text/javascript'>";
			echo "alert('Driver allotted successfully')"; 
			echo "</script>";
		} else {
		  echo "<script type='text/javascript'>";
		  echo "alert('ERROR! Could not allot driver')"; 
		  echo "</script>";
		}
	} else {
	  echo "<script type='text/javascript'>";
	  echo "alert('ERROR! Could not allot driver')"; 
	  echo "</script>";
	}*/

	mysqli_close($conn);

	echo "<script>location.href='admin.php'</script>";
?>