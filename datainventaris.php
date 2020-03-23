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

                <a class="btn btn-primary btn btn-right" href="print/print_inventaris.php" target="_blank"><i class="fa fa-w fa-print"></i>Print</a> 


    <?php 	
    include 'config.php';
   
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
              LEFT JOIN tbl_jenis ON tbl_inventaris.kode_jenis=tbl_jenis.kode_jenis
              LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
              LEFT JOIN tbl_petugas ON tbl_inventaris.id_petugas=tbl_petugas.id_petugas order by tbl_inventaris.kode desc ");



  ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
                  <a href="prosesinventaris/tambahinventaris.php" class="btn btn-primary">[+]Tambah Inventaris</a>
                </div>

                <thead>
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
                      <td><?php echo $data["kode"] ?></td>
                   		<td><?php echo $data["nama"] ?></td>
                      <td><?php echo number_format($data["harga"]) ?></td>
                      <td><?php echo $data["nama_ruang"] ?></td>
                      <td><?php echo $data["jumlah_baik"] ?></td>
                      <td><?php echo $data["jumlah_rusak"]   ?></td>
                      <td><?php echo $data["nama_jenis"] ?></td>
                      <td><?php echo $data["tanggal_register"] ?></td>
                   		<td><?php echo $data["keterangan"] ?></td>
                      <td><?php echo $data["nama_petugas"] ?></td>

                      <td><a class="btn btn-primary" href="prosesinventaris/editinventaris.php?kode=<?php echo $data['kode'];?>"><i class="fa fa-w fa-edit"></i></a> 
                         <a class="btn btn-danger btn-sm btn-trash" href="prosesinventaris/hapusinventaris.php?kode=<?php echo $data['kode'];?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a>
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