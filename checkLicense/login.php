<html> 
<head> <meta charset="UTF-8">
<title>CheckLicense LOG-IN</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body id="body-color"> 
<div id="Sign-In"> 
<fieldset style="width:30%"><legend>EFFETTUA LOG-IN</legend> 
<form method="POST" action="connectivity.php"> 
User <br><input type="text" name="username" size="40"><br> 
Password <br><input type="password" name="password" size="40"><br> 
<input id="button" type="submit" name="submit" value="Log-In"> 
</form> 
</fieldset> 
</div> 
</body> 
</html> 

<?php

session_start();

?>