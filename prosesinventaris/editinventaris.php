<?php 
session_start();
include '../config.php';
include '../templait/header.php';


$kode = @$_GET['kode'];
$query =mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
                INNER JOIN tbl_jenis ON tbl_inventaris.kode_jenis=tbl_jenis.kode_jenis
                   INNER JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
                 INNER JOIN tbl_petugas ON tbl_inventaris.id_petugas=tbl_petugas.id_petugas where tbl_inventaris.kode = '$kode'");
$data = mysqli_fetch_assoc($query);
 ?>

         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Ubah Data Inventaris</div>
           </div>

        <div class="card-body">
        	<div class="table-responsive">
        		<div class="col-lg-6">
        		<form method="POST">

        			<div class="form-group">
        				<label>Barang</label>
        	     <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
        			</div>
              <div class="form-group">
                <label>Harga Per Barang</label>
               <input class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
              </div>

        			<div class="form-group">
        				<label>Jumlah Baik</label>
        				<input class="form-control" name="jumlah_baik" value="<?php echo $data['jumlah_baik'] ;?>">
        			</div>
                <div class="form-group">
                <label>Jumlah Rusak</label>
                <input class="form-control" name="jumlah_rusak" value="<?php echo $data['jumlah_rusak'] ;?>">
              </div>

                 <div class="form-group">
                  <label>Keterangan</label>
                   <input class="form-control" name="keterangan" value="<?php echo $data['keterangan']; ?>">
                    </div>

                     <div class="form-group form-label-group">
                    <select class="form-control" name="kode_jenis">
                        <option value="<?php echo $data['kode_jenis']; ?>" selected=""><?php echo $data['nama_jenis']; ?></option>
                        <?php
                        $jenis=mysqli_query($koneksi,"select * from tbl_jenis");
                        while($data1=mysqli_fetch_assoc($jenis)) {?>
                            <option value="<?php echo $data1['kode_jenis']; ?>"><?php echo $data1['nama_jenis']; ?></option>
                            <?php 
                                }
                             ?>
                    </select></div>
                    
                      <div class="form-group form-label-group">
                    <select class="form-control" name="kode_ruang">
                        <option value="<?php echo $data['kode_ruang']; ?>" selected=""><?php echo $data['nama_ruang']; ?></option>
                        <?php
                        $ruang=mysqli_query($koneksi,"select * from tbl_ruang");
                        while($data2=mysqli_fetch_assoc($ruang)) {?>
                            <option value="<?php echo $data2['kode_ruang']; ?>"><?php echo $data2['nama_ruang']; ?></option>
                            <?php 
                                }
                             ?>
                    </select>
                  </div>

                <div class="form-group ">
               <label>Tanggal Register</label>
                <input class="form-control" name="tanggal_register" type="date" value="<?php echo $data['tanggal_register']; ?>" readonly>
                    </div>

                      

                  

                    <div class="form-group">
                        <input type="submit" name="edit" value="edit" class="btn btn-primary">
                        <a href="../datainventaris.php" class="btn btn-info">Kembali</a>
                    </div>
        		</form>
        		</div>
                

            </div>
        </div>

<?php 
if (isset($_POST['edit'])) {
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];
$jumlah_baik = $_POST['jumlah_baik'];
$jumlah_rusak = $_POST['jumlah_rusak'];
$kode_jenis= $_POST['kode_jenis'];
$tanggal_register =$_POST['tanggal_register'];
$kode_ruang = $_POST['kode_ruang'];
$kode_inventaris = $_POST['kode_inventaris'];



$ubah = mysqli_query($koneksi, "UPDATE tbl_inventaris set nama = '$nama',harga = '$harga',keterangan='$keterangan',jumlah_baik='$jumlah_baik',jumlah_rusak='$jumlah_rusak',kode_jenis='$kode_jenis',tanggal_register='$tanggal_register',kode_ruang='$kode_ruang' where kode='$kode'");


 // cek apakah data berhasil ditambahkan atau tidak
  if($ubah) {
    echo "
    <script>
      alert('data berhasil diubah!');
      window.location.href = '../datainventaris.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal diubah!');
      window.location.href = '../datainventaris.php';
    </script> ";

    
   }
   }
 






include '../templait/footer.php';
  ?>




            