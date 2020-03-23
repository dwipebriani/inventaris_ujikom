<?php 
session_start();
include '../templait/header.php';
include "../config.php";

$id_peminjaman = @$_GET['id_peminjaman'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman 
              LEFT JOIN tbl_inventaris ON tbl_peminjaman.kode=tbl_inventaris.kode where id_peminjaman = '$id_peminjaman'");
$data = mysqli_fetch_assoc($query);

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Form</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form  method="POST">

                <div class="form-group">
                <input class="form-control" type="hidden" value="<?php echo $data['id_peminjaman'] ?>"  name="id_peminjaman" required="" >
              </div> 
                  <div class="form-group">
                <input class="form-control" type="hidden" name="kode" value="<?php echo $data['kode'] ?>"  required="" >
              </div>  
                <div class="form-group">
                <label>Kembali Baik</label>
                <input class="form-control" name="kembali_baik" required="" placeholder="Jumlah Kembali">
              </div>
                <div class="form-group">
                <label>Kembali Rusak</label>
                <input class="form-control" name="kembali_rusak" required="" placeholder="Jumlah Rusak">
              </div>
                    <div class="form-group">
                        <input type="submit" type="hidden" name="simpan" value="PENGEMBALIAN" class="btn btn-success" alt="">

                        
                        
                    </div>
            </form>
            </div></div>
        </div>

 <?php 
if(isset($_POST['simpan'])){
$id_peminjaman= $_POST['id_peminjaman'];
$kode= $_POST['kode'];
$kembali_baik= $_POST['kembali_baik'];
$kembali_rusak = $_POST['kembali_rusak'];


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_pengembalian(id_pengembalian,id_peminjaman,kode,kembali_tanggal,kembali_rusak,kembali_baik) VALUES('','$id_peminjaman','$kode',now(),'$kembali_rusak','$kembali_baik')");

 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
   echo "
    <script>
      alert('Pengembalian Telah Berhasil');
      window.location.href = '../datakembali.php';
    </script>
    ";
   } else {
     echo "
    <script>
      alert('Anda Gagal Meminjam !');
      window.location.href = 'tambahpeminjaman.php';
    </script> 

    ";
   }
 }


 include "../templait/footer.php";

?>