<?php
require('connectDB.php');
require('isLogged.php');
?>
<html>
<head> <meta charset="UTF-8">
<title>Search Console</title> 
<link rel="stylesheet" type="text/css" href="styleSearchConsole.css">
</head> 
<body id="body-color"> 
<form id="menuUSER" method="POST" action="">
<fieldset id="menuUSER" style="width:200px"><legend>MENU</legend> 
<?php                                                                //check su profilo: MENU' comandi modifica e cerca
echo "Loggato come:&nbsp$_SESSION[username]<br><br>";
if($_SESSION['admin']==1){
                          echo "ADMIN<br><br>";
						  echo "<input id='abilitaCancella' type='checkbox' name='abilitaCancella' onchange='checkDEL()'>Abilita Cancella</input>
						  <script> function checkDEL() {
							  if(RECORDS.buttonCancella.disabled){
								  RECORDS.buttonCancella.disabled= false;
							  }
							  else RECORDS.buttonCancella.disabled= true;
							  
							  }</script>";
						  echo "<br><input id='abilitaModifica' type='checkbox' name='abilitaModifica' onchange='checkMOD()'>Abilita Modifica</input>
						  <script> function checkMOD() {
							  if(modificaRECORDS.hidden){
								  modificaRECORDS.hidden=false;
							  }
							  else modificaRECORDS.hidden=true;
							  
						  }</script>";  
						  echo "<input id='buttonVaiAdminConsole' type='submit' name='vaiAconsole' value='ADMIN Console'>&nbsp&nbsp";
						  
						  
						  }
else{
	                      echo "UTENTE<br><br>";
}
$vaiAconsole=$_POST['vaiAconsole'];
if(isset($vaiAconsole)){
	header("location:AdminConsole.php");
}

