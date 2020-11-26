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
	            <a class="nav-link" href="car.php">Cars</a>
	          </li>
	          <li class="nav-item active">
	            <a class="nav-link" href="#">About Us</a>
	          </li>
	          <li class="nav-item">
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
	            	} else {
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
	<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
		<div class="aboutus" style="text-align: center;">
			<h1>Adhiraj Tours and Travels</h1>
			<br>
			<p>No more worries about petrol mileage, insurance, and car breakdowns! Adhiraj Tours and Travels has enabled driving convenience for travellers around the country and is fast expanding its reach to cities including Bangalore, Chandigarh, Chennai, Coimbatore, Delhi-NCR, Hyderabad, Jaipur, Kochi, Kolkata, Ludhiana, Mangalore, Mysore, Siliguri, Vizag, Udaipur, Vijayawada, Lucknow and Guwahati.
	Hired cars from Adhiraj Tours and Travels have given customers more control, privacy, and freedom. Book a car in any city you visit from our website on your phone and feel at home wherever you go.
			</p>
		</div>
		
		<br><br>
		<div class="help">
			<h3>Help and Support</h3>
			<br>
			<h6>FAQs</h6>
			<font size="+1">
				<pre>Q) What type of driver's do you provide?
   We provide skilled professional drivers with atleast 4 years of driving experience. Our drivers have a valid driving license
   and an identity proof.
				</pre>
				<pre>Q) What happens if I exceed my journey time?
   Standard hourly fee will be applicable per hour of delay. Weekend or weekday delays will be charged accordingly. Free KMs 
   will be given at 10 km per hour of delay.
				</pre>
				<pre>Q) Is there a km limit to how much I can travel in the given time period?
   Each reservation comes with 10 km/hr with a maximum daily driving limit of 240 km/day (24 hour period). For example, a 5 
   hour reservation would come with 50 km in driving at no additional charge while a 3 day reservation would come with 720 km 
   in driving at no additional charge.
				</pre>
			</font>
		</div>
		<div class="contact">
			<h3>Contact Us</h3>
			<br>
			<font size="+1">
				<p><span class="iconic"><img src="images/call.png" alt="people">  </span>7506190431, 8108069055</p>
				<p><span class="iconic"><img src="images/email.png" alt="people"></span><a href="#"> support@adhiraj.com </a></p>
			</font>
		</div>
	</div>
	<div class="footer">
		<a class="logo" href="index.html" style="color: white;">
			<img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			<br>
			<h5>ADHIRAJ TOURS AND TRAVELS</h5>
		</a>
		<br>
		<h5>Company</h5>
		<a href="#" style="color: white;">About Us</a>
		<br>
		<a href="#" style="color: white;">Privacy Policy</a>
		<br>
		<a href="#" style="color: white;">Terms of Use</a>	
	</div>
</body>
</html>