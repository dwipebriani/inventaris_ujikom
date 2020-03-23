<?php 	

session_start();
$_SESSION["petugas_id"];
$_SESSION["petugas_username"];


unset($_SESSION["petugas_id"]);
unset($_SESSION["petugas_username"]);


session_unset();
session_destroy();

header("location:login.php");
 ?>