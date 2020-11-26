<?php
	session_start();
	include ("config.php");

	$email = $_POST['email'];
	$reg_no = $_POST['reg_no'];
	$src = $_POST['source'];
	$dest = $_POST['dest'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$rnd_trip = $_POST['round_trip'];
	$tot_dist = $_POST['tot_dist'];
	$tot_amt = $_POST['tot_amt'];

	// echo $email;
	// echo $reg_no;
	// echo $src;
	// echo $dest;
	// echo $start_time;
	// echo $end_time;
	// echo $rnd_trip;
	// echo $tot_dist;
	// echo $tot_amt;

	$sql = "INSERT INTO book_car (email, reg_no, source, dest, start_time, end_time, round_trip, tot_dist, tot_amt)
	VALUES ('$email', '$reg_no', '$src', '$dest', '$start_time', '$end_time', $rnd_trip, $tot_dist, $tot_amt)";

	if (mysqli_query($conn, $sql)) {
		include ("message.php");

		echo "<script type='text/javascript'>";
		echo "alert('Your ride is booked. You will receive a confirmation message soon. Enjoy the Ride!')"; 
		echo "</script>";

		
			/*// Account details
			$apiKey = urlencode('3/2kNG2tYyw-ZiiYnhJ6JPLSSAE0W2KLffhFrHIHsu');
			
			// Message details
			$numbers = array(918123456789, 918987654321);
			$sender = urlencode('TXTLCL');
			$message = rawurlencode('This is your message');
		 
			$numbers = implode(',', $numbers);
		 
			// Prepare data for POST request
			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		 
			// Send the POST request with cURL
			$ch = curl_init('https://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			
			// Process your response here
			echo $response;*/

		echo "<script>location.href='login.php'</script>";
	}// else {
	//     echo "<script type='text/javascript'>";
	//     echo "alert('Failed to book. Please try again')";
	//     echo "</script>";
	//     echo "<script>location.href='step1.php'</script>";
	// }

	mysqli_close($conn);

?>