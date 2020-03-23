<?php 	
session_start();
$kode_produk= $_GET['kode'];
unset($_SESSION["keranjang"][$kode_produk]);

 echo "<script> alert(Barang yang anda pilih dihapus);</script>";
 echo" <script>location='tambahpeminjaman.php';</script>";

 ?>