?>
<br><br><input id='gestistiUTENTI' type='submit' name='premiGestioneUtenti' value='Gestione Utenza'>
<br><br><br><input id="buttonLogOut" type="submit" name="premiLogOut" value="Log Out">
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
<div id="SearchConsole"> 
<form id="RECORDS" method="POST" action="">
<fieldset id="field1" style="width:300px"><legend>RICERCA RECORD</legend> 
<b>MIP</b><br><input type="text" name="MIP" size="20"><br>
<b>TICKET</b><br><input type="text" name="TICKET" size="20" value='' onchange='checkNUMERO();'><br><br>
<script>function checkNUMERO(){
	var num=RECORDS.TICKET.value;
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
<b>LICENZA</b><br><input type="text" name="LICENZA" size="30"><br> 
<b>COGNOME</b><br><input type="text" name="COGNOME" size="20"><br>
<b>NOME</b><br><input type="text" name="NOME" size="20"><br>
<b>NOTE</b><br><input type="text" name="NOTE" size="20"><br>
<input id="buttonCerca" type="submit" name="premiCerca" value="Cerca">
<input id="buttonPulisci" type="submit" name="premiPulisci" value="Pulisci Risultati">
<?php if($_SESSION['admin']==1){
	                                   echo "<br><br><input id='buttonCancella' type='submit' name='buttonCancella' value='Cancella' disabled='true'>";
									   
}?>
</fieldset>
<fieldset id='modificaRECORDS' style="width:300px" hidden='true'><legend>MODIFICA RECORD IN</legend>
<b>MIP</b>&nbsp&nbsp<input id="mipscelta" name="mipscelta" size="10" value="">&nbsp&nbsp<button id='scegliMIP' onclick='apriScegliMIP();return false;'>Scegli</button><br><br>
<script>function apriScegliMIP(){
	window.open("scegliMIP.php","Scegli MIP",'height=600,width=350,top=100,left=500');
	return false;
}</script>
<b>TICKET</b><br><input type="text" name="TICKETnuovo" size="20" onchange='checkNUMEROnuovo();'><br><br>  
<script>function checkNUMEROnuovo(){
	var num=RECORDS.TICKETnuovo.value;
	if(num<0 || isNaN(num)) {
		alert('Devi inserire un numero maggiore di zero!');
	}
	return false;
}</script> 
<b>PRODOTTO</b>
<select name="PRODOTTOnuovo">
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
<b>LICENZA</b><br><input type="text" name="LICENZAnuovo" size="30"><br> 
<b>COGNOME</b><br><input type="text" name="COGNOMEnuovo" size="20"><br>
<b>NOME</b><br><input type="text" name="NOMEnuovo" size="20"><br>
<b>NOTE</b><br><input type="text" name="NOTEnuovo" size="40"><br><br>
<input id='buttonModifica' type='submit' name='buttonModifica' value='Modifica'>
</fieldset>
</form>
</div>  
</body> 
</html> 

<?php

//acquisisco variabili da bottoni
$premiCerca=$_POST['premiCerca'];

$premiPulisci=$_POST['premiPulisci'];

$premiCancella=$_POST['buttonCancella'];
$premiModifica=$_POST['buttonModifica'];

//acquisizione variabili da form
$MIP=mysql_real_escape_string($_POST['MIP']);
$TICKET=mysql_real_escape_string($_POST['TICKET']);
$PRODOTTO=mysql_real_escape_string($_POST['PRODOTTO']);
$LICENZA=mysql_real_escape_string($_POST['LICENZA']);
$COGNOME=mysql_real_escape_string($_POST['COGNOME']);
$NOME=mysql_real_escape_string($_POST['NOME']);

$mipscelta=mysql_real_escape_string($_POST['mipscelta']);
$TICKETnuovo=mysql_real_escape_string($_POST['TICKETnuovo']);
$PRODOTTOnuovo=mysql_real_escape_string($_POST['PRODOTTOnuovo']);
$LICENZAnuovo=mysql_real_escape_string($_POST['LICENZAnuovo']);
$COGNOMEnuovo=mysql_real_escape_string($_POST['COGNOMEnuovo']);
$NOMEnuovo=mysql_real_escape_string($_POST['NOMEnuovo']);
$NOTEnuovo=mysql_real_escape_string($_POST['NOTEnuovo']);

$NOTE=$_POST['NOTE'];
$nomi=['MIP','TICKET','PRODOTTO','LICENZA','COGNOME','NOME','LINK','NOTE','MODIFICATO DA','MODIFICATO IL','TOTALE:']; //array di supporto per indice su risultato query
$nomeTAB=['pdl','licenses'];
$indice=1000; //variabile per indice array $nomi, mi serve anche per il controllo sull'avvio della query di ricerca
$campiTABpdl=['MIP','COGNOME','NOME'];
$campiTABlicenses=['MIP','TICKET','PRODOTTO','LICENZA'];
$data=date("d-m-y"); //data, serve per il campo 'modificato il'
$whois=$_SESSION['username']; //variabile session passata pagina di login, serve per il campo 'modificato da'
$supporto="";
$trovato=0; //variabile per visualizzazione esito



//funzione pulisci
if(isset($premiPulisci)){
	$trovato=0;
}
//funzione cerca
if(isset($premiCerca)){
		
	if(!empty($MIP)){
		$supporto=$MIP;
		$indiceNOMEtab=0;
		$indice=0;
	}
	if(!empty($TICKET)){
		$supporto=$TICKET;
		$indiceNOMEtab=1;
		$indice=1;
	}
	if(!empty($PRODOTTO)){
		$supporto=$PRODOTTO;
		$indiceNOMEtab=1;
		$indice=2;
	}
	if(!empty($LICENZA)){
		$supporto=$LICENZA;
		$indiceNOMEtab=1;
		$indice=3;
	}
	if(!empty($COGNOME)){
		$supporto=$COGNOME;
		$indiceNOMEtab=0;
		$indice=4;
	}
	if(!empty($NOME)){
		$supporto=$NOME;
		$indiceNOMEtab=0;
		$indice=5;
	}
	if(!empty($NOTE)){
		$supporto=$NOTE; //mi serve per non far eseguire l'if successivo
		$trovato=5;
	}
	if($supporto==""){
		$trovato=3;
	}
	else if($indice!=1000){
	$sql="SELECT pdl.MIP,licenses.TICKET,licenses.PRODOTTO,licenses.LICENZA,pdl.COGNOME,pdl.NOME,licenses.LINK,licenses.NOTE,licenses.MODIFICATODA,licenses.MODIFICATOIL FROM pdl INNER JOIN licenses ON pdl.MIP=licenses.MIP WHERE $nomeTAB[$indiceNOMEtab].$nomi[$indice] LIKE '$supporto%'";
	$query=mysql_query($sql) or die(mysql_error());
	$numRighe=mysql_num_rows($query); //numero Righe, mi serve per contare
	if($numRighe>=1){
	$numCampi=mysql_num_fields($query); //numero Campi, mi serve per contare
    $result=array();
	$tappo=1;
	$len=0;
	$lenRes=0;
	while($tappo<=$numRighe){
		$row=mysql_fetch_row($query);
		while($len<$numCampi){
			$result[$lenRes]=$row[$len];
			$lenRes++;
			$len++;
		}
		$tappo++;
		$len=0;
	}
	$trovato=1;
	}
	else{
		$trovato=2;
	}
	}	
}
//funzione cancella
if(isset($premiCancella)){  //cancella solo dalla tabella licenses
	$checkQuery="SELECT MIP FROM licenses WHERE MIP='$MIP' AND PRODOTTO='$PRODOTTO'"; //verifico che la mip ed il prodotto inserite esistano
	$checkQueryEseguita=mysql_query($checkQuery) or die(mysql_error());
	$numeroRisultatiCheck=mysql_num_rows($checkQueryEseguita);
	if($numeroRisultatiCheck>0){
		$delquery="DELETE FROM licenses WHERE MIP='$MIP' AND PRODOTTO='$PRODOTTO'";
	    mysql_query($delquery) or die(mysql_error());
	    $trovato=6;
	}
	else {
		$trovato=7;
	}
	
}

if(isset($premiModifica)){
	$modificataPDL=1000; //valori di default..possono essere qualsiasi
	$modificataLICENSES=1000;//valori di default..possono essere qualsiasi
	$checkVERIFICAquery="SELECT MIP FROM pdl WHERE MIP='$mipscelta'";    //query per verificare esistenza della mip da modificare
	$eseguiQUERY=mysql_query($checkVERIFICAquery) or die(mysql_error());
	$contaMIP=mysql_num_rows($eseguiQUERY);
	if($contaMIP==1){                                                    //condizione di esistenza per avviare la modifica
		$checkEsistenzaCAMPIpld="SELECT COGNOME,NOME FROM pdl WHERE MIP='$mipscelta'"; //query check per evitare update inutile
		$eseguiCheck=mysql_query($checkEsistenzaCAMPIpld);
		$campiPDLcheck=mysql_fetch_row($eseguiCheck);
		if($campiPDLcheck[0]==$COGNOMEnuovo && $campiPDLcheck[1]==$NOMEnuovo){
			$modificataPDL=0;
		}
		else{
	         $modificaPDL="UPDATE pdl SET COGNOME='$COGNOMEnuovo', NOME='$NOMEnuovo' WHERE MIP='$mipscelta'";
	         if(mysql_query($modificaPDL)){
		     $modificataPDL=1;
	         }
	         else{mysql_error();}
		}
	$checkEsistenzaCAMPIlicenses="SELECT MIP,TICKET,PRODOTTO,LICENZA,NOTE FROM licenses WHERE MIP='$mipscelta' AND TICKET='$TICKETnuovo' AND PRODOTTO='$PRODOTTOnuovo' AND LICENZA='$LICENZAnuovo' AND NOTE='$NOTEnuovo'"; //query check per evitare update inutile
	$eseguiChecklic=mysql_query($checkEsistenzaCAMPIlicenses);
	$campiLICcheck=mysql_fetch_row($eseguiChecklic);
	if($campiLICcheck[0]==$mipscelta && $campiLICcheck[1]==$TICKETnuovo && $campiLICcheck[2]==$PRODOTTOnuovo && $campiLICcheck[3]==$LICENZAnuovo && $campiLICcheck[4]==$NOTEnuovo){
		$modificataLICENSES=0;
	}
	else{
	$modificaLICENSES="UPDATE licenses SET MIP='$mipscelta',TICKET='$TICKETnuovo',PRODOTTO='$PRODOTTOnuovo',LICENZA='$LICENZAnuovo',NOTE='$NOTEnuovo',MODIFICATODA='$whois',MODIFICATOIL='$data' WHERE MIP='$MIP' AND TICKET='$TICKET' AND PRODOTTO='$PRODOTTO'";
	if(mysql_query($modificaLICENSES)){
		$modificataLICENSES=1;
	    }
	else{mysql_error();}
  	}
	}
else{
		$trovato=11;
	}
	
	if($modificataLICENSES==1 && $modificataPDL==1){
		$trovato=8;
	}
	else if($modificataLICENSES==0 && $modificataPDL==1){
		$trovato=9;
	}
	else if($modificataLICENSES==1 && $modificataPDL==0){
		$trovato=10;
	}
	else if($modificataLICENSES==0 && $modificataPDL==0){
		$trovato=12;
	}
}


?>
	<html>
	<method="POST">
	<div id="divRisulati">
    <fieldset id="fieldRisultati" style="width:30%"><legend>RISULTATI</legend> 
    
	<?php                   //codice che implementazione tabella risultati dinamica
	
	if($trovato==1){
	$j=1;
	$indice=0;
	$res=0;
	$arrayCOPIA=array();
	echo "<table id='innerHeaderResult'<tr>";                              //creo intestazione tabella
	for($z=0;$z<=10;$z++){
		if($z==10){
			echo "<td id='cellaTOTALE'><b>$nomi[$z]&nbsp&nbsp&nbsp$numRighe</b></td>";
		}
		else{
		echo "<td id='cella'>&nbsp&nbsp<b>$nomi[$z]</b>&nbsp&nbsp</td>";
		}
	}
	echo "</tr>";
	echo "<tr>";
	for($z=0;$z<=10;$z++){
	echo "<td id='cellaDIVISORIAvuota'>&nbsp</td>";}
	echo "</tr>";
	$_SESSION['numRighe']=$numRighe; // mi serve nel delete.php
	while($j<=$numRighe){                          //ciclo per le celle della tabella create dinamicamente
	
	    $arrayCOPIA[$indice]=$result[$res];
	    if($indice==6){
			if(!empty($result[$res])){
			echo "<td>
			<form id='formLINK' method='POST' action='$result[$res]' target='_blank'>
            <input id='buttonLINK' type='submit' value='APRI'>
            </form></td>";
		}
		else{                                      // se il valore $result[$res] è vuoto, crea cella vuota
			echo "<td id='cellaNOTEvuota'>NO</td>";
		}
		}
		else if($indice==7){                            //vedi vettore $nomi
		    
			if(!empty($result[$res])){   //se il valore non è vuoto, crea cella con bottone VEDI
			echo "<td> <button id=buttonNOTE onclick='apriNOTE$j()'>VEDI</button>
			<script>function apriNOTE$j(){
				alert('$result[$res]');
				}</script>
				</td>";
			}
			else {                                 // se il valore $result[$res] è vuoto, crea cella vuota
			echo "<td id='cellaNOTEvuota'>NO</td>";
			}
			
		}
		else{
		echo "<td id='cella'>$result[$res]</td>";
		}
		$indice++;
		
		if($indice==10){                                                                    //bottone copia, copio i valori del vettore di supporto arrayCOPIA nei campi del form RECORDS
			echo "<td> <input id=buttonCOPIA type='submit' name='buttonCOPIA' onclick='copiaRECORD$j()' value='COPIA'> 
			<script>function copiaRECORD$j(){
				RECORDS.MIP.value='$arrayCOPIA[0]';
				RECORDS.MIP.style.background='#8dfbac';
				RECORDS.mipscelta.value='$arrayCOPIA[0]';
				RECORDS.TICKET.value='$arrayCOPIA[1]';
				RECORDS.TICKET.style.background='#8dfbac';
				RECORDS.TICKETnuovo.value='$arrayCOPIA[1]';
				RECORDS.PRODOTTO.value='$arrayCOPIA[2]';
				RECORDS.PRODOTTO.style.background='#8dfbac';
				RECORDS.PRODOTTOnuovo.value='$arrayCOPIA[2]';
				RECORDS.LICENZA.value='$arrayCOPIA[3]';
				RECORDS.LICENZA.style.background='#8dfbac';
				RECORDS.LICENZAnuovo.value='$arrayCOPIA[3]';
				RECORDS.COGNOME.value='$arrayCOPIA[4]';
				RECORDS.COGNOME.style.background='#8dfbac';
				RECORDS.COGNOMEnuovo.value='$arrayCOPIA[4]';
				RECORDS.NOME.value='$arrayCOPIA[5]';
				RECORDS.NOME.style.background='#8dfbac';
				RECORDS.NOMEnuovo.value='$arrayCOPIA[5]';
				RECORDS.NOTE.value='$arrayCOPIA[7]';
				RECORDS.NOTE.style.background='#8dfbac';
				RECORDS.NOTEnuovo.value='$arrayCOPIA[7]';
				
			}</script>
			</td>";
			
		}
		$res++;		                              //scorro vettore contenente query
		if($indice==$numCampi){                   //se indice è uguale a numero campi, vado a capo ed azzero indice
			$j++;
			$indice=0;	
            echo "</tr>";			
		}
	}
	echo"</table>";                  //fine visualizzazione risulati
	$i=1;
	$index=0;
	$res1=0;
	
	echo "<div id='export' hidden='true'>";
	echo "<table id='exportTable'<tr>";                              //creo intestazione tabella
	for($z=0;$z<=10;$z++){
		if($z==10){
			echo "<td id='cellaTOTALE'><b>$nomi[$z]&nbsp&nbsp&nbsp$numRighe</b></td>";
		}
		else{
		echo "<td id='cella'>&nbsp&nbsp<b>$nomi[$z]</b>&nbsp&nbsp</td>";
		}
	}
	echo "</tr>";
	echo "<tr>";
	
	while($i<=$numRighe){                          //ciclo per le celle della tabella create dinamicamente
	    
		echo "<td id='cella'>$result[$res1]</td>";
				
		$res1++;		//scorro vettore contenente query
		$index++;
		if($index==$numCampi){                   //se indice è uguale a numero campi, vado a capo ed azzero indice
			$i++;
			$index=0;	
            echo "</tr>";			
		}
	}
	echo"</table>";
	echo "</div>";
	// esportazione dati
	echo "<br><input id='exportRis' type='submit' name='exportRis' value='ESPORTA' onclick='esporta();return false;'><br>";
	echo "<script>function esporta(){
		var tabella= document.getElementById('exportTable');
			
        var html = tabella.outerHTML;
		
		var a = document.createElement('a');
		var datatype='data:html';
		a.href=datatype+','+html;
		a.download='export'+'.html';
		a.click();
	}
	</script>";
	
    }
	else if($trovato==2){
		echo "Nessun record trovato!<br>Riprova!";
	}
	else if($trovato==3){
		echo "Devi valorizzare almeno un campo!<br>Riprova!";
	}
	else if($trovato==5){
		echo "Non puoi cercare per NOTE!<br>Riprova!";
	}
	else if($trovato==6){
		echo "Record Cancellato:<br>$MIP<br>$TICKET<br>$PRODOTTO<br>$LICENZA<br>$COGNOME<br>$NOME<br>$NOTE";
	}
	else if($trovato==7){
		echo "Non è possibile cancellare il record desiderato perchè la combinazione MIP/PRODOTTO non esiste";
	}
	else if($trovato==8){
		echo "Record modificato in PDL e LICENSES";
	}
	else if($trovato==9){
		echo "Record modificato in PDL".$var;
	}
	else if($trovato==10){
		echo "Record modificato in LICENSES";
	}
	else if($trovato==11){
		echo "Record NON modificato perchè il nuovo valore MIP, nel form di modifica, NON ESISTE NELLA TABELLA PDL";
	}
	else if($trovato==12){
		echo "Record NON modificato perchè non è stata apportata alcuna modifica";
	}
	else if($trovato==13){
		echo "export";
	}
	
	
	?>
	
    </fieldset> 
	</div>
    
	</html>


