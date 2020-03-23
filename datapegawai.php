<?php   
session_start();
include 'templaitdata/header.php';
 ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Peminjam</div>
          <div class="card-body">
            <div class="table-responsive">

                <?php   
                include 'config.php';
               
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai ORDER BY id_pegawai DESC");

               
                 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
                  <a href="prosespegawai/tambahpeminjam.php" class="btn btn-primary">[+]Tambah peminjam</a>
                </div><br>

                <thead>
                  <tr>    
                    <th>No</th>               
                    <th>Nama Peminjam</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Username</th>
                    <th>Password</th>
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
                      <td><?php echo $data['nama_pegawai'] ?></td>
                      <td><?php echo $data['alamat'] ?></td>
                      <td><?php echo $data['no_tlp'] ?></td>
                      <td><?php echo $data['username'] ?></td>
                      <td><?php echo $data['password'] ?></td>

                      <td><a class="btn btn-primary" href="prosespegawai/editpeminjam.php?id_pegawai=<?php echo $data['id_pegawai'];?>"><i class="fa fa-w fa-edit"></i></a> 
                       <a class="btn btn-danger" href="prosespegawai/hapuspegawai.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td> 
                      
                   </tr>
             
              <?php   
              } ?>
               </tbody>
          </table>
      </div></div></div>
 
 <?php  
include'templaitdata/footer.php';
  ?>