<html>
<head> 
<title>Not Logged</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body id="body-color"> 
<div id="notloggeddiv">
<fieldset id="notLogged"><legend>Not Logged</legend>
<form id="notloggedform" method="POST" action="">
<input id="buttonToLOGIN" type="submit" name="buttonToLOGIN" value="Log-In Form">
</form>
</fieldset>
</div>
</body> 
</html> 

<?php

$pressed=$_POST['buttonToLOGIN'];

if(isset($pressed)){
header("Location:login.php");}

?>