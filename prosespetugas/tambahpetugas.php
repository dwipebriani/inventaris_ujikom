<?php 
session_start();
include '../templait/header.php';
include "../config.php";
 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data Petugas</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" required="">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" required="">
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <input class="form-control" name="nama_petugas" required="">
              </div>
                        <div class="form-group form-label-group">
                           <select class="form-control" name="id_level">
                               <option value="Pilih Level" disabled="" selected="">Pilih Level
                               </option>
                               <?php    
                               include "../config.php";
                               $level=mysqli_query($koneksi,"select * from tbl_level");
                        while($data=mysqli_fetch_assoc($level)) {?>
                            <option value="<?php echo $data['id_level']; ?>"><?php echo $data['nama_level']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>
                          <div class="form-group">
                <label>foto</label>
                <input type="file" name="foto" required="">
              </div>

                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../datapetugas.php" class="btn btn-info">Kembali</a>
                    </div>
            </form>
            </div></div>
        </div>

 <?php 

 if(isset($_POST['simpan'])){

$username = $_POST['username'];
$password= md5($_POST['password']);
$nama_petugas = $_POST['nama_petugas'];
$id_level = $_POST['id_level'];
$file_name = $_FILES['foto']['name'];
$sourc = $_FILES['foto']['tmp_name'];
$folder = '../gambar/';
move_uploaded_file($sourc,$folder.$file_name);



$tambah = mysqli_query($koneksi, "INSERT INTO tbl_petugas VALUES('','$nama_petugas','$username','$password','$file_name','$id_level')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../datapetugas.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../datapetugas.php';
    </script> 

    ";
   }
 }



include '../templait/footer.php';
  ?>

  