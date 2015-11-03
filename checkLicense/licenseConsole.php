<?php
require('connectDB.php');
require('isLoggedAdmin.php');
?>
<html>
<head> <meta charset="UTF-8">
<title>LICENSE Console</title> 
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
	session_unset();
	session_destroy();
	//echo "<script type='text/javascript'>alert('Log Out!')</script>"; da sistemare
	header("Location:login.php");
	
}

?>

<div id="engineConsole"> 
<form id='addRECORDS' method='POST' action='' enctype="multipart/form-data">
<fieldset id='LICENSEfield' style='width:30%'><legend>CAMPI LICENZA</legend> 
<b>MIP</b>&nbsp&nbsp<input id="mipscelta" name="mipscelta" size="10" value="" disabled='true'>&nbsp&nbsp<button id='scegliMIP' onclick='apriScegliMIP();return false;'>Scegli</button>

    <br><br>
<script>function apriScegliMIP(){
	window.open("scegliMIP.php","Scegli MIP",'height=600,width=350,top=100,left=500');
	return false;
}</script>
<!--<b>MIP</b><br><input type='text' name='MIP' size='60'><br>-->
<b>TICKET</b><br><input id='TICKET' type='text' name='TICKET' size='20' value='' onchange='checkNUMERO();'><br><br>
<script>function checkNUMERO(){
	var num=addRECORDS.TICKET.value;
	if(num<0 || isNaN(num)) {
		alert('Devi inserire un numero maggiore di zero!');
	}
	return false;
}</script>
<b>PRODOTTO</b>
<select name="PRODOTTO">
<option value="" selected>Seleziona..</option>
<option value="Office XP">Office XP</option>
<option value="Office 2003 Pro">Office 2003 Pro</option>
<option value="Office 2007 Pro">Office 2007 Pro</option>
<option value="Office 2010 Pro">Office 2010 Pro</option>
<option value="Office 2010 Standard">Office 2010 Standard</option>
<option value="Office 2013 Pro">Office 2013 Pro</option>
<option value="Office 2013 Standard">Office 2013 Standard</option>
<option value="Office 365">Office 365</option>
<option value="Adobe PRO">Adobe PRO</option>
<option value="Windows XP">Windows XP</option>
<option value="Windows Vista">Windows Vista</option>
<option value="Windows 7">Windows 7</option>
<option value="Windows 8">Windows 8</option>
<option value="Windows 8.1">Windows 8.1</option>
<option value="Windows 10">Windows 10</option>
</select><br><br>
<b>LICENZA</b><br><input type='text' name='LICENZA' size='60'><br>
<b>NOTE</b><br><input type='text' name='NOTE' size='60'><br><br>
<b>FILE</b><br>
<button id='uploadFILE' onclick='apriPromptUpload();return false;'>NUOVO file </button>&nbsp&nbsp
<input id="uppedFILE" name="uppedFILE" size="5" value="" type="hidden"><br>
<script>function apriPromptUpload(){
	window.open("upload.php","upload",'height=200,width=350,top=100,left=500');
	addRECORDS.chooseFILE.disabled='true';
	return false;
}</script>
<button id='chooseFILE' onclick='apriPromptChoose();return false;'>SCEGLI file </button>&nbsp&nbsp
<input id="choosenFILE" name="choosenFILE" size="60" value="" type="hidden">
<script>function apriPromptChoose(){
	window.open("choose.php","choose",'height=500,width=500,top=100,left=500');
	addRECORDS.uploadFILE.disabled='true';
	return false;
}</script>
<br><br>
<input id='buttonADDlicensa' type='submit' name='buttonADDlicensa' value='ADD'>
<input id='buttonPulisci' type='submit' name='premiPulisci' value='Clear'>
</fieldset>
</form>
</div>
<?php


$stato=0;
$campi=array();
$MIP=mysql_real_escape_string($_SESSION['MIPscelta']);
$TICKET=mysql_real_escape_string($_POST['TICKET']);
$PRODOTTO=mysql_real_escape_string($_POST['PRODOTTO']);
$LICENZA=mysql_real_escape_string($_POST['LICENZA']);
$NOTE=mysql_real_escape_string($_POST['NOTE']);
$data=mysql_real_escape_string(date("d-m-y"));
$whois=mysql_real_escape_string($_SESSION['username']);
$s='-';
$procedi=0;
$muovifile=0;

