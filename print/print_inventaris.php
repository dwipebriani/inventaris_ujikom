<?php
require_once __DIR__ . '../../vendor/autoload.php';



 include '../config.php';


  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
              LEFT JOIN tbl_jenis ON tbl_inventaris.kode_jenis=tbl_jenis.kode_jenis
              LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
              LEFT JOIN tbl_petugas ON tbl_inventaris.id_petugas=tbl_petugas.id_petugas ");

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
			   <th>No</th>
                   <th>Kode Barang</th>            	
                   	<th>Barang</th>
                    <th>Harga Per Barang</th>
                    <th>Ruangan</th>
                    <th>Jumlah Baik</th>
                    <th>Jumlah Rusak</th>
                    <th>Jenis</th>
                    <th>Tanggal Registrasi</th>
                    <th>Keterangan</th>
                    <th>Nama Petugas</th>
		</tr>';

	$i = 1;
	foreach( $tampil as $row ) {
		$html .= '<tr> 
			<td>'. $i++ .'</td>
			<td>'. $row["kode"] .'</td>
			<td>'. $row["nama"] .'</td>
			<td>'. $row["harga"] .'</td>
			<td>'. $row["nama_ruang"]  .'</td>
			<td>'. $row["jumlah_baik"] .'</td>
			<td>'. $row["jumlah_rusak"] .'</td>
			<td>'. $row["nama_jenis"] .'</td>
			<td>'. $row["tanggal_register"] .'</td>
			<td>'. $row["keterangan"] .'</td>
			<td>'. $row["nama_petugas"] .'</td>
		</tr>';
	}

$html .= '</table>
</body>
</html>'; 

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peminjaman.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>
