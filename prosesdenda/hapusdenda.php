<?php 	
include'../config.php';
$id_pengembalian= $_GET['id_pengembalian'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_pengembalian where id_pengembalian = '$id_pengembalian'");

if ($hapus) {
	header("location:../dendarusak.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>