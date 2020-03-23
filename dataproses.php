<?php 	
session_start();
if(!isset($_SESSION['petugas_level'])) header("location:login.php");
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
            Data peminjaman</div>
          <div class="card-body">
            <div class="table-responsive">


              <a class="btn btn-primary btn btn-right" href="print.php" target="_blank"><i class="fa fa-w fa-print"></i>Print</a> 

    <?php 	
    include 'config.php';
    
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman
          LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
          LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
          LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai where status_peminjaman ='proses' ORDER BY id_peminjaman DESC ");


  ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                <div class="text-left">
                  
                </div>

                <thead>
                  <tr>    
                    <th>No</th>
                  
                    <th>Username</th>              	
                   	<th>Barang Pinjam</th>
                    <th>Ruang</th>
                    <th>Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Harus Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                   		<td><?php echo $data["nama"] ?></td>
                      <td><?php echo $data["nama_ruang"] ?></td>
                      <td><?php echo $data["jumlah_pinjam"] ?></td>
                      <td><?php echo $data["tanggal_pinjam"] ?></td>
                       <td> <?php echo $data["tanggal_kembali"]?></td> 
<td><?php echo $data["status_peminjaman"] ?></td>
                        

                      
                      
                        <td><a class="btn btn-success" href="proseskembali/acc.php?id_peminjaman=<?php echo $data['id_peminjaman'];?>&kode=<?php echo $data['kode'];?>">Detail</a>

                       

                         
                      </td>

                   </tr>
             
              <?php 	
              } ?>
               </tbody>
          </table>
      </div></div></div>
 
 <?php  
include'templaitdata/footer.php';
  ?>