$dir = 'docs/';  //cartella di upload definitiva


if(isset($_POST['premiPulisci'])){
	$stato=1;
}

if(isset($_POST['buttonADDlicensa'])){
	
	if(!empty($MIP) && !empty($LICENZA) && !empty($PRODOTTO)){
	 
	  $stato=5;
	  if($_SESSION['fileUppato']){
	  $nome_tmp=$_SESSION['nomeTEMPfile'];
	  if(!empty($nome_tmp)){
		if ($_SESSION['tipofile']=='image/jpeg'){ 
            $ext = '.jpg'; 
            }   
        else if ($_SESSION['tipofile']=='image/gif'){ 
            $ext = '.gif'; 
            } 
        else if ($_SESSION['tipofile']=='application/pdf'){ 
            $ext = '.pdf'; 
			} 
		else if($_SESSION['tipofile']=='application/msword'){
			$ext='.doc';
		}	
        else{  
            $ext = '.unknown'; 
            }
	    $fileNAME=$PRODOTTO.$s.$LICENZA.$s.$data.$ext;
		$percorsoCompleto=$dir.$fileNAME;
		$muovifile=1;
		$_SESSION['fileUppato']=0;
      	 }	   //chiuso if(!empty($userfile_tmp) && !empty($nome_tmp))
	  }else if($_SESSION['fileScelto']==1){
		  $percorsoCompleto=$_SESSION['percorsoCompleto'];
		  $muovifile=0;
		  $_SESSION['fileScelto']=0;
	  }
	   else{
			   $fileNAME="";
			   $percorsoCompleto="";
			   $muovifile=0;

		   } //chiuso else
	 
		$checkMIP="SELECT MIP from pdl WHERE MIP='$MIP'";
		$eseguiCheckMIP=mysql_query($checkMIP);
		$contoRIGHEcheckMIP=mysql_num_rows($eseguiCheckMIP);
		if($contoRIGHEcheckMIP>0){
			                      if($muovifile==1){
								  rename('tmp/'.$nome_tmp,$percorsoCompleto);
								  $muovifile=0;
								  }				  
		                          $sql="INSERT INTO licenses (MIP,TICKET,PRODOTTO,LICENZA,LINK,NOTE,MODIFICATODA,MODIFICATOIL) VALUES ('$MIP','$TICKET','$PRODOTTO','$LICENZA','$percorsoCompleto','$NOTE','$whois','$data')";
                                  $_SESSION['MIPscelta']="";
								  $inserito=mysql_query($sql);
		                          if($inserito){
		                          $stato=2;
                               	  }
	                              else {
		                          $errore=mysql_error();
	                              $stato='erroreSQL';
	                              }
        $_SESSION['percorsoCompleto']="";								  
		} // chiuso if($contoRIGHEcheckMIP>0)
		else{
			$stato=4;
		}
		
	}//chiuso if(!empty($MIP) && !empty($LICENZA) && !empty($PRODOTTO))
}// chiuso if(isset($_POST['buttonADDlicensa']))



?>
<div id="divSTATO">
<fieldset id="fieldSTATO" style="width:30%"><legend>STATO</legend> 
<?php
if($stato==1){
	echo "ho cancellato i campi";
}
if($stato==2){
	echo "Record inserito:<br>$MIP<br>$TICKET<br>$PRODOTTO<br>$LICENZA<br>$NOTE";
}
if($stato==3){
	echo "I campi MIP, LICENSA o PRODOTTO non sono stati inizializzati, riprova!";
}
if($stato=='erroreSQL'){
	echo "$errore";
}
if($stato==4){
	echo "La MIP specificata NON ESISTE!<br>Aggiungila dal pannello PDL";
}
if($stato==5){
	echo "In attesa..";
}
if($stato==10){
	echo "In attesa di query..";
}
if($stato==11){
	echo "non hai scelto/uppato files";
}

?>
</fieldset>
</div>
</html>