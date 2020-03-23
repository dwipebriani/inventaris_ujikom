<?php   
session_start();
if(!isset($_SESSION['petugas_level'])) header("location:login.php");
include 'templaitdata/header.php';
 ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data petugas</div>
          <div class="card-body">
            <div class="table-responsive">

                <?php   
                include 'config.php';
                
                $tampil = mysqli_query($koneksi,"SELECT * FROM tbl_petugas
          LEFT JOIN tbl_level ON tbl_petugas.id_level=tbl_level.id_level");

                 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <div class="text-left">
                  <a href="prosespetugas/tambahpetugas.php" class="btn btn-primary">[+]Tambah Petugas</a>
                </div><br>

                <thead>
                  <tr>    
                      <th>No</th>   
                    <th>Username</th>
                    <th>Password</th>            
                    <th>Nama Petugas</th>
                    <th>Foto</th>
                    <th>Level</th>
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
                      <td><?php echo $data['username'] ?></td>
                      <td><?php echo $data['password'] ?></td>
                      <td><?php echo $data['nama_petugas'] ?></td>

                      <td><img src="gambar/<?php echo $data['foto']; ?>" width="90"></td>

                      <td><?php echo $data['nama_level'] ?></td>
                      <td><a class="btn btn-primary" href="prosespetugas/editpetugas.php?id_petugas=<?php echo $data['id_petugas'];?>"><i class="fa fa-w fa-edit"></i></a> 
                         <a class="btn btn-danger" href="prosespetugas/hapuspetugas.php?id_petugas=<?php echo $data['id_petugas']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 
                      

                   </tr>
             
              <?php   
              } ?>
               </tbody>
          </table>
      </div></div></div>
 


 <?php  
include'templaitdata/footer.php';
  ?>