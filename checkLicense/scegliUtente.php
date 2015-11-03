<?php
require('isLoggedAdmin.php');
require('connectDB.php');
?>
<html>
<head>
<title>SCEGLI UTENTE</title>
</head>
<?php

$queryUtenti="SELECT username FROM profili WHERE 1";
$eseguiQueryU=mysql_query($queryUtenti) or die(mysql_error());
$numUtenti=mysql_num_rows($eseguiQueryU);
$tap=1;
echo "Ci sono ".$numUtenti." utenti<br><br>";
if(!isset($_POST['scegliValore'])){
	$_SESSION['utenteScelto']="";
	$riga;
	$val;
	
	while($tap<=$numUtenti){
		$riga=mysql_fetch_row($eseguiQueryU);
		$val[$tap]=$riga[0];
		$tap++;
	}
	echo "<form id='listaUtenti' method='POST'>";
	foreach ($val as $valore){
			echo '<input type="checkbox" name="val[]" value="'.$valore.'"/>'.$valore.'<br> ';
			//echo '<input type="checkbox" name="files[]" value="'.$file.'"/>'. $file . '<br />'; 
	}
	echo "<br><input id='scegliValore' type='submit' name='scegliValore' value='SCEGLI'>";
echo "</form>";
}
else{
	if (isset($_POST['val'])) { 
        foreach ($_POST['val'] as $value) { 
            
            $_SESSION['utenteScelto']=$value;          		
        } 
	}
}
	
	
	if($_SESSION['utenteScelto']!=""){
	
	echo "<br><br><button id='chiudiFINESTRA' onclick=chiudi()>CHIUDI</button>";
	                                                       echo "<script>function chiudi(){
														   window.opener.usernameMOD.disabled='false';
														   window.opener.usernameMOD.value='$_SESSION[utenteScelto]';
	                                                       window.close();}
														   </script>";
														   }
	




?>

</html>