
<?php 
session_start();
include 'config.php';
include 'templaitdata/header.php';
 ?>
<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <h2>Daftar Barang</h2> </div>
          <div class="card-body">
            <div class="table-responsive">

    <?php   
    include 'config.php';
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
              LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
");


  ?>


              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
                </div>

                <thead class="thead-light">
                  <tr>    
                    <th>No</th>               
                    <th>Barang</th>
                    <th>Ruangan</th>
                    <th>Jumlah</th>
                    <th>Klik Untuk Meminjam</th>
                  </tr>
                </thead>
                    
                <tbody>
                  <?php 
                  $no=1;  
                    while ($data = mysqli_fetch_array($tampil)) {
                   ?>

                      <tr>  
                      <td><?php echo $no++?></td>
                      <td><?php echo $data["nama"] ?></td>
                      <td><?php echo $data["nama_ruang"] ?></td>
                      <td> 
                        <?php   
                          $masaaktif= "$data[jumlah_baik]";
                         ?>
                         <?php  
                          if($masaaktif >0)
                          {
                            echo "$masaaktif";
                          } else {
                            echo "Barang Sudah Habis";
                          }
                          ?>
                      </td>
                      <td><a class="btn btn-danger" href="proses-pinjam-diadmin/pinjam.php?kode=<?= $data['kode']; ?>"><i class="fa fa-cart-plus"></i></a> </td> 
                       

                   </tr>
                         <?php   
              } ?>
              </tbody>
        
          </table>
      </div></div></div>
 

 <?php 
 include 'templaitdata/footer.php';
  ?>