<?php 
session_start();
include 'config.php';
include 'templaitdata/header.php';
 ?>
 <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Pengembalian</div>
          <div class="card-body">
            <div class="table-responsive">

  <?php   
 include 'config.php';
 $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian 
            LEFT JOIN tbl_detail_pinjam ON tbl_pengembalian.id_detail_pinjam=tbl_detail_pinjam.id_detail_pinjam
            LEFT JOIN tbl_inventaris ON tbl_detail_pinjam.id_inventaris=tbl_inventaris.id_inventaris
            LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
            LEFT JOIN tbl_peminjaman ON tbl_detail_pinjam.id_peminjaman=tbl_peminjaman.id_peminjaman
            LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai ORDER BY id_pengembalian DESC
						");
      ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="text-left">
                  <a href="prosespengembalian/tambahpengembalian.php" class="btn btn-primary">[+]Pengembalian</a>
                </div><br>

                <thead>
                  <tr>    
                    <th>No</th>  
                    <th>Username</th>             
                    <th>Barang</th>
                    <th>Ruangan</th>
                    <th>Jumlah Kembali</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th colspan="2">action</th>
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
                      <td><?php echo $data["jumlah_kembali"] ?></td>
                      <td><?php echo $data["tanggal_pinjam"] ?></td>
                      <td><?php echo $data["tanggal_kembali"] ?></td>
                      <td><?php echo $data["status_peminjaman"] ?></td>

                      

                        <td> <a class="btn btn-danger" href="prosespengembalian/hapuspengembalian.php?id_pengembalian=<?php echo $data['id_pengembalian']; ?>"  onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td>



                      
                   </tr>
              
              <?php   
              } ?>
              </tbody>
          </table>
      </div></div></div>

      <?php 
include "templaitdata/footer.php";
       ?>