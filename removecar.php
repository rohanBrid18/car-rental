<?php
	include("config.php");

	$reg_no = $_POST["reg_no"];
	$sql = "DELETE FROM cars WHERE reg_no = '$reg_no'";

	if (mysqli_query($conn, $sql)) {
		echo "<script type='text/javascript'>";
		echo "alert('Car removed successfully')"; 
		echo "</script>";
	} else {
	  echo "<script type='text/javascript'>";
	  echo "alert('ERROR! Could not remove car')"; 
	  echo "</script>";
  	}

  	mysqli_close($conn);
  
  	echo "<script>location.href='admin.php'</script>";
?>