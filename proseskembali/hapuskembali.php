<?php 	
include'../config.php';
$id_peminjaman= $_GET['id_peminjaman'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_peminjaman where id_peminjaman = '$id_peminjaman'");


if ($hapus) {
	header("location:../datapeminjaman.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus petugas"); window.history.back();</script>';
}
 ?>