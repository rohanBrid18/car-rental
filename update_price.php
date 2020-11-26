<?php
	include("config.php");

	$category = $_POST["category"];
	$new_baseprice = $_POST["new_baseprice"];
	$new_price = $_POST["new_price"];

	if ($new_price == NULL) {
		$sql = "UPDATE cars
		SET base_fare = $new_baseprice
		WHERE category = '$category'";

		if (mysqli_query($conn, $sql)) {
			echo "<script type='text/javascript'>";
			echo "alert('Base Price updated successfully')"; 
			echo "</script>";
		} else {
		  echo "<script type='text/javascript'>";
		  echo "alert('ERROR! Could not update price')"; 
		  echo "</script>";
			}
	}

	if ($new_baseprice == NULL) {
		$sql = "UPDATE cars
		SET price = $new_price
		WHERE category = '$category'";

		if (mysqli_query($conn, $sql)) {
			echo "<script type='text/javascript'>";
			echo "alert('Price per Km updated successfully')"; 
			echo "</script>";
		} else {
		  echo "<script type='text/javascript'>";
		  echo "alert('ERROR! Could not update price')"; 
		  echo "</script>";
	  	}
	}
	
  	mysqli_close($conn);
  
  	echo "<script>location.href='admin.php'</script>";
?>