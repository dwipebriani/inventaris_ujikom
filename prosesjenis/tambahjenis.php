<?php 
session_start();
include "../templait/header.php";
include "../config.php";

$nomer = mysqli_query($koneksi, "SELECT kode_jenis FROM tbl_jenis ORDER BY kode_jenis DESC");
$kd_jenis = mysqli_fetch_array($nomer);
$kode_jenis = $kd_jenis['kode_jenis'];

$urut = substr($kode_jenis, 6, 3);
$bertambah = (int) $urut + 1;
$bln = date("m");
$thn = date("y");

if (strlen($bertambah) == 1) {
  $format = "JS".$bln.$thn."00".$bertambah;
}else if (strlen($bertambah) == 2) {
  $format = "JS".$bln.$thn."0".$bertambah;
}else {
  $format = "JS".$bln.$thn.$bertambah;
}


 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data jenis</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-lg-6">
            <form method="POST">
              <div class="form-group">

                  <div class="form-group">
                <label>Kode jenis</label>
                <input class="form-control" name="kode_jenis" value="<?php echo $format; ?>" required="" readonly>
              </div>
                <label>Nama jenis</label>
                <input class="form-control" name="nama_jenis" required="">
              </div>


                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../datajenis.php" class="btn btn-info">Kembali</a>
                    </div>
            </form>
            </div></div>
        </div>

 <?php 


 if(isset($_POST['simpan'])){

$kode_jenis = $_POST['kode_jenis'];
$nama_jenis= $_POST['nama_jenis']; 





$tambah = mysqli_query($koneksi, "INSERT INTO tbl_jenis(kode_jenis,nama_jenis) VALUES('$kode_jenis','$nama_jenis')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../datajenis.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../datajenis.php';
    </script> 

    ";
   }
 }


 
include '../templait/footer.php';
  ?>

  