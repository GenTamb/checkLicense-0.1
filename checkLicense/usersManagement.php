<?php
require('isLogged.php');
require('connectDB.php');
?>
<html>
<head> <meta charset="UTF-8">
<title>Users Management</title> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="body-color"> 
<form id="menuUSER" method="POST" action="">
<fieldset id="menuUSER" style="width:200px"><legend>MENU</legend> 
<?php                                                                //check su profilo: MENU' comandi modifica e cerca
echo "Loggato come:&nbsp$_SESSION[username]<br><br>";
if($_SESSION['admin']==1){
                          echo "ADMIN<br><br>";
						  
						  echo "<input id='buttonVaiAdminConsole' type='submit' name='vaiAconsole' value='ADMIN Console'>&nbsp&nbsp";
						  
						  
						  }
else{
	                      echo "UTENTE<br><br>";
						  echo "<input id='buttonVaiSearchConsole' type='submit' name='vaiASearch' value='Torna'>";
}
$vaiAconsole=$_POST['vaiAconsole'];
if(isset($vaiAconsole)){
	header("location:AdminConsole.php");
}
$vaiSearch=$_POST['vaiASearch'];
if(isset($vaiSearch)){
	header("location:SearchConsole.php");
}

?>
<br><br><input id='gestistiUTENTI' type='submit' name='premiGestioneUtenti' value='Gestione Utenza'>
<br><br><br><input id="buttonLogOutt" type="submit" name="premiLogOut" value="Log Out">
</fieldset>
</form>
<?php //funzione logout
if(isset($_POST['premiLogOut'])){
	
	//echo "<script type='text/javascript'>alert('Log Out!')</script>"; da sistemare
	header("Location:login.php");
	session_destroy();
}
if(isset($_POST['premiGestioneUtenti'])){
	header("Location:usersManagement.php");
}
?>

<div id='userConsole'>
<form id='userConsoleForm' method='POST'>
<fieldset id='managementMenu' style='width:250px'><legend>MENU' GESTIONE</legend>
Cambia password utente corrente
<input id='CambiaPassword' name='CambiaPassword' type='checkbox' onChange='checkCambiaPassword()'><br>
<?php if($_SESSION['admin']==1) echo "Gestisci Utenti<input id='GestisciUtenti' name='GestisciUtenti' type='checkbox' onChange='checkGestisciUtenti()'>";?>

<script> function checkCambiaPassword(){
	if(changePASSWORDdiv.hidden){
		changePASSWORDdiv.hidden=false;
	}
	else changePASSWORDdiv.hidden=true;
  
}
function checkGestisciUtenti(){
	if(manageUSERSdiv.hidden){
		manageUSERSdiv.hidden=false;
	}
	else manageUSERSdiv.hidden=true;
   
}
</script>
</fieldset>
</div>

<div id='changePASSWORDdiv' hidden='true'>
<fieldset id='changePASSWORD' style='width:200px'><legend>Cambia Password</legend>
<br><b>Vecchia Password<b>&nbsp&nbsp<input id='VecchiaPassword' type='password' name='VecchiaPassword'>
<br><b>Nuova Password<b><br><input id='NuovaPassword' name='NuovaPassword' type='password'>
<br><b>Conferma Password<b><br><input id='ConfermaPassword' name='ConfermaPassword' type='password'>
<br><br><input id='RESET' name='RESET' type='submit' value='CAMBIA'>

</div>

<div id='manageUSERSdiv' hidden='true'>
<fieldset id='manageUSERS' style='width:300px'><legend>Gestisci Utenti</legend>
<select id='selectMENU' name='selectMENU' onChange='sceltaMenu();'>
<option value="" selected>SCEGLI..</option>
<option value="CreaUSER">Crea Utente</option>
<option value="ModUSER">Gestisci Utente</option>
</select>
<script>function sceltaMenu(){
	if(selectMENU.value=='CreaUSER'){
		creaUSERSdiv.hidden=false;
		modUSERSdiv.hidden=true;
	}
	if(selectMENU.value=='ModUSER'){
		modUSERSdiv.hidden=false;
		creaUSERSdiv.hidden=true;
	}
}</script>

</fieldset>
</div>

<div id='creaUSERSdiv' hidden='true'>
<fieldset id='creaUSERS' style='width:300px'><legend>Crea Utente</legend>
<br><b>Nome</b>&nbsp&nbsp<input id='usernameNEW' name='usernameNEW' type='text'>
<br><br><b>Password</b>&nbsp&nbsp<input id='passwordNEW' name='passwordNEW' type='password'>
<br><br><b>Nome</b>&nbsp&nbsp<input id='nomeNEW' name='nomeNEW' type='text'>
<br><br><b>ADMIN</b><input id='adminNEW' name='adminNEW' type='checkbox'> 
<br><br><input id='CREA' name='CREA' type='submit' value='CREA'>
</fieldset>
</div>

<div id='modUSERSdiv' hidden='true'>
<fieldset id='modUSERS' style='width:300px'><legend>Modifica Utente</legend>

