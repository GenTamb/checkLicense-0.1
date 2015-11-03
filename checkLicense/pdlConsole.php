<?php
require('isLoggedAdmin.php');
require('connectDB.php');

?>
<html>
<head> 
<title>PDL Console</title> 
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
		header("Location:login.php");
	session_destroy();
}

?>


<div id="engineConsole"> 
<form id='addRECORDS' method='POST' action=''>
<fieldset id='PDLfield' style='width:30%'><legend>CAMPI PDL</legend> 
<b>MIP</b><br><input type='text' name='MIP' size='60'><br>
<b>COGNOME</b><br><input type='text' name='COGNOME' size='60'><br>
<b>NOME</b><br><input type='text' name='NOME' size='60'><br><br>
<input id='buttonADDpdl' type='submit' name='buttonADDpdl' value='ADD'>
<input id='buttonPulisci' type='submit' name='premiPulisci' value='Clear'>
</fieldset>
</form>
</div>
<?php


$stato=0;

$MIP=mysql_real_escape_string($_POST['MIP']);
$COGNOME=mysql_real_escape_string($_POST['COGNOME']);
$NOME=mysql_real_escape_string($_POST['NOME']);

if(isset($_POST['premiPulisci'])){
	$stato=1;
}
if(isset($_POST['buttonADDpdl'])){
	if(!empty($MIP) && !empty($COGNOME) && !empty($NOME)){
		$sql="INSERT INTO pdl (MIP,COGNOME,NOME) VALUES ('$MIP','$COGNOME','$NOME')";
        $inserito=mysql_query($sql);
	  if($inserito){
		$stato=2;
	}
	else {
		$errore=mysql_error();
		$stato='erroreSQL';
	}
		
	}
	else{
		$stato=3;
	
	}
}


?>
<div id="divSTATO">
<fieldset id="fieldSTATO" style="width:30%"><legend>STATO</legend> 
<?php
if($stato==1){
	echo "Ho pulito i campi!";
}
if($stato==2){
	echo "Record inserito:<br>$MIP<br>$COGNOME<br>$NOME";
}
if($stato==3){
	echo "I campi MIP, COGNOME o NOME non sono stati inizializzati, riprova!";
}
if($stato=='erroreSQL'){
	echo "$errore";
}

?>
</fieldset>
</div>
</html>



