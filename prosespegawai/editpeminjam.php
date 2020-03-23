<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$id_pegawai = $_GET['id_pegawai'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_pegawai where id_pegawai = '$id_pegawai'");
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
            <form method="POST">
              <div class="form-group">
                <label>Nama Peminjam</label>
                <input class="form-control" name="nama_pegawai" value="<?php echo $data['nama_pegawai']; ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" value="<?php echo $data['alamat'] ;?>">
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input class="form-control" name="no_tlp" value="<?php echo $data['no_tlp']; ?>">
              </div>
               <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo $data['username']; ?>">
              </div>
               <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" value="<?php echo $data['password']; ?>">
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
$nama_pegawai = $_POST['nama_pegawai'];
$alamat = $_POST['alamat'];
$no_tlp= $_POST['no_tlp'];
$username= $_POST['username'];
$password= md5($_POST['password']);




$ubah = mysqli_query($koneksi, "UPDATE tbl_pegawai SET nama_pegawai='$nama_pegawai', alamat='$alamat',no_tlp='$no_tlp',username='$username',password='$password' WHERE id_pegawai='$id_pegawai'");


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../datapegawai.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datapegawai.php';
    </script> ";

    
   }
   }
 






include '../templait/footer.php';
  ?>
