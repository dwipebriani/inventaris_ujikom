<?php 
session_start();
include '../templait/header.php';
include "../config.php";

$nomer = mysqli_query($koneksi, "SELECT kode FROM tbl_inventaris ORDER BY kode DESC");
$kd_barang = mysqli_fetch_array($nomer);
$kode = $kd_barang['kode'];

$urut = substr($kode, 6, 3);
$bertambah = (int) $urut + 1;
$bln = date("m");
$thn = date("y");

if (strlen($bertambah) == 1) {
  $format = "DP".$bln.$thn."00".$bertambah;
}else if (strlen($bertambah) == 2) {
  $format = "DP".$bln.$thn."0".$bertambah;
}else {
  $format = "DP".$bln.$thn.$bertambah;
}

 ?> 

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data Inventaris</div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<div class="col-lg-6">
        		<form method="POST">

                <div class="form-group">
                <label>Kode</label>
                <input class="form-control" name="kode" value="<?php echo $format; ?>" readonly>
              </div>
        			<div class="form-group">
        				<label>Nama</label>
        				<input class="form-control" name="nama" required="">
        			</div>
              <div class="form-group">
                <label>Harga satuan</label>
                <input class="form-control" name="harga" required="">
              </div>
        			<div class="form-group">
        				<label>Jumlah Baik</label>
        				<input class="form-control" name="jumlah_baik" required="">
        			</div>
        			<div class="form-group">
        				<label>Jumlah Rusak</label>
        				<input class="form-control" name="jumlah_rusak" type="number" required="">
        			</div>

                         <div class="form-group form-label-group">
                           <select class="form-control" name="kode_jenis">
                               <option value="Pilih Jenis" disabled="" selected="">--Pilih Jenis--
                               </option>
                               <?php    
                               include "../config.php";
                               $jenis=mysqli_query($koneksi,"select * from tbl_jenis");
                        while($data=mysqli_fetch_assoc($jenis)) {?>
                            <option value="<?php echo $data['kode_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>


                      <div class="form-group form-label-group">
                           <select class="form-control" name="kode_ruang">
                               <option value="Pilih Ruang" disabled="" selected="">--Pilih Ruang--
                               </option>
                               <?php    
                               include "../config.php";
                               $ruang=mysqli_query($koneksi,"select * from tbl_ruang");
                        while($data=mysqli_fetch_assoc($ruang)) {?>
                            <option value="<?php echo $data['kode_ruang']; ?>"><?php echo $data['nama_ruang']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="keterangan" required="">
                    </div>

                          <div class="form-group">
                        
                        <input class="form-control" type="hidden" name="id_petugas" value="<?=$_SESSION['petugas_id'] ?>" required="">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../datainventaris.php" class="btn btn-info">Kembali</a>
                    </div>
        		</form>
        		</div></div>
        </div>

 <?php 

 if(isset($_POST['simpan'])){

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah_baik = $_POST['jumlah_baik'];
$jumlah_rusak = $_POST['jumlah_rusak'];
$keterangan = $_POST['keterangan'];
$kode_jenis= $_POST['kode_jenis'];
$kode_ruang = $_POST['kode_ruang'];
$id_petugas = $_POST['id_petugas'];


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_inventaris(kode,nama,harga,jumlah_baik,jumlah_rusak,keterangan,kode_jenis,tanggal_register,kode_ruang,id_petugas) VALUES('$kode','$nama','$harga','$jumlah_baik','$jumlah_rusak','$keterangan','$kode_jenis',now(),'$kode_ruang','$id_petugas')");


 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../datainventaris.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../datainventaris.php';
    </script> 

    ";
   }
 }



include '../templait/footer.php';
  ?>

  