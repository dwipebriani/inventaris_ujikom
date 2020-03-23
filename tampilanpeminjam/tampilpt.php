
<?php   
session_start();
include '../templaitpeminjam/header.php';
 ?>


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Peminjaman</div>
          <div class="card-body">
            <div class="table-responsive">

                <?php   
                include '../config.php';
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman 
                  LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai
                 

                  ");
                 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                <thead>
                  <tr>    
                    <th>Kode ID Peminjam</th>           
                    <th>Username</th>  
                    <th>tanggal_pinjam</th>
                    <th>tanggal_kembali</th>
                  </tr>
                </thead>
       
                <tbody>
                  <?php 

              
                    while ($data = mysqli_fetch_array($tampil)) {
                      
                    
                   ?>
                   <tr> 
                      <td><?php echo $data["id_peminjaman"] ?></td>
                      <td><?php echo $data["username"] ?></td>
                      <td><?php echo $data["tanggal_pinjam"] ?></td>
                      <td><?php echo $data["tanggal_kembali"] ?></td>


                   </tr>

                       
                   
              </tbody>
              <?php   
              } ?>
          </table>
           <a href="proses2.php" class="btn btn-info">Kembali</a>
      </div></div></div>

<?php 
include "../templaitpeminjam/footer.php";
 ?>