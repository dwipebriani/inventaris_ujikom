<?php 
session_start();
include '../templait/header.php';
include "../config.php";

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Tambah Data Peminjam</div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<div class="col-lg-6">
        		<form  method="POST">
        			<div class="form-group">
        				<label>Nama Pegawai</label>
        				<input class="form-control" name="nama_pegawai" required="">
        			</div>
        			<div class="form-group">
        				<label>Alamat</label>
        				<input class="form-control" name="alamat" required="">
        			</div>
        			<div class="form-group">
        				<label>No Telepon</label>
        				<input class="form-control" name="no_tlp" required="">
        			</div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" required="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" alt="">
                        <a href="../datapeminjam.php" class="btn btn-info">Kembali</a>
                    </div>
        		</form>
        		</div></div>
        </div>

 <?php 
if(isset($_POST['simpan'])){
 $nama_pegawai= $_POST['nama_pegawai'];
$alamat = $_POST['alamat'];
$no_tlp= $_POST['no_tlp'];
$username= $_POST['username'];
$password= md5($_POST['password']);


$tambah = mysqli_query($koneksi, "INSERT INTO tbl_pegawai(nama_pegawai,alamat,no_tlp,username,password) VALUES('$nama_pegawai','$alamat','$no_tlp','$username','$password')");





 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      window.location.href = '../datapegawai.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('data gagal ditambahkan!');
      window.location.href = '../datapegawai.php';
    </script> 

    ";
   }
 }


 include "../templait/footer.php";

?>


  