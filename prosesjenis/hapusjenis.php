<?php 	
include'../config.php';
$id_jenis= $_GET['id_jenis'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_jenis where id_jenis = '$id_jenis'");


if ($hapus) {
	header("location:../datajenis.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus Jenis"); window.history.back();</script>';
}
 ?>