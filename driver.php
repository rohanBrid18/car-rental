<?php
	session_start();

	$b_id = $_POST['book_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adhiraj Tours and Travels</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 30px; padding-right: 30px;">
		<a class="navbar-brand" href="#">
			<img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			ADHIRAJ TOURS AND TRAVELS
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	    <ul class="navbar-nav">
	          <li class="nav-item">
	            <a class="nav-link" href="admin.php">Admin Home</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="admin_cars.php">Cars</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="index.html">LOGOUT</a>
	          </li>
	        </ul>
	  </div>
	</nav>
	<?php
		include 'config.php';

		date_default_timezone_set("Asia/Kolkata");
		$curr_date = date("d-m-Y H:i");
		$dateValue = strtotime($curr_date);
		$c_year = date('Y',$dateValue);
		$c_month = date('m',$dateValue);

		$sql1 = "SELECT end_date from drivers";
		$result = mysqli_query($conn, $sql1);
		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$end_date = $row['end_date'];
		    	if ($end_date == NULL) {
		    		continue;
		    	}
		    	$dt = DateTime::createFromFormat('d/m/Y H:i', $end_date)->format('d-m-Y H:i');
		    	$dateValue = strtotime($dt);
		    	$e_year = date('Y',$dateValue);
		    	$e_month = date('m',$dateValue);
		    	if ($curr_date > $end_date) {
		    		mysqli_query($conn, "UPDATE drivers SET start_date = NULL, end_date = NULL WHERE end_date = '$end_date'");
		    	}
		    	else if ($c_month > $e_month) {
		    		mysqli_query($conn, "UPDATE drivers SET start_date = NULL, end_date = NULL WHERE end_date = '$end_date'");
		    	}
		    	else if ($c_year > $e_year) {
		    		mysqli_query($conn, "UPDATE drivers SET start_date = NULL, end_date = NULL WHERE end_date = '$end_date'");
		    	}
		    	else {
		    		continue;
		    	}
		    	// $cmp = strcmp($curr_date, $end_date);
		    	// echo $cmp;
		    	// if ($cmp > 0) {
		    	// 	mysqli_query($conn, "UPDATE drivers SET start_date = '0', end_date = '0' WHERE end_date = '$end_date'");
		    	// }
		    }
		}

		//$result = mysqli_query($conn, "SELECT strcmp('$curr_date', end_date)")

		//$sql = "UPDATE drivers SET start_date = '0', end_date = '0' WHERE end_date < '$curr_date'";
		$sql = "SELECT * FROM drivers WHERE start_date IS NULL";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			$count = 0;
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$name = $row['name'];
		    	$phone = $row['phone'];
		    	$license[] = $row['license_no'];
		    	$pan = $row['pan_no'];
		    	$aadhar = $row['aadhar_no'];
		    	$image_path = $row['image'];

				echo '<div class="container" style="margin-left: 15%; margin-top: 5%; margin-bottom: 5%;">'
						.'<table style="border-collapse: separate; border-spacing: 5px; width: 60%">'
						  .'<tr>'
						    ."<td rowspan='5'><img src='images/$image_path' height='150px' width='140px'></td>"
						    .'<td>'
						    	.'<tr>'
						    		.'<td colspan="2"><b><font size="+1">' .$name .'</b></td>'
						    	.'</tr>'
						    	.'<tr>'
						    		.'<td>Phone No: ' .$phone .'</td>'
						    		.'<td>License No: ' .$license[$count] .'</td>'
						    	.'</tr>'
						    	.'<tr>'
						    		.'<td>Pan No: ' .$pan .'</td>'
						    		.'<td>Aadhar No: ' .$aadhar .'</td>'
						    	.'</tr>'
						    	.'<tr>'
						    		.'<td><button type="button" class="btn btn-warning" onclick=set_lic("'.$license[$count].'")>Confirm Allot</button></td>'
						    	.'</tr>'
						    .'</td>'
						  .'</tr>'
						.'</table>'
					.'</div>';
				$count++;
			}
		} else {
			echo "<h4>Currently No Drivers are Available.</h4>";
		}

		mysqli_close($conn);
	?>
	<form action="confirm_driver.php" method="post" id="confirm_form">
		<input type="hidden" name="book_id" value="" id="book">
		<input type="hidden" name="lic_no" value="" id="lic">
	</form>
</body>
<script type="text/javascript">
	function set_lic(lic_no) {
		document.getElementById("book").value = <?php echo $b_id; ?>;
		document.getElementById("lic").value = lic_no;
		document.getElementById("confirm_form").submit();
	}
</script>
</html>