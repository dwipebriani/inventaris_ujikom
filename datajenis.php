<?php   
session_start();
include 'templaitdata/header.php';
 ?>


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Jenis</div>
          <div class="card-body">
            <div class="table-responsive">

  <?php   
  include 'config.php';
   $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_jenis");

 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
                <a href="prosesjenis/tambahjenis.php" class="btn btn-primary">[+]Tambah jenis</a>
                </div><br>

                <thead>
                  <tr>    
                    <th>No</th>   
                    <th>Kode jenis</th>            
                    <th>Nama jenis</th>
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
                       <td><?php echo $data['kode_jenis'] ?></td>
                      <td><?php echo $data['nama_jenis'] ?></td>
                     
   

                      <td><a class="btn btn-primary" href="prosesjenis/editjenis.php?kode_jenis=<?php echo $data['kode_jenis'];?>"><i class="fa fa-w fa-edit"></i></a> 
                         <a class="btn btn-danger" href="prosesjenis/hapusjenis.php?kode_jenis=<?php echo $data['kode_jenis']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 
                      
                   </tr>
              
              <?php   
              } ?>
              </tbody>
          </table>
      </div></div></div>

 <?php  
include 'templaitdata/footer.php';
  ?>