<?php
	// Start the session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rent a Car in Mumbai</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: lightgrey;
		}
		.card{
			border-color: grey;
		}
		div.features{
			float: left;
			width: 115px;
			text-align: center;
		}
		.card-deck{
			padding-bottom: 25px;
		}
		div.footer{
		    background-color: #423D41;
		    text-align: center;
		    color: white;
		    padding-top: 30px;
		    padding-bottom: 50px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 30px; padding-right: 30px;">
		<a class="navbar-brand" href="admin.php">
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
	          <li class="nav-item active">
	            <a class="nav-link" href="">Drivers<span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	          	<a class="nav-link" href="logout.php">LOGOUT</a>
	          </li>
	    </ul>
	  </div>
	</nav>
	<?php

	    include("config.php");

	    $sql = "SELECT * FROM drivers";
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
						    		.'<td><button type="button" class="btn btn-warning" onclick=set_lic("'.$license[$count].'")>Remove Driver</button></td>'
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
	<form action="removedriver.php" method="post" id="remove_form">
		<input type="hidden" name="lic_no" value="" id="lic_no">
	</form>
</body>
<script type="text/javascript">
	function set_lic(lic) {
		document.getElementById("lic_no").value = lic;
		document.getElementById("remove_form").submit();
	}
</script>
</html>