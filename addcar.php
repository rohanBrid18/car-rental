<?php
	include("config.php");

	$car_name = $_POST["car_name"];
	$reg_no = $_POST["reg_no"];
	$category = $_POST["category"];
	$seats = $_POST["seats"];
	$base_fare = $_POST["base_fare"];
	$price = $_POST["price"];
	$puc = $_POST["puc"];
	$ins = $_POST["ins"];
	$permit = $_POST["permit"];
	$image_path = $_POST["image_path"];

	$sql = "INSERT INTO cars (name,reg_no,category,seats,base_fare,price,image,puc_expiry,ins_expiry,permit)
	VALUES ('$car_name', '$reg_no', '$category', $seats, $base_fare, $price, '$image_path', '$puc', '$ins', '$permit')";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>";
		echo "alert('New Car added successfully')"; 
		echo "</script>";
	} else {
	  echo "<script type='text/javascript'>";
	  echo "alert('ERROR! Could not add car')"; 
	  echo "</script>";
  }

  mysqli_close($conn);
  
  echo "<script>location.href='admin.php'</script>";
?>