<?php
   // Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Rent a Car in Mumbai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 30px; padding-right: 30px;">
        <?php
        if (isset($_SESSION["name"])) {
          echo "<a class='navbar-brand' href='login.php'>";
        } else {
          echo "<a class='navbar-brand' href='index.html'>";
        }
        ?>
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        ADHIRAJ TOURS AND TRAVELS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class='nav-link' href='login.php'>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="car.php">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["name"])) {
                      echo '<div class="dropdown show">'
                        . '<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                        . $_SESSION["name"]
                        . '</a>'
                        . '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                        . '<a class="dropdown-item active" href="#">My Rides</a>'
                        . '<a class="dropdown-item" href="logout.php">Logout</a>'
                        . '</div>'
                        . '</div>';
                    } else {
                      echo "<a class='nav-link' href='#'>LOGIN</a>";
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top: 70px; margin-bottom: 70px; text-align: center; background-color: transparent;">
        <?php
        include("config.php");

        $email = $_SESSION['email'];
        date_default_timezone_set("Asia/Kolkata");
        $curr_date = date("d-m-Y H:i");
        $dateValue = strtotime($curr_date);
        $c_year = date('Y', $dateValue);
        $c_month = date('m', $dateValue);
        $sql = "SELECT * FROM book_car b, cars c WHERE email = '$email' AND b.reg_no=c.reg_no ORDER BY book_id DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $reg_no[] = $row['reg_no'];
            $src = $row['source'];
            $dest = $row['dest'];
            $start_date[] = $row['start_time'];
            $dt = DateTime::createFromFormat('d/m/Y H:i', $start_date[$count])->format('d-m-Y H:i');
            $dateValue = strtotime($dt);
            $s_year = date('Y', $dateValue);
            $s_month = date('m', $dateValue);
            $end_date = $row['end_time'];
            $tot_dist = $row['tot_dist'];
            $tot_amt = $row['tot_amt'];
            $driver[] = $row['driver'];
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
              . '</p>';
            if ($curr_date >= $start_date[$count]) {
              echo '<button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ride can\'t be cancelled once the journey has started" disabled onclick=set_num("' . $reg_no[$count] . '")>CANCEL RIDE</button>';
            } else if ($c_month > $s_month) {
              echo '<button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ride can\'t be cancelled once the journey has started" disabled onclick=set_num("' . $reg_no[$count] . '")>CANCEL RIDE</button>';
            } else if ($c_year > $s_year) {
              echo '<button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ride can\'t be cancelled once the journey has started" disabled onclick=set_num("' . $reg_no[$count] . '")>CANCEL RIDE</button>';
            } else {
              // echo '<button type="button" class="btn btn-warning" onclick=set_num("' . $temp[$count] . '")>CANCEL RIDE</button>';
              $temp = $reg_no[$count].",".$driver[$count].",";
              echo '<a type="button" class="btn btn-warning" href="" data-toggle="modal" data-target="#cancelModal">CANCEL RIDE</a>';
              echo '<div class="modal" id="cancelModal" tabindex="-1" role="dialog">'
                    .'<div class="modal-dialog" role="document">'
                    .  '<div class="modal-content">'
                    .      '<div class="modal-body">'
                    .          '<p>Are you sure you want to cancel this ride?</p>'
                    .      '</div>'
                    .      '<div class="modal-footer">'
                    .          '<button type="button" class="btn btn-primary" onclick=set_num("' . $temp . '")>Yes</button>'
                    .          '<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>'
                    .      '</div>'
                    .  '</div>'
                    .'</div>'
                    .'</div>';
            }
            echo  '</div>'
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
              . '<b>' . 'Start Date & Time: ' . '</b>' . $start_date[$count]
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
          echo "<h3>Currently you have no rides booked. <a href='step1.php'>BOOK NOW</a> </h3>";
        }
        ?>
    </div>
    <form action="cancel_ride.php" method="post" id="cancel_form">
        <input type="hidden" name="car_no" value="" id="reg_no">
        <input type="hidden" name="driver_id" value="" id="driver">
    </form>
</body>
<script type="text/javascript">
    function set_num(temp) {
        temp = temp.split(",");
        reg = temp[0];
        driver = temp[1];
        document.getElementById("reg_no").value = reg;
        document.getElementById("driver").value = driver;
        document.getElementById("cancel_form").submit();
    }
</script>

</html> 