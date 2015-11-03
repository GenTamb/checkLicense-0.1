<?php
require('connectDB.php');
session_start();
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);

if($username=="" || $password==""){
	header("Location:emptyFIELDS.php");
}
else{

$password=md5($password);
$query="SELECT * FROM profili WHERE username='$username' AND password='$password'";
$result=mysql_query($query);
$count=mysql_num_rows($result);



if($count==1){
	
	$check=array();
	$check=mysql_fetch_array($result);
	
	$_SESSION['username']=$check['username'];
	$_SESSION['password']=$check['password'];
	$_SESSION['nome']=$check['nome'];
	$_SESSION['admin']=$check['admin'];
	$_SESSION['loggedIN']=1;
	
	header("Location:SearchConsole.php");
}

else{
	
	header("Location:notFound.php");
	
}
}


?>