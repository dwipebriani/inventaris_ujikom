<?php
require_once __DIR__ . '/vendor/autoload.php';



 include 'config.php';

$id_peminjaman = @$_GET['id_peminjaman'];
$peminjaman=mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman
          LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
          LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
          LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai where tbl_peminjaman.id_peminjaman = '$id_peminjaman'");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Mahasiswa</title>
	<link rel="stylesheet" href="css/print.css">
</head>
<body>
	<h1>Daftar Peminjaman</h1>
	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Userame</th>
			<th>Barang</th>
			<th>Ruang</th> 
			<th>Jumlah</th>
			<th>Tanggal</th>
		</tr>';


	$i = 1;
	foreach( $peminjaman as $row ) {
		$html .= '<tr> 
			<td>'. $i++ .'</td>
			<td>'. $row["username"] .'</td>
			<td>'. $row["nama"] .'</td>
			<td>'. $row["nama_ruang"] .'</td>
			<td>'. $row["jumlah_pinjam"] .'</td>
			<td>'. $row["tanggal_pinjam"] .'</td>
		</tr>';
	}

$html .= '</table>
</body>
</html>'; 

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peminjaman.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>
