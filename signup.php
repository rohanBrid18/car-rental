<?php 
  include("config.php");

  $name = $_POST["name"];
  $phone = "91".$_POST["phone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name, phone, email, password)
  VALUES ('$name', '$phone', '$email', '$hashed_password')";

  if (mysqli_query($conn, $sql)) {
      echo "<script type='text/javascript'>";
      echo "alert('Sign Up Sucessfull! Please Login to continue')"; 
      echo "</script>";
  } else {
      echo "<script type='text/javascript'>";
      echo "alert('Sign Up Failed! Please try again')";
      echo "</script>";
  }

  mysqli_close($conn);

  echo "<script>location.href='index.html'</script>";
?>
</html>