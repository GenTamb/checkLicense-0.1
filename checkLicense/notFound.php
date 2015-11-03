<html>
<head> 
<title>NOT FOUND</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body id="body-color"> 
<div id="notloggeddiv">
<fieldset id="emptyFIELDS" style="width:150px"><legend>NOT FOUND</legend>
<form id="notloggedform" method="POST" action="">
Utente non trovato!<br>Riprova!<br><br>
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