<?php 	
include'../config.php';
$kode= $_GET['kode'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_inventaris where kode = '$kode'");


if ($hapus) {
	header("location:../datainventaris.php");
} else{

echo'<script language="javascript">alert("Gagal Hapus Inventaris"); window.history.back();</script>';
}
 ?>