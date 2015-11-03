<?php
require('isLoggedAdmin.php');
require('connectDB.php');
?>
<html>
<head>
<title>SCEGLI MIP</title>
</head>
<?php


$queryMips="SELECT MIP FROM pdl WHERE 1";
$eseguiQuery=mysql_query($queryMips) or die(mysql_error());
$numMips=mysql_num_rows($eseguiQuery);
$tap=1;
echo "Ci sono ".$numMips." mip<br><br>";
if(!isset($_POST['scegliValore'])){
	$_SESSION['MIPscelta']="";
	$riga;
	$val;
	
	while($tap<=$numMips){
		$riga=mysql_fetch_row($eseguiQuery);
		$val[$tap]=$riga[0];
		$tap++;
	}
	echo "<form id='listaMIP' method='POST'>";
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
            
            $_SESSION['MIPscelta']=$value;          		
        } 
	}
}
	
	
	if($_SESSION['MIPscelta']!=""){
	//echo "Hai scelto:".$_SESSION['MIPscelta'];
	echo "<br><br><button id='chiudiFINESTRA' onclick=chiudi()>CHIUDI</button>";
	                                                       echo "<script>function chiudi(){
														   window.opener.mipscelta.disabled='false';
														   window.opener.mipscelta.value='$_SESSION[MIPscelta]';
	                                                       window.close();}
														   </script>";
														   }
	




?>

</html>