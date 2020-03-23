<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$id_petugas = $_GET['id_petugas'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_petugas 
              INNER JOIN tbl_level ON tbl_petugas.id_level=tbl_level.id_level
               where tbl_petugas.id_petugas = '$id_petugas'");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ubah Data Ruang</div>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo $data['username'] ;?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" value="<?php echo $data['password']; ?>">
              </div>
              
              <div class="form-group">
                <label>Nama Petugas</label>
                <input class="form-control" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>">
              </div>


             <div class="form-group form-label-group">
                    <select class="form-control" name="id_level">
                        <option value="<?php echo $data['id_level']; ?>" selected=""><?php echo $data['nama_level']; ?></option>
                        <?php
                        $level=mysqli_query($koneksi,"select * from tbl_level");
                        while($datadata=mysqli_fetch_assoc($level)) {?>
                            <option value="<?php echo $datadata['id_level']; ?>"><?php echo $datadata['nama_level']; ?></option>
                            <?php 
                                }
                             ?>
                    </select></div>

                <div class="form-group">
                <label>Foto</label>
                <img width="90" height="90" src="../gambar/<?= $data['foto'];?>" >
                <input type="file" name="file_name">
              </div>

                      
               


                    <div class="form-group">
                        <input type="submit" name="edit" value="edit" class="btn btn-primary">
                        
                    </div>
            </form>
            </div>
              

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$username = $_POST['username'];
$password= md5($_POST['password']);

$nama_petugas = $_POST['nama_petugas'];
$id_level = $_POST['id_level'];
$file_name = $_FILES['file_name']['name'];
 if ($file_name=="") {

$ubah = mysqli_query($koneksi, "UPDATE tbl_petugas SET nama_petugas='$nama_petugas', username='$username',password='$password',id_level='$id_level' WHERE id_petugas='$id_petugas'");

 }
 else {

$sourc = $_FILES['file_name']['tmp_name'];
$folder = '../gambar/';
move_uploaded_file($sourc,$folder.$file_name);
  
$ubah = mysqli_query($koneksi, "UPDATE tbl_petugas SET nama_petugas='$nama_petugas', username='$username',password='$password',foto='$file_name',id_level='$id_level' WHERE id_petugas='$id_petugas'");
 }







 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../datapetugas.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datapetugas.php';
    </script> ";

    
   }
   }
 


include '../templait/footer.php';
  ?>
