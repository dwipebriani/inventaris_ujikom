<?php
ob_start();
session_start();
if(isset($_SESSION['pegawai_username'])) header("location:index3.php");
include "config.php";   


// proses login
if (isset($_POST['kirim'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE username = '$username' AND password = '$password'");
  if(mysqli_num_rows($sql)>0) {
    $row_akun = mysqli_fetch_array($sql);

    $_SESSION['pegawai_id'] = $row_akun['id_pegawai'];
    $_SESSION['pegawai_username'] = $row_akun['username'];
    $_SESSION['pegawai_nama_pegawai'] = $row_akun['nama_pegawai'];
  
    header("location:index3.php");
  } else {
    header("location: login_pegawai.php?login-gagal");
  }
 
}

 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title >Login_Peminjam</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>

<body><br><br><br><br><br>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center><b><h4>LOGIN PEMINJAM</h4></b></center> </div>
      <div class="card-body">

        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputUsername">Username</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>

          <?php   
if (isset($_GET['login-gagal'])) { ?>
  <div> 
      <p>Maaaf, Username / Password yang anda masukan salah</p>
  </div>

  <?php } ?>
 

          
         
          <input type="submit" name="kirim" class="btn btn-primary btn-block" value="Login">

        </form>

        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          
        </div>
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

<?php   

mysqli_close($koneksi);
ob_end_flush();
 ?>
