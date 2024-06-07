<?php 
session_start();
$_SESSION['isLogOn']=true;
$_SESSION['userLogin']="jan@kowalski.gmail.com";
$_SESSION['userPassword']="kochamkotki123";
header("Location: http://localhost/login.php");
// header ("Location: ./index.php")
?>