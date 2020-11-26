<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Adhiraj Tours and Travels
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <link rel="stylesheet" href="datepicker/css/datepicker.css">
        <link rel="stylesheet" href="datepicker/css/bootstrap.css">
        <script src="datepicker/js/bootstrap-datepicker.js"></script>
        <script>
            $(function(){
                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy"
                });
            });
        </script>
    </head>
    <body style="border:0px;margin:0px;">
        <div class="container" style="float:left;margin-right:10px;" id="Current:Step4">
            <div class="row bs-wizard" style="border-bottom:0;"> 
                <div class="col-sm-3 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 1</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step1.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Starting Point</div>
                </div>
                <div class="col-sm-3 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 2</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step2.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Destination Point</div>
                </div>
                <div class="col-sm-3 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 3</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step3.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Pickup Time</div>
                </div>             
                <div class="col-sm-3 bs-wizard-step active"><!-- active -->
                <div class="text-center bs-wizard-stepnum">Step 4</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step4.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Dropoff Time</div>
                </div>
            </div> 
        </div>
        <div class="homebutton" style="float:right;margin-right:10px;margin-left:10px;height: 140px;padding: 39px 50px;">
            <?php
                if (isset($_SESSION["name"])){
                    echo '<a href = "login.php">';
                } else {
                    echo '<a href = "index.html">';
                }
            ?>
            <div class="card">
                <img src="images/homeGrey.ico" alt="Go To Home">
                <img src="images/homeOrange.ico" class="img-top" alt="Go To Home">
            </div>
            </a>
        </div>
        <br><br><br><br><br><br>
        <h2 style="padding: 0px 0px 0px 90px">When will the journey end?</h2>
        <div class ="well" style="padding: 9px 0px 0px 95px;">
            <input id="startDateText" oninput="myFunction()" type="text" name="date" class="form-control datepicker" aria-label="Text input with dropdown button" placeholder="Tell us the Dropoff Date"></input>  
        </div>  
        <div class="slidecontainer" style="padding-left:90px;padding-top:30px;padding-bottom:20px;">
            <input type="range" min="0" max="23" value="13" class="slider" id="myRange">
            <div style="padding-top: 10px;">
                <h3 id="demoOuter">Dropoff Time: <span id="demo"></span>:00</h3>
            </div>    
        </div>
        <div id ="footer">
            <ul class="breadcrumb4">
                <li><a href="step1.php"><div id="str1">STARTING POINT</div></a></li>
                <li><a href="step2.php"><div id="str2">DESTINATION POINT</div></a></li>
                <li><a href="step3.php"><div id="str3">PICKUP TIME</div></a></li>
                <li><a href="step4.php"><div id="str">DROPOFF TIME</div></a></li>
            </ul>
        </div>
        <div style="background:#fbbd19;width: 230px;float:right;bottom: 0;margin:0px;position: fixed;right:0;border: 0px;height:82px;">
            <div style="padding:17px 0px 10px 0px;">
                <button class="btn btn-primary btn-lg" id="nextButton" style = "padding:8px 53px 10px 60px;" onclick="window.location.href='inter.php'" role="button">DONE</button>
            </div>
        </div>
        <form>
            <div  class="checkbox" style="padding-left: 94px;">
                <label><input type="checkbox" value=""id = "c1"> Round Trip</label>
            </div>
        </form>    
        <div id="warning" style="padding-left:90px;"></div>
        <div id="info" style="padding-left: 94px;"></div>
        <script>
                var now = new Date();
                now.setTime(now.getTime() + 1 * 3600 * 1000);
                var slider = document.getElementById("myRange");
                var output = document.getElementById("demo");
                var temp = document.getElementById("str");
                var dateIn = document.getElementById("startDateText");
                var dropDT;
                var roundTrip = 'FALSE';
                var x = document.getElementById("info");
                //x.innerHTML = document.cookie;
                output.innerHTML = slider.value; // Display the default slider value
                // Update the current slider value (each time you drag the slider handle)
                function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) 
                {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
                }
                var temp2 = undefined;
                temp1=readCookie('startAdd');    
                if(temp1 !== null) {
                    temp2 = temp1.slice(0,16);
                    document.getElementById('str1').innerHTML = temp2.toUpperCase();
                }    
                temp1=readCookie('destAdd');    
                if(temp1 !== null) {
                    temp2 = temp1.slice(0,16);
                    document.getElementById('str2').innerHTML = temp2.toUpperCase();
                }    
                temp1=readCookie('startDT');    
                if(temp1 !== null) {
                    document.getElementById('str3').innerHTML = temp1.toUpperCase();
                    
                }   
            temp1=readCookie('dropDT');    
            if(temp1 !== null) {
                dropDT = temp1;
                var res = dropDT.split(" ");
                dateIn.value = res[0];
                var res1 = res[1].split(":");
                output.innerHTML = res1[0];
                temp.innerHTML = dropDT;
                slider.value = res1[0];
            }  
                slider.oninput = function() {
                    output.innerHTML = slider.value;
                    dropDT = dateIn.value+" "+slider.value+":00";
                    temp.innerHTML = dropDT;
                    document.cookie = "dropDT="+dropDT+"; expires="+now.toUTCString()+"; path=/";
                    document.cookie = "roundTrip="+roundTrip+"; expires="+now.toUTCString()+"; path=/";

                    var sdate = readCookie('startDT');
                    var splits = sdate.split(" ");
                    sdate = splits[0];
                    today = sdate;
                    dd = today[0]+today[1];
                    mm = today[3]+today[4];
                    yyyy = today[6]+today[7]+today[8]+today[9];
                    var dateString = dateIn.value;
                    Edate = dateString[0]+dateString[1];
                    Emonth  = dateString[3]+dateString[4];
                    Eyear = dateString[6]+dateString[7]+dateString[8]+dateString[9];
                    var flag = 0;
                    if (Eyear < yyyy) {
                        flag = 1;
                    }
                    else if (Eyear == yyyy) {
                        if (Emonth < mm) {
                            flag = 1;
                        }
                        else if (Emonth == mm) {
                            if (Edate < dd) {
                                flag = 1;
                            }
                        }
                    }
                    if (flag == 1) {
                        document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                        document.getElementById("nextButton").disabled=true;
                    }
                    else{
                        document.getElementById("warning").innerHTML = "";
                        document.getElementById("nextButton").disabled=false;
                    }
                    // if (yyyy > year) {
                    //     document.getElementById("warning").innerHTML = "";
                    //     document.getElementById("nextButton").disabled=false
                    // }
                    // else if (yyyy == year) {
                    //     if (mm > month) {
                    //         document.getElementById("warning").innerHTML = "";
                    //         document.getElementById("nextButton").disabled=false
                    //     }
                    //     else if (mm == month) {
                    //         if (dd > date) {
                    //             document.getElementById("warning").innerHTML = "";
                    //             document.getElementById("nextButton").disabled=false
                    //         }
                    //         else{
                    //             document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //             document.getElementById("nextButton").disabled=true
                    //         }
                    //     }
                    //     else{
                    //         document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //         document.getElementById("nextButton").disabled=true
                    //     }
                    // }
                    // else{
                    //     document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //     document.getElementById("nextButton").disabled=true
                    // }
                    // if (date < dd) {
                    //     document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //     document.getElementById("nextButton").disabled=true
                    // }
                    // else if (month < mm) {
                    //     document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //     document.getElementById("nextButton").disabled=true
                    // }
                    // else if (year < yyyy) {
                    //     document.getElementById("warning").innerHTML = "Please enter a date after "+today;
                    //     document.getElementById("nextButton").disabled=true
                    // }
                    // else {
                    //     document.getElementById("warning").innerHTML = "";
                    //     document.getElementById("nextButton").disabled=false
                    // }
                    //x.innerHTML = document.cookie;
                }
                var check = document.getElementById("c1");
                var info = document.getElementById("info");
                check.onclick = function() {
                    if (check.checked == true) {
                        //info.innerHTML = '*The Dropoff Date is the date of return.';
                        roundTrip = 'TRUE';
                    }
                    else {
                        roundTrip = 'FALSE';
                    }
                    document.cookie = "roundTrip="+roundTrip+"; expires="+now.toUTCString()+"; path=/";
                    //x.innerHTML= document.cookie;
                }
        </script>
    </body>
</html>

<!--FINAL VAR: dropDT roundTrip-->