<?php 
session_start();
include '../templait/header.php';
include "../config.php";


$nomer = mysqli_query($koneksi, "SELECT kode_ruang FROM tbl_ruang ORDER BY kode_ruang DESC");
$kd_ruang = mysqli_fetch_array($nomer);
$kode_ruang = $kd_ruang['kode_ruang'];

$urut = substr($kode_ruang, 6, 3);
$bertambah = (int) $urut + 1;
$bln = date("m");
$thn = date("y");

if (strlen($bertambah) == 1) {
  $format = "RG".$bln.$thn."00".$bertambah;
}else if (strlen($bertambah) == 2) {
  $format = "RG".$bln.$thn."0".$bertambah;
}else {
  $format = "RG".$bln.$thn.$bertambah;
}
 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data Ruang</div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<div class="col-lg-6">
        		<form  method="POST">
        			<div class="form-group">
                <div class="form-group">
                <label>kode_ruang Ruang</label>
                <input class="form-control" name="kode_ruang" value="<?php echo $format; ?>" required="" readonly>
              </div>
        				<label>Nama Ruang</label>
        				<input class="form-control" name="nama_ruang" required="">
        			</div>
        			<div class="form-group">
        				<label>Keterangan</label>
        				<input class="form-control" name="keterangan" required="">
        			</div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../dataruang.php" class="btn btn-info">Kembali</a>
                    </div>
        		</form>
        		</div></div>
        </div>
        

 <?php 
 if(isset($_POST['simpan'])){
  $kode_ruang = $_POST['kode_ruang'];

$nama_ruang= $_POST['nama_ruang'];

$keterangan= $_POST['keterangan'];

$tambah = mysqli_query($koneksi, "INSERT INTO tbl_ruang(kode_ruang,nama_ruang,keterangan) VALUES('$kode_ruang','$nama_ruang','$keterangan')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../dataruang.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../dataruang.php';
    </script> 

    ";
   }
 }




include '../templait/footer.php';
  ?>

  