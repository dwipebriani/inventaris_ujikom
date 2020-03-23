<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$kode_ruang = $_GET['kode_ruang'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_ruang where kode_ruang = '$kode_ruang'");
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
                 <div class="form-group">
                <label>Kode Ruang</label>
                <input class="form-control" name="kode_ruang" value="<?php echo $data['kode_ruang'] ;?>" readonly>
              </div>
        				<label>Nama Ruang</label>
        				<input class="form-control" name="nama_ruang" value="<?php echo $data['nama_ruang']; ?>">
        			</div>
        			<div class="form-group">
        				<label>Keterangan</label>
        				<input class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>">
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
$nama_ruang = $_POST['nama_ruang'];
$kode_ruang = $_POST['kode_ruang'];
$keterangan= $_POST['keterangan'];



$ubah = mysqli_query($koneksi, "UPDATE tbl_ruang SET kode_ruang='$kode_ruang',nama_ruang='$nama_ruang',keterangan='$keterangan' WHERE kode_ruang='$kode_ruang'");


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../dataruang.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../dataruang.php';
    </script> ";

    
   }
   }
 


include '../templait/footer.php';
  ?>
