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
    </head>
        <body style="border:0px;margin:0px;">
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAI7kAUPZRwcEVz6bDGxDooQFLSHH_2b0&libraries=places"></script>    
            <div class="container" style="float:left;margin-right:10px;" id="Current:Step2">
            <div class="row bs-wizard" style="border-bottom:0;"> 
                <div class="col-sm-3 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 1</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step1.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Starting Point</div>
                </div>
                <div class="col-sm-3 bs-wizard-step active"><!-- active -->
                <div class="text-center bs-wizard-stepnum">Step 2</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step2.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Destination Point</div>
                </div>
                <div class="col-sm-3 bs-wizard-step disabled"><!-- disabled -->
                <div class="text-center bs-wizard-stepnum">Step 3</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="step3.php" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Pickup Time</div>
                </div>
                <div class="col-sm-3 bs-wizard-step disabled"><!-- disabled -->
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
        <h2 style="padding: 0px 0px 0px 90px">Tell us your Destination Point</h2>
        <div class="input-group mb-3" style="width: 1000px;padding:10px 10px 0px 95px;">
            <input id="destInputText" type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Tell us your Destination point"></input>
            <div class="input-group-append">
                <button id = "showMap" class="btn btn-secondary" type="button" data-toggle="tooltip" data-placement="bottom" title="Show Map" onclick="startMap()"><img src="images/showMap.png"></button>
            </div>
        </div>
        <p id = "demo" style = "padding:10px 0px 0px 90px;"></p>
        <div id ="footer">
            <ul class="breadcrumb2">
                <li><a href="step1.php"><div id = "str1">STARTING POINT</div></a></li>
                <li><a href="step2.php"><div id = "str">DESTINATION POINT</div></a></li>
            </ul>
        </div>
        <div id = "outerMapID">
            <div id="mapID"></div>
        </div>
        <div style="background:#fbbd19;width: 230px;float:right;bottom: 0;margin:0px;position: fixed;right:0;border: 0px;height:82px;">
            <div style="padding:17px 0px 10px 0px;">
                <a class="btn btn-primary btn-lg" style = "padding:8px 60px 10px 60px;" href="step3.php" role="button">NEXT</a>
            </div>
        </div>
        <script type="text/javascript">
            var x = document.getElementById("demo");
            //x.innerHTML = document.cookie;
            var y = document.getElementById("destInputText"); 
            var z;
            var destLat;
            var destLng;
            var destAdd;
            var now = new Date();
            now.setTime(now.getTime() + 1 * 3600 * 1000);
            var map = undefined;
            var marker = undefined;
            var defaultBounds = new google.maps.LatLngBounds(
                    new google.maps.LatLng(23.63936, 68.14712),
                    new google.maps.LatLng(28.20453, 97.34466));
                var options = {
                    bounds: defaultBounds
                };    
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
            temp1=readCookie('startAdd');    
            if(temp1 !== null) {
                temp = temp1.slice(0,16);
                document.getElementById('str1').innerHTML = temp.toUpperCase();
            }    
            temp1=readCookie('destAdd');    
            if(temp1 !== null) {
                destAdd = temp1;
                y.value = destAdd;
                temp = destAdd.slice(0,16);
                document.getElementById('str').innerHTML = temp.toUpperCase();
            }    
            temp1=readCookie('destLat');
            if (temp1 !== null) {
                destLat = temp1;
            }
            temp1=readCookie('destLng');
            if (temp1 !== null) {
                destLng = temp1;
            }      
                google.maps.event.addDomListener(window, 'load', function () {
                    var places = new google.maps.places.Autocomplete(document.getElementById('destInputText'),options);
                    google.maps.event.addListener(places, 'place_changed', function () {
                        var place = places.getPlace();
                        destAdd = place.formatted_address;
                        destLat = place.geometry.location.lat();
                        destLng = place.geometry.location.lng();
                        //x.innerHTML = destAdd+","+destLat+","+destLng;
                        document.cookie = "destLat="+destLat+"; expires="+now.toUTCString()+"; path=/";
                        document.cookie = "destLng="+destLng+"; expires="+now.toUTCString()+"; path=/";
                        document.cookie = "destAdd="+destAdd+"; expires="+now.toUTCString()+"; path=/";
                        //x.innerHTML = document.cookie;
                        temp = destAdd.slice(0, 18);
                        document.getElementById('str').innerHTML = temp.toUpperCase();
                        if(typeof map !== "undefined")
                        {
                            var location2 = new google.maps.LatLng(destLat, destLng);
                            marker.setPosition(location2);
                            map.setCenter({lat:destLat, lng:destLng});
                        }
                        /*
                        var mesg = "Address: " + address;
                        mesg += "\nLatitude: " + latitude;
                        mesg += "\nLongitude: " + longitude;
                        alert(mesg);
                        */
                    });
                });
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }
            function showPosition(position) {
                z = position.coords.latitude + 
                "," + position.coords.longitude;
                destLat = position.coords.latitude;
                destLng = position.coords.longitude;
                GetAddress();
            }
            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        x.innerHTML = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        x.innerHTML = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        x.innerHTML = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        x.innerHTML = "An unknown error occurred."
                        break;
                }
            }
            function GetAddress() {
                var latlngStr = z.split(',', 2);
                var lat = parseFloat(latlngStr[0]);
                var lng = parseFloat(latlngStr[1]);
                var latlng = new google.maps.LatLng(lat, lng);
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            y.value = results[0].formatted_address;
                            destAdd = y.value;
                            document.cookie = "destLat="+destLat+"; expires="+now.toUTCString()+"; path=/";
                            document.cookie = "destLng="+destLng+"; expires="+now.toUTCString()+"; path=/";
                            document.cookie = "destAdd="+destAdd+"; expires="+now.toUTCString()+"; path=/";
                            //x.innerHTML = document.cookie;
                            //x.innerHTML = destAdd+","+destLat+","+destLng;
                            document.getElementById('str').innerHTML = destAdd.slice(0, 18);
                            if(typeof map !== "undefined")
                            {
                                var location1 = new google.maps.LatLng(destLat, destLng);
                                marker.setPosition(location1);
                                map.setCenter({lat:destLat, lng:destLng});
                            }
                        }
                    }
                });
            }
            function startMap() {
                var a = document.getElementById("mapID");
                var myLatLng = {lat: 19.0330, lng: 73.0297};
                map = new google.maps.Map(document.getElementById("mapID"), {
                    zoom: 12,
                    center: myLatLng
                });
                marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    title: 'Select your Location',
                    draggable: true
                });
                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                });
                function placeMarker(location) {
                    marker.setPosition(location);
                    toggleBounce();
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': location }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                y.value = results[0].formatted_address;
                                destLat = location.lat();
                                destLng = location.lng();
                                destAdd = y.value;
                                document.cookie = "destLat="+destLat+"; expires="+now.toUTCString()+"; path=/";
                                document.cookie = "destLng="+destLng+"; expires="+now.toUTCString()+"; path=/";
                                document.cookie = "destAdd="+destAdd+"; expires="+now.toUTCString()+"; path=/";
                                //x.innerHTML = document.cookie;
                                //x.innerHTML = y.value+","+destLat+","+destLng;
                                document.getElementById('str').innerHTML = destAdd.slice(0, 18);
                            }
                        }
                    });
                    /*
                    destLat = location.lat();
                    destLng = location.lng();
                    */
                    //destAdd = y.value;
                    //x.innerHTML = y.value+","+destLat+","+destLng;
                }
                function toggleBounce() {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(function(){ marker.setAnimation(null); }, 375);
                }
                google.maps.event.addListener(marker,'dragend',function(){
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();
                    var location = new google.maps.LatLng(lat, lng);
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': location }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                y.value = results[0].formatted_address;
                                destLat = lat;
                                destLng = lng;
                                destAdd = y.value;
                                document.cookie = "destLat="+destLat+"; expires="+now.toUTCString()+"; path=/";
                                document.cookie = "destLng="+destLng+"; expires="+now.toUTCString()+"; path=/";
                                document.cookie = "destAdd="+destAdd+"; expires="+now.toUTCString()+"; path=/";
                                //x.innerHTML = document.cookie;  
                                //x.innerHTML = y.value+","+destLat+","+destLng;
                                document.getElementById('str').innerHTML = destAdd.slice(0, 18);
                            }
                        }
                    });
                })
            } 
        </script>
    </body>
</html>

<!-- FINAL VARS : startAdd , startLat , startLng-->