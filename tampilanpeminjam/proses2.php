<?php 
session_start();
include '../templaitpeminjam/header.php';
include "../config.php";
 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data peminjaman</div>
        </div>



        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
                            <a  class="btn btn-danger" href="tampilbt.php" ">Lihat Kode ID Barang</a>
<a  class="btn btn-success" href="tampilpt.php">Lihat Kode ID Peminjam</a> 
            <form method="POST"><br>  <hr>  


                        <div class="form-group form-label-group">
                           <select class="form-control" name="id_inventaris">
                               <option value="PIlih Kode Barang" disabled="" selected="">PIlih Kode Barang
                               </option>
                               <?php    
                               include "../config.php";
                               $level=mysqli_query($koneksi,"select * from tbl_inventaris");
                        while($data=mysqli_fetch_assoc($level)) {?>
                            <option value="<?php echo $data['id_inventaris']; ?>"><?php echo $data['id_inventaris']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>


                                      <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input class="form-control" name="jumlah_pinjam" type="number" required="">
              </div>

                      <div class="form-group form-label-group">
                           <select class="form-control" name="id_peminjaman">
                               <option value="PIlih Kode peminjaman" disabled="" selected="">PIlih Kode peminjaman
                               </option>
                               <?php    
                               include "../config.php";
                               $level=mysqli_query($koneksi,"select * from tbl_peminjaman");
                        while($data=mysqli_fetch_assoc($level)) {?>
                            <option value="<?php echo $data['id_peminjaman']; ?>"><?php echo $data['id_peminjaman']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>






                
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                      
                    </div>
            </form>
            </div></div>
        </div>

 <?php 

 if(isset($_POST['simpan'])){

$id_inventaris = $_POST['id_inventaris'];
$id_peminjaman = $_POST['id_peminjaman'];
$jumlah_pinjam = $_POST['jumlah_pinjam'];





$tambah = mysqli_query($koneksi, "INSERT INTO tbl_detail_pinjam VALUES('','$id_inventaris','$jumlah_pinjam','$id_peminjaman')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = 'hasil.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = 'proses2.php';
    </script> 

    ";
   }
 }



include '../templaitpeminjam/footer.php';
  ?>

  