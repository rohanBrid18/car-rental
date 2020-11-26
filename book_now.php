<?php
	session_start();
	include("config.php");

	$reg = $_POST['car_no'];

	$sql = "SELECT * FROM cars WHERE reg_no = '$reg'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	$car_name = $row['name'];
	    	$car_no = $row['reg_no'];
	    	$category = $row['category'];
	    	$seats = $row['seats'];
	    	$base_fare = $row['base_fare'];
	    	$price = $row['price'];
	    }
	}

	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rent a Car in Mumbai</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAI7kAUPZRwcEVz6bDGxDooQFLSHH_2b0&libraries=geometry&language=en&callback=initMap" async defer></script>
        
	<script type="text/javascript">
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) 
		    {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		var startAdd = readCookie('startAdd');
		var startLat = readCookie('startLat');
		var startLng = readCookie('startLng');
		var destAdd = readCookie('destAdd');
		var destLat = readCookie('destLat');
		var destLng = readCookie('destLng');
		var startDT = readCookie('startDT');
		var dropDT = readCookie('dropDT');
		var roundTrip = readCookie('roundTrip');
		/*document.write("From: "+startAdd);
		document.write("To: "+destAdd);
		document.write("Start Date: "+startDT);
		document.write("End Date: "+dropDT);*/
	</script>
	<style type="text/css">
		body{
			background-color: #f4f5f7;
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
	          	<?php
	          		if (isset($_SESSION["name"])) {
	          			echo "<a class='nav-link' href='login.php'>Home</a>";
	          		}
	          		else {
	            		echo "<a class='nav-link' href='index.html'>Home</a>";
	            	}
	            ?>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="cars.php">Cars</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">About Us</a>
	          </li>
	          <li class="nav-item active">
	          	<?php
	          		if (isset($_SESSION["name"])){
	          			echo '<div class="dropdown show">';
	          			echo   '<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
	          			echo    		$_SESSION["name"];
	          			echo  	'</a>';
	          			echo  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
	          			echo    '<a class="dropdown-item" href="rides.php">My Rides</a>';
	          			echo    '<a class="dropdown-item" href="logout.php">Logout</a>';
	          			echo  '</div>';
	          			echo '</div>';
	          		}
	          		else {
						echo '<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal" style="border: 1px solid rgba(255,255,255,.75); border-radius: 7px;">LOGIN</a>';
					}
				?>
	          </li>
	    </ul>
	  </div>
	</nav>
	<!-- Modals -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
	      </div>
	      <div class="modal-body">
	        <form action="login.php" method="post">
	          <div class="form-group">
	            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID" required>
	          </div>
	          <div class="form-group">
	            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
	          </div>
	          <button type="submit" class="btn btn-primary">Login</button>
	          <br>
	          <span style="padding-top: 10px;">Don't have an account? </span>
	          <a class="form-toggle" href="" data-toggle="modal" data-target="#signupModal" data-dismiss="modal">Sign Up</a>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">SIGNUP</h5>
	      </div>
	      <div class="modal-body">
	        <form action="signup.php" method="post">
	          <div class="form-group">
	          	<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
	          </div>
	          <div class="form-group">
	          	<input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
	          </div>
	          <div class="form-group">
	            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ID" required>
	          </div>
	          <div class="form-group">
	            <input type="password" name="password" id="psw" pattern=".{8,}" title="Must contain minimum 8 characters" class="form-control" placeholder="Enter Password" required>
	          </div>
	          <button type="submit" class="btn btn-primary">Sign up</button>
	          <br>
	          <a class="form-toggle" href="" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Back to Login</a>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="container" style="margin-bottom: 70px;">
		<div class="journey" style="margin-top: 70px; text-align: center;">
			<h3 style="text-align: center; align-self: center;">Journey Details</h3>
			<br><br>
		</div>
		<div class="row justify-content-center">
		    <div class="col-8">
		      <b>From: </b><script type="text/javascript">
		      	document.write(startAdd);
		      </script> 
		    </div>
		</div>
		<br>
		<div class="row justify-content-center">
		    <div class="col-8">
		      <b>To: </b><script type="text/javascript">
		      	document.write(destAdd);
		      </script> 
		    </div>
		</div>
		<br>
		<div class="row justify-content-center">
		    <div class="col-4">
		      <b>Start Date & Time: </b><script type="text/javascript">
		      	document.write(startDT);
		      </script> 
		    </div>
		    <div class="col-4">
		      <b>End Date & Time: </b><script type="text/javascript">
		      	document.write(dropDT);
		      </script> 
		    </div>
		</div>
		<br>
		<div class="row justify-content-center">
		    <div class="col-4">
		      <div>
		      	<p style="float: left;"><b>Total Distance: </b></p>
		      	<p id="dist1"></p>
		      </div>
		    </div>
		    <div class="col-4">
		      <div>
		      	<p style="float: left;"><b>Total Fare: </b></p>
		      	<p id="dist2"></p>
		      </div>
		    </div>
		</div>
		<br>
		<div class="rides" style="margin-top: 70px; text-align: center;">
			<h3 style="text-align: center; align-self: center;">Ride Details</h3>
			<br><br>
		</div>
		<div class="row justify-content-center" style="text-align: center;">
		    <div class="col-3">
		      <b>Car Name: </b><?php echo $car_name; ?> 
		    </div>
		    <div class="col-3">
		      <b>Car No.: </b><?php echo $car_no; ?> 
		    </div>
		</div>
		<br>
		<div class="row justify-content-center" style="text-align: center;">
		    <div class="col-3">
		      <b>Category: </b><?php echo $category; ?> 
		    </div>
		    <div class="col-3">
		      <b>Capacity: </b><?php echo $seats; ?> 
		    </div>
		</div>

	<!--<div class="container" style="margin-top: 70px; margin-bottom: 70px; text-align: center; background-color: transparent;">
		<div class="journey" style="text-align: center;">
			<h3 style="text-align: center; align-self: center;">Journey Details</h3>
			<br><br>
			<div class="details" style="margin-left: 150px; text-align: center;">
				<h5 style="float: left;">From: </h5>
				<p style="float: left; padding-left: 10px;">
					<script type="text/javascript">
						document.write(startAdd);
					</script>
				</p>
				<br>
				<br>
				<h5 style="float: left;">To: </h5>
				<p style="float: left; padding-left: 10px;">
					<script type="text/javascript">
						document.write(destAdd);
					</script>
				</p>
				<br>
				<br>
				<h5 style="float: left;">Start Date & Time: </h5>
				<p style="float: left; padding-left: 10px;">
					<script type="text/javascript">
						document.write(startDT);
					</script>
				</p>
				<h5 style="float: left; padding-left: 100px;">End Date & Time: </h5>
				<p style="float: left; padding-left: 10px;">
					<script type="text/javascript">
						document.write(dropDT);
					</script>
				</p>
				<br>
				<br>
				<h5 style="float: left;">Total Distance: </h5>
				<p style="float: left; padding-left: 10px;" id = "dist1">
				</p>
				<h5 style="float: left; padding-left: 210px;">Total Amount: </h5>
				<p style="float: left; padding-left: 10px;" id="dist2">
				</p>
			</div>
		</div>
		<br><br><br>
		<div class="ride" style="text-align: center;">
			<h3 style="text-align: center; align-self: center;">Ride Details</h3>
			<br><br>
			<div class="details" style="margin-left: 250px; text-align: center;">
				<h5 style="float: left; text-align: center;">Car Name: </h5>
				<p style="float: left; padding-left: 10px;"> <?php echo $car_name; ?> </p>
				<h5 style="float: left; padding-left: 150px;">Car Number: </h5>
				<p style="float: left; padding-left: 10px;"> <?php echo $car_no; ?> </p>
				<br>
				<br>
				<h5 style="float: left;">Category: </h5>
				<p style="float: left; padding-left: 10px;"> <?php echo $category; ?></p>
				<h5 style="float: left; padding-left: 165px;">Capacity: </h5>
				<p style="float: left; padding-left: 10px;"> <?php echo $seats; ?> seats</p>
			</div>
		</div>-->
		<br><br><br>
		<form action="confirm.php" style="text-align: center;" name="myForm" onsubmit="return checkEmail()" method="post">
			<?php 
				if(isset($_SESSION['email']))
					$email = $_SESSION['email'];
				else 
					$email = '';
			?>
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="reg_no" value="<?php echo $reg; ?>">
			<input type="hidden" name="source" value="" id="src">
			<input type="hidden" name="dest" value="" id="dest">
			<input type="hidden" name="start_time" value="" id="st_time">
			<input type="hidden" name="end_time" value="" id="end_time">
			<input type="hidden" name="round_trip" value="" id="rnd_trp">
			<input type="hidden" name="tot_dist" value="" id="tot_dist">
			<input type="hidden" name="tot_amt" value="" id="tot_amt">
			<button type="submit" class="btn btn-primary">Confirm Booking</button>
		</form>
	</div>
</body>
<script type="text/javascript">
	document.getElementById("src").value = startAdd;
	document.getElementById("dest").value = destAdd;
	document.getElementById("st_time").value = startDT;
	document.getElementById("end_time").value = dropDT;
	document.getElementById("rnd_trp").value = roundTrip;
	var distKM = undefined;
	var fare_dist = undefined;
	var amount = undefined;
	var d1 = document.getElementById('dist1');
	var d2 = document.getElementById('dist2');
	function initMap(){
	            srcLocation = new google.maps.LatLng(startLat,startLng);
	            dstLocation = new google.maps.LatLng(destLat,destLng);
	            var distance = google.maps.geometry.spherical.computeDistanceBetween(srcLocation, dstLocation);

				distKM = parseInt(distance/1000);
				if (roundTrip == "TRUE") {
					distKM = distKM * 2;
				}
	            var startD;
	            var startM;
	            var startY;
	            var endD;
	            var endM;
	            var endY;
	            startD = startDT.split('/');
	            startM = Number(startD[1]);
	            startY = startD[2];
							startY = startY.split(' ');
							startY = Number(startY[0]);
	            startD = Number(startD[0]);
	            endD = dropDT.split('/');
	            endM = Number(endD[1]);
	            endY = endD[2];
							endY = endY.split(' ');
							endY = Number(endY[0]);
	            endD = Number(endD[0]);
	            var days = 0;
	            if (startY < endY) {
	            	days = 31 - startD + endD;
	            }
	            else {
	            	if(startM < endM ) {
	            		if(startM=='04'|| startM=='06'|| startM=='09'|| startM=='11') {
	            			days = 30 - startD + endD;
	            		}
	            		else if(startM=='02') {
	            			days = 28 - startD + endD;
	            		}
	            		else {
	            			days = 31 - startD + endD;
	            		}
	            	}
	            	else {
	            		days = endD - startD;
	            	}
	            }
	            amount = ((days*2) - 1) * 500;
							//alert(distKM); // Distance in Kms.
	            d1.innerHTML = distKM+" KM";
	            fare_dist = distKM - 300;
	            if (fare_dist > 0)
	            	amount += <?php echo $base_fare; ?> + (fare_dist * <?php echo $price; ?>);
	            else
	            	amount += <?php echo $base_fare; ?>;
	            //amount = distKM * <?php echo $price; ?>;
	            d2.innerHTML =" Rs. " + amount;
	            document.getElementById("tot_dist").value = distKM;
	            document.getElementById("tot_amt").value = amount;
	        }
    function checkEmail() {
    	var x = document.forms["myForm"]["email"].value
    	if (x === '') {
    		alert("Please Login to continue");
    		return false;
    	}
    	return true;
    }
</script>
</html>