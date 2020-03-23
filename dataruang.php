
<?php 	
session_start();
if(!isset($_SESSION['petugas_level'])) header("location:login.php");
include 'templaitdata/header.php';
 ?>


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Ruang</div>
          <div class="card-body">
            <div class="table-responsive">

            		<?php 	
            		include'config.php';
                
            		$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_ruang ORDER BY kode_ruang DESC");

            		 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <div class="text-left">
                  <a href="prosesruang/tambahruang.php" class="btn btn-primary">[+]Tambah Ruang</a>
                </div>

                <thead>
                  <tr>    
                      <th>No</th> 
                      <th>Kode Ruang</th>             	
                   	<th>Nama Ruang</th>
                    <th>Keterangan</th>
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
                        <td><?php echo $data['kode_ruang'] ?></td>
                   		<td><?php echo $data['nama_ruang'] ?></td>
                      <td><?php echo $data['keterangan'] ?></td>
                   	
                   		
                      <td><a class="btn btn-primary" href="prosesruang/editruang.php?kode_ruang=<?php echo $data['kode_ruang'];?>"><i class="fa fa-w fa-edit"></i></a> 
                         <a class="btn btn-danger btn-sm btn-trash" href="prosesruang/hapusruang.php?kode_ruang=<?php echo $data['kode_ruang']; ?>"><i class="fa fa-w fa-trash"></i></a></td> 
                      

                   </tr>
              
              <?php 	
              } ?>
              </tbody>
          </table>
      </div></div></div>
 


 <?php 	
include'templaitdata/footer.php';
  ?>