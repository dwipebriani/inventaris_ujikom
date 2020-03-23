<?php 
session_start();

$kode_barang = $_GET['kode'];


if (isset($_SESSION['keranjang'][$kode_barang])) {
 	$_SESSION['keranjang'][$kode_barang]+=1;
 } 
else{
	$_SESSION['keranjang'][$kode_barang] =1;
}




 echo "<script>alert('Barang Dipilih');</script>";
  echo "<script>location='tambahpeminjaman.php';</script>";

 ?>
