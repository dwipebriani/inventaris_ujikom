<?php 	
include'../config.php';
$id_pegawai= $_GET['id_pegawai'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_pegawai where id_pegawai = '$id_pegawai'");

if ($hapus) {
	header("location:../datapegawai.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>