<?php   

session_start();
include '../templaitpeminjam/header.php';
include "../config.php";

 ?>



        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data peminjaman</div>
          <div class="card-body">
            <div class="table-responsive">

    <?php 	
    include '../config.php';
   
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman
          LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
          LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
          LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai where status_peminjaman='proses' order by id_peminjaman desc");


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
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    
                    
                   
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
                      
                       <td> <?php echo $data["tanggal_kembali"] ?><br>
                        <?php   
                          $masaaktif= "$data[tanggal_kembali]";
                          $sekarang = date("d-m-Y");
                          $masaberlaku = strtotime($masaaktif)-strtotime($sekarang);
                         ?>

                         <?php  
                          if($masaberlaku/(24*60*60)<1)
                          {
                            echo "<font color='red'><font size=3>Masa pinjam Berakhir";
                          }
                          elseif($masaberlaku/(24*60*60)<8)
                          {
                            echo "".$masaberlaku/(24*60*60)."hari lagi";
                            echo "
                              <font color='blue'><font size=3><b> Masa Pinjam akan berakhir</b></font>
                            ";
                          }
                          ?>
                      </td>

                      <td><?php echo $data["status_peminjaman"] ?></td>
                      
                       

                   </tr>
                   <?php  
              } ?>
              </tbody>
              
          </table>
           <div class="form-group">
                        
                  
                    </div>
      </div></div></div>
 
 <?php  

 include "../templaitpeminjam/footer.php";

?>

