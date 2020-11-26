<?php
session_start();

include("config.php");

$sql = "SELECT sum(tot_amt) FROM book_car";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$sum = $row['sum(tot_amt)'];
	}
}
if (mysqli_query($conn, $sql)) {
	echo "<script type='text/javascript'>";
	echo "var total = $sum";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ERROR! Could not find total sales')";
	echo "</script>";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adhiraj Tours and Travels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form1").hide();
            // $("#form2").hide();
            $("#form3").hide();
            $("#form4").hide();
            $("#btn1").click(function() {
                // $("#form2").hide();
                $("#form3").hide();
                $("#form4").hide();
                $("#form1").toggle();
            });
            // $("#btn2").click(function(){
            //     $("#form1").hide();
            //     $("#form3").hide();
            //     $("#form4").hide();
            //     $("#form2").toggle();
            // });
            $("#btn3").click(function() {
                $("#form1").hide();
                // $("#form2").hide();
                $("#form4").hide();
                $("#form3").toggle();
            });
            $("#btn4").click(function() {
                $("#form1").hide();
                // $("#form2").hide();
                $("#form3").hide();
                $("#form4").toggle();
            });
        });
    </script>
    <script type="text/javascript">
        function tot_sales() {
            alert("Total Sales: " + total);
        }
    </script>
    <style type="text/css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="">Admin Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_cars.php">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="drivers.php">Drivers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 50px;">
        <div class="buttons" style="float: left;">
            <div class="btn-group btn-group-lg btn-group-vertical" role="group" aria-label="Basic example">
                <button type="button" id="btn1" class="btn btn-info">Add Cars</button>
                <button type="button" id="btn2" class="btn btn-info" onclick="window.location.href='admin_cars.php'">Remove Cars</button>
                <button type="button" id="btn3" class="btn btn-info">Update Price</button>
                <button type="button" id="btn4" class="btn btn-info">Add Driver</button>
                <button type="button" id="btn5" class="btn btn-info" onclick="window.location.href='drivers.php'">Remove Driver</button>
                <button type="button" id="btn6" class="btn btn-info" onclick="tot_sales()">Total Sales</button>
            </div>
        </div>
        <div class="form" style="float: left; padding-left: 70px; width: 500px; margin-right: 40%;">
            <form id="form1" action="addcar.php" method="post">
                <div class="form-group">
                    <input type="text" name="car_name" class="form-control" placeholder="Enter Car Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="reg_no" class="form-control" placeholder="Enter Registration Number" required>
                </div>
                <label for="category">Select Category</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category1" value="Hatchback">
                    <label class="form-check-label" for="category1">
                        Hatchback
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category2" value="Sedan">
                    <label class="form-check-label" for="category2">
                        Sedan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category3" value="SUV">
                    <label class="form-check-label" for="category3">
                        SUV
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category4" value="Mini Bus">
                    <label class="form-check-label" for="category4">
                        Mini Bus
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category5" value="Bus">
                    <label class="form-check-label" for="category5">
                        Bus
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="seats" class="form-control" placeholder="Enter Number of Seats" required>
                </div>
                <div class="form-group">
                    <input type="text" name="base_fare" class="form-control" placeholder="Enter Base Fare" required>
                </div>
                <div class="form-group">
                    <input type="text" name="price" class="form-control" placeholder="Enter Price per Km" required>
                </div>
                <div class="form-group">
                    <input type="text" name="puc" class="form-control" placeholder="Enter PUC expiry date">
                </div>
                <div class="form-group">
                    <input type="text" name="ins" class="form-control" placeholder="Enter Insurance expiry date">
                </div>
                <div class="form-group">
                    <input type="text" name="permit" class="form-control" placeholder="Enter Permit number">
                </div>
                <div class="form-group">
                    <label>Enter Image Path</label>
                    <input type="file" class="form-control-file border" name="image_path" id="choose_image">
                </div>
                <button type="submit" class="btn btn-primary">Add Car</button>
                <br><br><br><br>
            </form>
            <!-- <form id="form2" action="removecar.php" method="post">
				<div class="form-group">
				  <label for="reg_no">Enter Registration Number of Car to be Removed</label>
				  <input type="text" name="reg_no" class="form-control" placeholder="" required>
				</div>
				<button type="submit" class="btn btn-primary">Remove Car</button>
				<br><br><br><br>
			</form> -->
            <form id="form3" action="update_price.php" method="post">
                <label for="category">Select Category</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category1" value="Hatchback">
                    <label class="form-check-label" for="category1">
                        Hatchback
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category2" value="Sedan">
                    <label class="form-check-label" for="category2">
                        Sedan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category3" value="SUV">
                    <label class="form-check-label" for="category3">
                        SUV
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category4" value="Mini Bus">
                    <label class="form-check-label" for="category4">
                        Mini Bus
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category" id="category5" value="Bus">
                    <label class="form-check-label" for="category5">
                        Bus
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="new_baseprice" class="form-control" placeholder="Enter New Base Price">
                </div>
                <div class="form-group">
                    <input type="text" name="new_price" class="form-control" placeholder="Enter New Price per Km">
                </div>
                <button type="submit" class="btn btn-primary">Update Price</button>
                <br><br><br><br>
            </form>
            <form id="form4" action="adddriver.php" method="post">
                <div class="form-group">
                    <input type="text" name="driver_name" class="form-control" placeholder="Enter Driver Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                    <input type="text" name="lic_no" class="form-control" placeholder="Enter License Number" required>
                </div>
                <div class="form-group">
                    <input type="text" name="pan" class="form-control" placeholder="Enter Pan Number">
                </div>
                <div class="form-group">
                    <input type="text" name="aadhar" class="form-control" placeholder="Enter Aadhar Number">
                </div>
                <div class="form-group">
                    <label>Enter Image Path</label>
                    <input type="file" class="form-control-file border" name="image_path" id="choose_image">
                </div>
                <button type="submit" class="btn btn-primary">Add Driver</button>
                <br><br><br><br>
            </form>
        </div>
        <div class="booking" style="margin-left: 200px; text-align: center;">
            <?php 
						include("config.php");

						$sql = "SELECT * FROM book_car b, cars c WHERE b.reg_no=c.reg_no AND driver IS NULL";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							$count = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$book_id[] = $row['book_id'];
								$reg_no[] = $row['reg_no'];
								$src = $row['source'];
								$dest = $row['dest'];
								$start_date = $row['start_time'];
								$end_date = $row['end_time'];
								$tot_dist = $row['tot_dist'];
								$tot_amt = $row['tot_amt'];
								$seats = $row['seats'];
								$name = $row['name'];
								$image_path = $row['image'];
								echo  '<div class="card" style="width: 280px; float: left; margin-right: 25px; margin-bottom: 25px;">'
									. "<img class='card-img-top' src='images/$image_path' alt='Card image cap' height='180px'>"
									. '<div class="card-body">'
									. '<h4 class="card-title text-center" style="color: orange">' . $row["name"] . '</h4>'
									. '<p class="card-text">'
									. '<div class="features" style="color: black">'
									. '<span class="iconic"><img src="images/seat.png" alt="people"></span>'
									. '<span class="icon"><font size="3">' . $row["seats"] . " seater" . '</font></span>'
									. '</div>'
									. '<div class="features" style="color: black">'
									. '<span class="iconic"><img src="images/wheel.png" alt="people"></span>'
									. '<span class="icon"><font size="3">' . $row["category"] . '</font></span>'
									. '</div>'
									. '</p>'
									. '<button type="button" class="btn btn-warning" onclick=set_id("' . $book_id[$count] . '")>Allot Driver</button>'
									. '</div>'
									. '</div>'
									. '<div class="journey">'
									. '<h3 style="text-align: center; align-self: center;">Ride Details</h3>'
									. '</div>'
									. '<br><br>'
									. '<div class="row justify-content-center">'
									. '<div class="col-12" style="text-align: left">'
									. '<b>' . 'From: ' . '</b>' . $src
									. '</div>'
									. '</div>'
									. '<br>'
									. '<div class="row justify-content-center">'
									. '<div class="col-12" style="text-align: left">'
									. '<b>' . 'To: ' . '</b>' . $dest
									. '</div>'
									. '</div>'
									. '<br>'
									. '<div class="row justify-content-center">'
									. '<div class="col-6" style="text-align: left">'
									. '<b>' . 'Start Date & Time: ' . '</b>' . $start_date
									. '</div>'
									. '<div class="col-6" style="text-align: left">'
									. '<b>' . 'End Date & Time: ' . '</b>' . $end_date
									. '</div>'
									. '</div>'
									. '<br>'
									. '<div class="row justify-content-center">'
									. '<div class="col-6" style="text-align: left">'
									. '<b>' . 'Total Distance: ' . '</b>' . $tot_dist
									. '</div>'
									. '<div class="col-6" style="text-align: left">'
									. '<b>' . 'Total Amount: ' . '</b>' . $tot_amt
									. '</div>'
									. '</div>'
									. '<br>';

								//echo '</div>'
								echo '<br>' . '<br>' . '<br>' . '<br>' . '<br>' . '<br>' . '<br>';
								$count++;
							}
						} else {
							echo "<h3>No rides pending for Driver Allotment</h3>";
						}

						mysqli_close($conn);
						?>
        </div>
    </div>
    <form action="driver.php" method="post" id="driver_form">
        <input type="hidden" name="book_id" value="" id="book_id">
    </form>
</body>
<script type="text/javascript">
    function set_id(id) {
        document.getElementById("book_id").value = id;
        document.getElementById("driver_form").submit();
    }
</script>
</html> 