<br><button id='scegliUtente' onClick='apriscegliUtente();return false;'>Scegli Utente</button>&nbsp&nbsp<input id='usernameMOD' name='usernameMOD' type='text' disabled='true'>
<script>function apriscegliUtente(){
	window.open("scegliUtente.php","Scegli Utente",'height=600,width=350,top=100,left=500');
	return false;
}</script>
<br><br><b>Nuova Password</b>&nbsp&nbsp<input id='passwordMOD' name='passwordMOD' type='password'>
<br><br><b>ADMIN</b><input id='adminMOD' name='adminMOD' type='checkbox'> 
<br><br><input id='MOD' name='MOD' type='submit' value='MODIFICA'>
<input id='DEL' name='DEL' type='submit' value='CANCELLA'>

</fieldset>
</div>



</form>
</html>

<?php

function do_alert($msg){                       //funzione do_alert per messaggi pop up
	echo "<script> alert('$msg'); </script>";
}


//reset password
if(isset($_POST['RESET'])){
//acquisisco le variabili dal form dinamico
$oldPSW=mysql_real_escape_string($_POST['VecchiaPassword']);
$newPSW=mysql_real_escape_string($_POST['NuovaPassword']);
$cnfPSW=mysql_real_escape_string($_POST['ConfermaPassword']);
$oldPSW=md5($oldPSW);
$newPSW=md5($newPSW);
$cnfPSW=md5($cnfPSW);
$utente=$_SESSION['username'];
if(!empty($oldPSW)){
	if($newPSW==$cnfPSW){
	//verifico che l'account in oggetto esista
    $checkUSERquery="SELECT username FROM profili WHERE username='$utente' AND password='$oldPSW'";
    $eseguiQUERY=mysql_query($checkUSERquery) or die(mysql_error());
    $numUser=mysql_num_rows($eseguiQUERY);
    if($numUser==1){ //se la vecchia password è corretta, resetto la password con la nuova 
	if(mysql_query("UPDATE profili SET password='$newPSW' WHERE username='$utente' AND password='$oldPSW'"))
       do_alert("Password cambiata");
    else echo mysql_error();
} //end if newuser
else do_alert("Vecchia password errata!"); //altrimenti esco con messaggio di errore
	}
	else do_alert("Campi nuova password e conferma password sono diversi!");
}//end if $oldPSW
else do_alert("Campo Vecchia Password vuoto!");

}

//crea utente
if(isset($_POST['CREA'])){
//acquisisco le variabili dal form dinamico
$usernameNEW=mysql_real_escape_string($_POST['usernameNEW']);
$nomeNEW=mysql_real_escape_string($_POST['nomeNEW']);
$passwordNEW=mysql_real_escape_string($_POST['passwordNEW']);
$passwordNEWcryp=md5($passwordNEW);
$adminBOX=0;
if(isset($_POST['adminNEW'])){ //ciclo per vedere se sarà un admin
	$adminBOX=1;
}
else $adminBOX=0;
if(!empty($usernameNEW) && !empty($passwordNEW)){ //ciclo di verifica sui dati immessi: se vuoti, non eseguo nulla
$checkUSERquery="SELECT username FROM profili WHERE username='$usernameNEW'";
$eseguiQUERY=mysql_query($checkUSERquery) or die(mysql_error());
$numUser=mysql_num_rows($eseguiQUERY);
if($numUser==0){ //se non trovo nessun risultato, aggiungo l'utente
	if(mysql_query("INSERT INTO profili (username,password,nome,admin) VALUES ('$usernameNEW','$passwordNEWcryp','$nomeNEW','$adminBOX')")){
		do_alert("Utente aggiunto!");
	}
	else echo mysql_error();
}
else do_alert('Utente già esistente!'); //altrimenti no
	
}
else do_alert('Campi Username o Password vuoti!'); //se username o password vuote, messaggio di errore
}

//modifica utente
if(isset($_POST['MOD'])){

$utenteMOD=mysql_real_escape_string($_SESSION['utenteScelto']);
$passwordMOD=mysql_real_escape_string($_POST['passwordMOD']);
$passwordCRYP=md5($passwordMOD);
$adminMODbox=0;
if(isset($_POST['adminMOD'])){
	$adminMODbox=1;
}
if(!empty($passwordMOD)){
if(mysql_query("UPDATE profili SET password='$passwordCRYP',admin='$adminMODbox' WHERE username='$utenteMOD'")){
	do_alert("Utente Modificato!");
}
else echo mysql_error();
}
else{
	do_alert("Campo Password vuoto! Impossibile modificare password");
}
}

//cancella utente
if(isset($_POST['DEL'])){
$utenteMOD=mysql_real_escape_string($_SESSION['utenteScelto']);
if(!empty($utenteMOD)){
	if(mysql_query("DELETE FROM profili WHERE username='$utenteMOD'")){
		do_alert("Utente Cancellato!");
	}
	else echo mysql_error();
}
else do_alert("Username non selezionata!");
}

?>







