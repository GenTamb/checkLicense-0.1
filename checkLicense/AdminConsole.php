<?php
require('isLoggedAdmin.php');

?>
<html>
<head> 
<title>Admin Console</title> 
<link rel="stylesheet" type="text/css" href="styleAdminConsole.css">
</head> 
<body id="body-color"> 

<div id="menuCONSOLE">
<fieldset id="menuUSERfield" style="width:200px"><legend>MENU</legend> 
<form id="menuUSERform" method="POST" action="">                                                       
<?php echo "Loggato come:&nbsp$_SESSION[username]<br><br>";?>
ADMIN<br>
<fieldset id="menuBUTTON" style="width:180px"><legend>Comandi</legend> 
<input id='buttonVAIadd' type='submit' name='vaiAconsoleAdd' value='PDL'>&nbsp&nbsp
<input id='buttonVAIlicense' type='submit' name='vaiAconsoleLicense' value='LICENSE'><br><br>
<input id='buttonVaiSearchConsole' type='submit' name='vaiAconsoleRicerca' value='Search'>&nbsp&nbsp
<input id="buttonLogOut" type="submit" name="premiLogOut" value="Log Out">
</fieldset>
</form>
</fieldset>
</div>
</html>
<?php
if(isset($_POST['vaiAconsoleAdd'])){
	header("Location:pdlConsole.php");
}
if(isset($_POST['vaiAconsoleLicense'])){
	header("Location:licenseConsole.php");
}
if(isset($_POST['vaiAconsoleRicerca'])){
	header("location:SearchConsole.php");
}
if(isset($_POST['premiLogOut'])){
	
	//echo "<script type='text/javascript'>alert('Log Out!')</script>"; da sistemare
	header("Location:login.php");
	session_destroy();
}
?>