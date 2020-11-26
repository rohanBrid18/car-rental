<?php
	include("config.php");

	$driver_name = $_POST["driver_name"];
	$phone_no = $_POST["phone_no"];
	$address = $_POST["address"];
	$lic_no = $_POST["lic_no"];
	$pan = $_POST["pan"];
	$aadhar = $_POST["aadhar"];
	$image_path = $_POST["image_path"];

	$sql = "INSERT INTO drivers (name, phone, address, license_no, pan_no, aadhar_no, image)
	VALUES ('$driver_name', '$phone_no', '$address', '$lic_no', '$pan', '$aadhar', '$image_path')";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>";
		echo "alert('New Driver added successfully')"; 
		echo "</script>";
	} else {
	  echo "<script type='text/javascript'>";
	  echo "alert('ERROR! Could not add driver')"; 
	  echo "</script>";
  }

  mysqli_close($conn);
  
  echo "<script>location.href='admin.php'</script>";
?>