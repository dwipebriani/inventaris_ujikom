<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$kode_jenis = $_GET['kode_jenis'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_jenis where kode_jenis = '$kode_jenis'");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ubah Data jenis</div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST">
              <div class="form-group">

                <div class="form-group">
                <label>Kode jenis</label>
                <input class="form-control" name="kode_jenis" value="<?php echo $data['kode_jenis'] ;?>" readonly>
              </div>
                <label>Nama jenis</label>
                <input class="form-control" name="nama_jenis" value="<?php echo $data['nama_jenis']; ?>">
              </div>
            
              
                    <div class="form-group">
                        <input type="submit" name="edit" value="edit" class="btn btn-primary">
                        <a href="editjenis.php" class="btn btn-info">Kembali</a>
                    </div>
            </form>
            </div>
                

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$nama_jenis = $_POST['nama_jenis'];
$kode_jenis = $_POST['kode_jenis'];




$ubah = mysqli_query($koneksi, "UPDATE tbl_jenis SET  kode_jenis='$kode_jenis',nama_jenis='$nama_jenis' WHERE kode_jenis='$kode_jenis'");


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../datajenis.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datajenis.php';
    </script> ";

    
   }
   }
 

include '../templait/footer.php';
  ?>
