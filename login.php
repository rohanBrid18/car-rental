<?php
	// Start the session
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Rental in Mumbai | Car Hire</title>
	<meta name="description" content="Book cars for hire in Mumbai. Rent a car. Flexible Tariffs | Wide Range of Cars | Professional Drivers | Home Delivery Available.">
	<meta name="keywords" content="adhiraj tours and travles, car rental, car rental in mumbai, tours and travels, car hire, renting a car, renting a car in mumbai">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css"/>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: lightgrey;
		}
		div.background_image{
			height: 510px;
			background-image: url(images/cover_car.jpg);
			align-content: center;
		}
		div.page-content{
			padding-top: 40px;
			text-align: center;
			color: #333;
		}
		div.services{
			text-align: center;
			padding-top: 20px;
			padding-bottom: 30px;
		}
		div.container{
			padding-bottom: 50px;
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
		<?php
			if (isset($_SESSION["name"])) {
				echo "<a class='navbar-brand' href='login.php'>";
			}
			else {
	  		echo "<a class='navbar-brand' href='index.html'>";
	  	}
	  ?>
			<img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			ADHIRAJ TOURS AND TRAVELS
		</a>
		<div style="position:fixed;bottom:0;right:0;">
		<div style="padding-right:7px; ">Visitor Count </div>
		<div> 
				<a href="" target="_blank" title="Web Counter">
					<img src="https://smallseotools.com/counterDisplay?code=6cd8d565371547a218d900939ea22a7c&style=0013&pad=6&type=page&initCount=1"  title="Web Counter" Alt="Web Counter" border="0">
					</a>
		</div>
	</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	    <ul class="navbar-nav">
	          <li class="nav-item active">
	            <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="car.php">Cars</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="about_us.php">About Us</a>
	          </li>
	          <li class="nav-item">
	          	<?php
	            	include("config.php");

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
	            		$_SESSION['email'] = $_POST["email"];
	            		$_SESSION['password'] = $_POST["password"];
	            		$status = 0;
           		    	if ($_SESSION['email'] == 'admin@adhiraj.com' && $_SESSION['password'] == 'admin')
           		    		echo "<script>location.href='admin.php'</script>";
	            		$sql = "SELECT * FROM users";
	            		$result = mysqli_query($conn, $sql);

	            		if (mysqli_num_rows($result) > 0) {
	            		    while($row = mysqli_fetch_assoc($result)) {
	            		    	if ($row["email"] == $_SESSION['email'] && password_verify($_SESSION['password'], $row["password"])) {
	            		    		$status++;
	            					$_SESSION["name"] = $row["name"];
	            					echo "<script>location.href='login.php'</script>";
	            				}
	            		    }
	            		}
	            		if ($status == 0) {
            				echo "<script type='text/javascript'>";
            				echo "alert('Login Failed! Please enter correct Email ID and Password')";
            				echo "</script>";
            				echo "<script>location.href='index.html'</script>";
            			}
	            	}
	            	
	            	mysqli_close($conn);
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
	            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
	          </div>
	          <button type="submit" class="btn btn-primary" onclick="window.location.href='index.html'">Sign up</button>
	          <br>
	          <a class="form-toggle" href="" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Back to Login</a>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="background_image">
		<div class="page-content">
			<h1>Enjoy the Ride in City and Outstation</h1>
			<br>
			<button type="button" class="btn btn-outline-success btn-lg" onclick="window.location.href='step1.php'">
				START YOUR WONDERFUL JOURNEY
			</button>
		</div>
	</div>
	<br>
	<div class="services">
		<h3>OUR SERVICES</h3>
	</div>
	<div class="container">
		<div class="card-deck">
		    <div class="card">
		      <img class="card-img-top" src="images/fuel.png" alt="Card image cap" height="250px">
		      <div class="card-body text-center">
		      	<p><font color="teal" size="4"><b>Fuel Cost Included</b></font></p>
				<p class="card-text">Don't worry about mileage! All the fuel costs are included. If the car needs to refuelled during the journey, we will incur the fuel charges.</p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" src="images/hiddencharges.jpg" alt="Card image cap" height="250px">
		      <div class="card-body text-center">
		      	<p><font color="teal" size="4"><b>No Hidden Charges</b></font></p>
		        <p class="card-text">Our charges include fuel charges, taxes, insurance, toll charges and parking charges. Once you book the car, you don't have to pay extra money.</p>
		      </div>
		    </div>
		    <div class="card">
		      <img class="card-img-top" src="images/cartypes.png" alt="Card image cap" height="250px">
		      <div class="card-body text-center">
		      	<p><font color="teal" size="4"><b>A Car For Every Need</b></font></p>
		        <p class="card-text">We have a wide range of cars from hatchbacks to sedans and SUVs. Select a car of your comfort and enjoy our services.</p>
		      </div>
		    </div>
		</div>
	</div>
	<br>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 1200px; margin: auto; padding-bottom: 50px;">
	  	<div class="carousel-inner">
	  		<div class="carousel-item active">
	  		   <img class="d-block w-100" src="images/background.jpg" height="600px" alt="First slide">
	  		   <div class="carousel-caption d-none d-md-block fixed-top" style="color: teal; padding-top: 150px;">
	  		      <h1><b>
	  		      	Variety of Cars 
	  		      	<br>
	  		      	to Choose From
	  		      </b></h1>
	  		    </div>
	  		</div>
	  	  <div class="carousel-item">
	  	    <img class="d-block w-100" src="images/hatchback.jpg" height="600px" alt="Second slide">
	  	    <div class="carousel-caption d-none d-md-block fixed-top" style="color: white; outline: 2px solid black;">
	  	        <h1><b>HATCHBACK</b></h1>
	  	        <h3>
	  	        	Want a quick ride? 
	  	        	<br>
	  	        	Book a hatchback at just Rs. 12/km
	  	        	</b>
	  	 		  </h3>
	  	      </div>
	  	  </div>
	  	  <div class="carousel-item">
	  	    <img class="d-block w-100" src="images/Sedan_img.jpg" height="600px" alt="Third slide">
	  	    <div class="carousel-caption d-none d-md-block fixed-top" style="color: yellow;">
	  	        <h1><b>SEDAN</b></h1>
	  	        <h3>
	  	        	<b>
	  	        	Grab a dinner and watch a movie
	  	        	<br>
	  	        	Book a sedan at just Rs. 15/km
	  	        	</b>
	  	        </h3>
	  	      </div>
	  	  </div>
	  	  <div class="carousel-item">
	  	    <img class="d-block w-100" src="images/suv.jpg" height="600px" alt="Fourth slide">
	  	    <div class="carousel-caption d-none d-md-block fixed-top" style="color: #333;">
	  	        <h1><b>SUV</b></h1>
	  	        <h3>
	  	        	<b>
	  	        	Head outstation with family
	  	        	<br>
	  	        	Book a SUV at just Rs. 20/km
	  	        	</b>
	  	        </h3>
	  	      </div>
	  	  </div>
	  	</div>
	  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	  	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  	  <span class="sr-only">Previous</span>
	  	</a>
	  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	  	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  	  <span class="sr-only">Next</span>
	  	</a>
	</div>
	<div class="services" style="background-color: lightyellow">
		<h3>HOW IT WORKS</h3>
		<br>
		<div class="container">
			<div class="card-deck">
			    <div class="card">
			      <div class="card-body text-center">
			      	<p><font color="teal" size="4">Log In or Sign Up</font></p>
					<p class="card-text">Login or signup using your google account or mobile number.</p>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-body text-center">
			      	<p><font color="teal" size="4">Book</font></p>
			        <p class="card-text">Select date, time, destination and book the appropriate car.</p>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-body text-center">
			      	<p><font color="teal" size="4">Travel</font></p>
			        <p class="card-text">Relax and travel to your destination.</p>
			      </div>
			    </div>
			    <div class="card">
			      <div class="card-body text-center">
			      	<p><font color="teal" size="4">Payment</font></p>
			        <p class="card-text">Pay directly to the driver in cash.</p>
			      </div>
			    </div>
			</div>
		</div>
		<br>
		<a href="about_us.php"><font size="6">Help and Support</font></a>
	</div>
	<div class="footer">
		<a class="logo" href="index.html" style="color: white;">
			<img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<br>
			<h5>ADHIRAJ TOURS AND TRAVELS</h5>
		</a>
		<br>
		<h5>Company</h5>
		<a href="about_us.php" style="color: white;">About Us</a>
		<br>
		<a href="#" style="color: white;">Privacy Policy</a>
		<br>
		<a href="#" style="color: white;">Terms of Use</a>	
	</div>
</body>
<script type="text/javascript">

</script>
</html>