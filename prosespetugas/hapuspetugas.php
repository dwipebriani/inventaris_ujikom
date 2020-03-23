<?php 	
include'../config.php';
$id_petugas= $_GET['id_petugas'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_petugas where id_petugas = '$id_petugas'");


if ($hapus) {
	header("location:../datapetugas.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>