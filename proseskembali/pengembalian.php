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
            Ubah Data Ruang</div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST">

                <div class="form-group">
               
                <input class="form-control" type="hidden" name="status_peminjaman" value="Dikembalikan">
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
                <input class="form-control" type="number" name="kembali_baik" required="" placeholder="kembali baik...">
              </div>
                <div class="form-group">
                <input class="form-control" type="number" name="kembali_rusak" required="" placeholder="kembali rusak...">
              </div>
              <div class="form-group">
                <input class="form-control" type="number" name="hilang" required="" placeholder="jumlah hilang">
              </div>
              <div class="form-group">
 
                    <div class="form-group">
                        <input type="submit" name="edit" value="Kembali" class="btn btn-primary">
                        
                    </div>
            </form>
            </div>


                

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$status_peminjaman = $_POST['status_peminjaman'];
$kode= $_POST['kode'];
$kembali_baik= $_POST['kembali_baik'];
$kembali_rusak = $_POST['kembali_rusak'];
$hilang = $_POST['hilang'];




$ubah = mysqli_query($koneksi, "UPDATE tbl_peminjaman SET status_peminjaman='$status_peminjaman' WHERE id_peminjaman='$id_peminjaman'");
$simpan =  mysqli_query($koneksi, "INSERT INTO tbl_pengembalian(id_pengembalian,id_peminjaman,kode,kembali_tanggal,kembali_rusak,kembali_baik,hilang) VALUES('','$id_peminjaman','$kode',now(),'$kembali_rusak','$kembali_baik','$hilang')");



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



  