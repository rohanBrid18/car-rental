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
	          <li class="nav-item active">
	            <a class="nav-link" href="">Cars<span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="drivers.php">Drivers</a>
	          </li>
	          <li class="nav-item">
	          	<a class="nav-link" href="logout.php">LOGOUT</a>
	          </li>
	    </ul>
	  </div>
	</nav>
	  <div class="container" style="margin-top: 50px; width: 950px; height: auto; text-align: center;">
	  <?php

  	  include("config.php");

	  $sql = "SELECT name, reg_no, seats, category, price, image FROM cars";
	  $result = mysqli_query($conn, $sql);
	  

	  if (mysqli_num_rows($result) > 0) {
	  	  $count = 0;
	      // output data of each row
	      while($row = mysqli_fetch_assoc($result)) {
	      	$name = $row['name'];
	      	$seats = $row['seats'];
	      	$category = $row['category'];
	      	$price = $row['price'];
	        $image_path = $row['image'];
	        $reg_no[] = $row['reg_no'];
	        if ($count%3 == 0) {
	        	echo '<br>';
	        	echo '<br>';
	        }
	        echo  '<div class="card" style="width: 280px; float: left; margin-right: 25px; margin-bottom: 25px;">'
		            ."<img class='card-img-top' src='images/$image_path' alt='Card image cap' height='180px'>"
		            .'<div class="card-body">'
		              .'<h4 class="card-title text-center" style="color: orange">' . $name . '</h4>'
		              .'<p class="card-text">'
		              	.'<h6 class="text-center" style="color: black">' . $reg_no[$count] . '</h6>'
		              	.'<br>'
		              	.'<div class="features" style="color: black">'
		              		.'<span class="iconic"><img src="images/seat.png" alt="people"></span>'
		              		.'<span class="icon"><font size="3">' . $seats . " seater" . '</font></span>'
		              	.'</div>'
		              	.'<div class="features" style="color: black">'
		              		.'<span class="iconic"><img src="images/wheel.png" alt="people"></span>'
		              		.'<span class="icon"><font size="3">' . $category . '</font></span>'
		              	.'</div>'
		              	.'<br>'
		              	.'<br>'
		              	.'<h6 class="text-center" style="color: black">' . "Rs. " . $price . "/km" . '</h6>'
              	 		.'<br>'
              			.'<button type="button" class="btn btn-warning" onclick=set_num("'.$reg_no[$count].'")>Remove Car</button>'
		              .'</p>'
		            .'</div>'
		          .'</div>';
	        $count++;
	      }
	  } else {
	      echo "No Cars Available";
	  }
	  
	  mysqli_close($conn);
	  ?>
	</div>
	<form action="removecar.php" method="post" id="remove_form">
		<input type="hidden" name="reg_no" value="" id="reg_no">
	</form>
</body>
<script type="text/javascript">
	function set_num(reg) {
		document.getElementById("reg_no").value = reg;
		document.getElementById("remove_form").submit();
	}
</script>
</html>