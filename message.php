<?php
	//session_start();
	include ("config.php");

	$email = $_SESSION['email'];
	$sql = "SELECT u.phone, b.reg_no FROM users u, book_car b WHERE u.email = '$email' AND b.email = '$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$phone = $row['phone'];
	    	$reg = $row['reg_no'];
	    }
	}

	// Authorisation details.
	/*$username = "bridrohan1122@gmail.com";
	$hash = "d57d7096abd8ab30dd46873f300346110b3980bb550061336bbfea64e289ca3c";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$info = "1";
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $phone; // A single number or a comma-seperated list of numbers
	$message = "Your ride is booked. Car no.: ".$reg.". Enjoy the ride!";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&info=".$info."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);*/
?>