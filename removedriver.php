<?php
	include("config.php");

	$lic_no = $_POST["lic_no"];
	$sql = "DELETE FROM drivers WHERE license_no = '$lic_no'";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>";
		echo "alert('Driver removed successfully')"; 
		echo "</script>";
	} else {
	  echo "<script type='text/javascript'>";
	  echo "alert('ERROR! Could not remove driver')"; 
	  echo "</script>";
  	}

  	mysqli_close($conn);
  
  	echo "<script>location.href='admin.php'</script>";
?>