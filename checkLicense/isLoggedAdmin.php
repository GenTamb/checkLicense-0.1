<?php
session_start();
if($_SESSION['loggedIN']!=1 && $_SESSION['admin']!=1){
header("location:notLogged.php");}
?>