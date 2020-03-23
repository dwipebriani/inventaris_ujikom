
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
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
                  LEFT JOIN tbl_ruang ON tbl_inventaris.id_ruang=tbl_ruang.id_ruang
                 

                  ");
                 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                <thead>
                  <tr>    
                    <th>Kode ID Barang</th>           
                    <th>Nama</th>  
                    <th>jumlsh</th>
                    <th>Ruangan</th>
                  </tr>
                </thead>
       
                <tbody>
                  <?php 

              
                    while ($data = mysqli_fetch_array($tampil)) {
                      
                    
                   ?>
                   <tr> 
                      <td><?php echo $data["id_inventaris"] ?></td>
                      <td><?php echo $data["nama"] ?></td>
                      <td><?php echo $data["jumlah"] ?></td>
                      <td><?php echo $data["nama_ruang"] ?></td>


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