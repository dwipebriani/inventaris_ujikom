<?php   
session_start();
include 'templaitdata/header.php';
 ?>

 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index2.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Inventaris</div>
          <div class="card-body">
            <div class="table-responsive">

               <a class="btn btn-primary btn btn-right" href="print/print_pengembalian.php" target="_blank"><i class="fa fa-w fa-print"></i>Print</a> 

    <?php   
    include 'config.php';

    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian
              LEFT JOIN tbl_peminjaman ON tbl_pengembalian.id_peminjaman=tbl_peminjaman.id_peminjaman
              LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
              LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
              LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai ");
 // tombol cari ditekan 

  ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
              
                </div>

                <thead>
                  <tr>    
                    <th>No</th>               
                    <th>Username</th>
                    <th>Barang <br> &<br>Ruang</th>
                    
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah <br>  Baik</th>
                    <th>Jumlah <br> rusak</th>
                    <th>Hilang</th>
                    <th>Denda Terlambat</th>
                    <th>Denda Rusak</th>
                    <th>Denda Hilang</th>
                
                    <th>Action</th>

                  </tr>
                </thead>
                    
                <tbody>
                  <?php 
                  $no=1;  
                    while ($data = mysqli_fetch_array($tampil)) {
                   ?>

                      <tr>  
                      <td><?php echo $no++?></td>
                      <td><?php echo $data["username"] ?></td>
                      <td><?php echo $data["nama"]?><br><?php echo $data["nama_ruang"] ?></td>
                   
                      <td><?php echo $data["jumlah_pinjam"]   ?></td>
                      <td><?php echo $data["kembali_tanggal"] ?></td>
                      <td><?php echo $data["kembali_baik"] ?></td>
                      <td><?php echo $data["kembali_rusak"] ?></td>
                      <td><?php echo $data["hilang"] ?></td>
<td>   <?php
$begin = new DateTime($data["tanggal_kembali"]);
$end = new DateTime($data["kembali_tanggal"]);
$denda=1000;
$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
//mendapatkan range antara dua tanggal dan di looping
$i=0;
$x     =    0;
$end     =    1;

foreach($daterange as $date){
    $daterange     = $date->format("Y-m-d");
    $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

    //Convert tanggal untuk mendapatkan nama hari
    $day         = $datetime->format('D');

    //Check untuk menghitung yang bukan hari sabtu dan minggu
    if($day!="Sun" && $day!="Sat") {
        //echo $i;
        $x    +=    $end-$i;
        
    }
    $end++;
    $i++;
}    
$total= $x*$denda;
echo number_format($total);

?></td>
<td><?php 
                      $Jumlah = $data['kembali_rusak'];
                      $hargaasli =$data['harga'];
                      $hasil= $hargaasli*$Jumlah/2;
                      echo number_format($hasil);
                       ?></td>
                      <td><?php 
                      $Jumlah = $data['hilang'];
                      $hargaasli =$data['harga'];
                      $hasil= $hargaasli*$Jumlah;
                      echo number_format($hasil);
                       ?></td>

  <td> <a class="btn btn-danger btn-xs" href="proseskembali/hapusdenda.php?id_pengembalian=<?php echo $data['id_pengembalian'];?>&id_pengembalian=<?php echo $data['id_pengembalian'];?>">Lunas</a>  
                      </td>

                      
                     
                   

                    <!--   <td>
                         <a class="btn btn-danger btn-sm btn-trash" href="proseskembali/hapuskembali.php?id_pengembalian=<?php echo $data['id_pengembalian'];?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a>
                
                         <a class="btn btn-primary" href="proseskembali/editkembali.php?id_pengembalian=<?php echo $data['id_pengembalian'];?>"><i class="fa fa-w fa-edit"></i></a> 
                      </td>
 -->
                   </tr>
              
              <?php   
              } ?>
              </tbody>
          </table>
      </div></div></div>
 
 <?php  
include'templaitdata/footer.php';
  ?>