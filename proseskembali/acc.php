<?php 
session_start();

include '../config.php';
include '../templait/header.php';

$id_peminjaman = @$_GET['id_peminjaman'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman
          LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode
          LEFT JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
          LEFT JOIN tbl_pegawai ON tbl_peminjaman.id_pegawai=tbl_pegawai.id_pegawai where id_peminjaman = '$id_peminjaman'");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST">

                <div class="form-group">
               
                <input class="form-control" type="hidden" name="status_peminjaman" value="dipinjam">
              </div>

              <div class="form-group">
                <input class="form-control" type="hidden" name="kode" value="<?php echo $data['kode'] ?>"  required="" >
              </div>  

                <div class="form-group">
               <input class="form-control" name="nama" value="<?php echo $data['username']; ?>" readonly>
              </div>
              <div class="form-group">
               <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly>
              </div>
              <div class="form-group">

               <input class="form-control" name="nama" value="<?php echo $data['nama_ruang']; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input class="form-control" name="jumlah_baik" value="<?php echo $data['jumlah_pinjam'] ;?>" readonly>
              </div>
               
              <div class="form-group">
 
                    <div class="form-group">
                        <input type="submit" name="edit" value="Tanggapi" class="btn btn-primary">
                        
                    </div>
            </form>
            </div>


                

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$status_peminjaman = $_POST['status_peminjaman'];
$kode= $_POST['kode'];





$ubah = mysqli_query($koneksi, "UPDATE tbl_peminjaman SET status_peminjaman='$status_peminjaman' WHERE id_peminjaman='$id_peminjaman'");



 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('Lanjut Untuk Mengembalikan?');
      window.location.href = '../datakembali.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datapeminjaman.php';
    </script> ";

    
   }
   }
 


include '../templait/footer.php';
  ?>



  