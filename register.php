
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Registrasi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">

        <form action="" method="post">
         <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Nama" >
              <label for="nama_pegawai">Nama</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" >
              <label for="alamat">Alamat</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="no_tlp" id="no_tlp" class="form-control" placeholder="Telephonr" >
              <label for="no_tlp">No.Tlp</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="username" class="form-control" placeholder="Username" >
              <label for="username">Username</label>
            </div>
          </div>
         <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
              <label for="password">Password</label>
            </div>
          </div>
         <input type="submit" name="register" value="Register" class="btn btn-primary">
       
        <div class="text-center">
          <a class="d-block small mt-3" href="login_pegawai.php">Login Page</a>
        </div>
         </form>

                <?php 
         include 'config.php';
        if(@$_POST['register']){
          $nama_pegawai = @$_POST['nama_pegawai'];
          $alamat = @$_POST['alamat'];
          $no_tlp = @$_POST['no_tlp'];
          $username = @$_POST['username'];
          $password = @$_POST['password'];
          $password_hash = password_hash($password, PASSWORD_DEFAULT);

          if ($nama_pegawai == '' || $alamat == '' || $no_tlp == '' || $username == '' || $password_hash == '') {
            ?> <script type="text/javascript">alert('Inputan tidak boleh ada yang kosong');</script><?php 
          } else {
            $sql_insert = mysqli_query($koneksi,"INSERT INTO tbl_pegawai values('','$nama_pegawai','$username','$password_hash','$alamat','$no_tlp')");
            if($sql_insert) {
              ?> <script type="text/javascript">alert('Pendaftaran Berhasil, silahkan login');window.location.href = 'login_pegawai.php';</script><?php  
            }
          }
          
        }
         ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
