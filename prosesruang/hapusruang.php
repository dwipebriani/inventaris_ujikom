<?php 	
include'../config.php';
$id_ruang= $_GET['id_ruang'];
$hapus =mysqli_query($koneksi, "DELETE FROM tbl_ruang where id_ruang = '$id_ruang'");


if ($hapus) {
	header("location:../dataruang.php " );

} else{

echo'<script language="javascript">alert("Gagal Hapus Ruang"); window.history.back();</script>';
}
 ?> 