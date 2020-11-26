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
			background-color: #f4f5f7;
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
	          <li class="nav-item active">
	            <a class="nav-link" href="cars.php">Cars<span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="about_us.php">About Us</a>
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
	          		}
	          		else {
						echo '<a class="nav-link" href="" data-toggle="modal" data-target="#loginModal" style="border: 1px solid rgba(255,255,255,.75); border-radius: 7px;">LOGIN</a>';
					}
				?>
	          </li>
	    </ul>
	  </div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left: 100px; padding-top: 10px;">
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="">All Cars<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Sort by
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="sort_price.php">Price</a>
	          <a class="dropdown-item" href="sort_capacity.php">Capacity</a>
	        </div>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="car_name" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search car</button>
	    </form>
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
	          <button type="submit" class="btn btn-primary">Sign up</button>
	          <br>
	          <a class="form-toggle" href="" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Back to Login</a>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
		<div class="container" style="margin-top: 50px; width: 950px; height: 2000px; text-align: center;">
		  <h1 style="color: teal;"><b>A Car For Every Need!</b></h1>
		  <?php
		  include("config.php");

		  $sql = "SELECT * FROM cars";
		  $result = mysqli_query($conn, $sql);

		  if (mysqli_num_rows($result) > 0) {
		  	  $count = 0;
		      // output data of each row
		      while($row = mysqli_fetch_assoc($result)) {
		      	$reg_no[] = $row['reg_no'];
		        $image_path = $row['image'];
		        if ($count%3 == 0) {
		        	echo '<br>';
		        	echo '<br>';
		        }
		        echo  '<div class="card" style="width: 280px; float: left; margin-right: 25px; margin-bottom: 25px;">'
		        	    ."<img class='card-img-top' src='images/$image_path' alt='Card image cap' height='180px'>"
		        	    .'<div class="card-body">'
		        	      .'<h4 class="card-title text-center" style="color: orange">'. $row["name"] . '</h4>'
		        	      .'<p class="card-text">'
		        	      	.'<div class="features" style="color: black">'
		        	      		.'<span class="iconic"><img src="images/seat.png" alt="people"></span>'
		        	      		.'<span class="icon"><font size="3">'. $row["seats"] . " seater". '</font></span>'
		        	      	.'</div>'
		        	      	.'<div class="features" style="color: black">'
		        	      		.'<span class="iconic"><img src="images/wheel.png" alt="people"></span>'
		        	      		.'<span class="icon"><font size="3">'. $row["category"] . '</font></span>'
		        	      	.'</div>'
		        	      	.'<br>'
		        	      	.'<br>'
		        	      	.'<h6 class="text-center" style="color: black">'. "Rs. " . $row["price"] . "/km". '</h6>'
		        	 		.'<br>'
		        	 		.'<br>'
		        			.'<button type="button" class="btn btn-warning" onclick="window.location.href=`step1.php`">BOOK NOW</button>'
		        	      .'</p>'
		        	    .'</div>'
		        	  .'</div>';
		        $count++;
		      }
		  } else {
		      echo "<h4>Currently No Cars are Available. Please try again later.</h4>";
		  }

		  mysqli_close($conn);
		  ?>
		</div>
</body>
</html>