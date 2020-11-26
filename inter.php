<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adhiraj Tours and Travels</title>
</head>
<body>

</body>
<script type="text/javascript">
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
    var startDT = readCookie('startDT');
    window.location.href="cars.php?start_date="+startDT;
</script>
</html>