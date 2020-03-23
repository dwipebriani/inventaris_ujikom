<?php   
session_start();


include '../templaitpeminjam/header.php';
 ?>

 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index2.php">Beranda</a>
          </li>
          <li class="breadcrumb-item active">data</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Jenis</div>
          <div class="card-body">
            <div class="table-responsive">

                <?php   
                include '../config.php';
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_detail_pinjam 
                
               LEFT JOIN tbl_inventaris ON tbl_detail_pinjam.id_inventaris=tbl_inventaris.id_inventaris
               LEFT JOIN tbl_ruang ON tbl_inventaris.id_ruang=tbl_ruang.id_ruang
                 LEFT JOIN tbl_peminjaman ON tbl_detail_pinjam.id_peminjaman=tbl_peminjaman.id_peminjaman
               LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai");
                 ?>

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <div class="text-left">
                  <a href="prosesdetailpinjam/tambahdetailpinjam1.php" class="btn btn-primary">[+]Tambah detail pinjam</a>
                </div><br>

                <thead>
                  <tr>    
                    <th>No</th>               
                    <th>Barang</th>
                    <th>Ruangan</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Username Peminjam</th>
                    <th>Terlambat</th>
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
                      <td><?php echo $data["nama"] ?></td>
                      <td><?php echo $data["nama_ruang"] ?></td>
                      <td><?php echo $data["jumlah_pinjam"] ?></td>
                      <td><?php echo $data["tanggal_pinjam"] ?></td>
                      <td><?php echo $data["tanggal_kembali"] ?></td>
                      <td><?php echo $data["username"] ?></td>
                      <td><?php echo $data["tanggal_kembali"];?><br>  
                        <?php   
                          $masaaktif= "$data[tanggal_kembali]";
                          $sekarang = date("d-m-Y");
                          $masaberlaku = strtotime($masaaktif)-strtotime($sekarang);
                         ?>
                         <?php  
                          if($masaberlaku/(24*60*60)<1)
                          {
                            echo "<font color='red'><font size=1>Sudah Habis";
                          }

                          elseif($masaberlaku/(24*60*60)<8)
                          {
                            echo "".$masaberlaku/(24*60*60)."hari lagi";
                            echo "
                              <font color='blue'><font size=1><b> Masa Pinjam akan habis</b></font>
                            ";
                          }
                          ?>

                      </td>

                      <td><?php echo $data["status_peminjaman"] ?></td>
                      <td><a class="btn btn-primary" href="prosesdetailpinjam/editdetailpinjam.php?id_detail_pinjam=<?php echo $data['id_detail_pinjam'];?>"><i class="fa fa-w fa-edit"></i></a> </td>
                        <td> <a class="btn btn-danger" href="prosesdetailpinjam/hapusdetailpinjam.php?id_detail_pinjam=<?php echo $data['id_detail_pinjam']; ?>"  onclick="return confirm('yakin dihapus ?');"><i class="fa fa-w fa-trash"></i></a></td>



                      
                   </tr>
              </tbody>
              <?php   
              } ?>
          </table>
      </div></div></div>
 

 <?php  
include '../templaitpeminjam/footer.php';
  ?>