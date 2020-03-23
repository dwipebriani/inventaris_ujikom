<?php 	

session_start();
$_SESSION["pegawai_id"];
$_SESSION["pegawai_username"];


unset($_SESSION["pegawai_id"]);
unset($_SESSION["pegawai_username"]);


session_unset();
session_destroy();

header("location:login_pegawai.php");
 ?>