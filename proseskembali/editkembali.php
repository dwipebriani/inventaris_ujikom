<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$id_pengembalian = $_GET['id_pengembalian'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian
              LEFT JOIN tbl_peminjaman ON tbl_pengembalian.id_peminjaman=tbl_peminjaman.id_peminjaman
              LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
              LEFT JOIN tbl_ruang ON tbl_inventaris.id_ruang=tbl_ruang.id_ruang
              LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai where tbl_pengembalian.id_pengembalian = '$id_pengembalian'");
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
                <label>Barang</label>
                <input class="form-control" name="nama" value="<?php echo $data['nama'] ;?>" readonly>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo $data['username']; ?>" readonly>
              </div>
        			<div class="form-group">
        				<label>Jumlah Baik</label>
        				<input class="form-control" name="kembali_baik" value="<?php echo $data['kembali_baik']; ?>">
        			</div>
              <div class="form-group">
                <label>Jumlah Rusak</label>
                <input class="form-control" name="kembali_rusak" value="<?php echo $data['kembali_rusak']; ?>">
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
$nama = $_POST['nama'];
$username = $_POST['username'];
$kembali_baik= $_POST['kembali_baik'];
$kembali_rusak= $_POST['kembali_rusak'];



$ubah = mysqli_query($koneksi, "UPDATE tbl_pengembalian SET kembali_baik='$kembali_baik',kembali_rusak='$kembali_rusak' WHERE id_pengembalian='$id_pengembalian'");


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../datakembali.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datakembali.php';
    </script> ";

    
   }
   }
 


include '../templait/footer.php';
  ?>
