<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>peminjamanInventaris</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <audio src="../gambar/opening.mp3" autoplay="autoplay" hidden="hidden"></audio>
  

  <nav class="navbar navbar-expand navbar-dark bg-success static-top">

    <a class="navbar-brand mr-1" href="#"><h4>PEMINJAMAN INVENTARIS</h4></a>
    <ul class="navbar-nav ml-auto ml-md-8">
    <a class="navbar-brand navbar-nav-right" href="../logoutpeminjam.php" onclick="return confirm('Apakah anda yakin ingin logout?');" >
          <i class="fas fa-fw fa-lock"></i>
          <span><?php echo $_SESSION['pegawai_nama_pegawai'] ;?></span></a> 
</ul>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

  </nav>

  <div id="wrapper">



    <!-- Sidebar -->
   <!--  <ul class="sidebar navbar-nav " style="width: 100px;">



   

         <li class="nav-item active">
        <a class="nav-link" href="../logoutpeminjam.php" onclick="return confirm('Apakah anda yakin ingin logout?');" >
          <i class="fas fa-fw fa-lock"></i>
          <span>Sign-Out</span></a>
      </li> -->



   <!--  </ul> -->

    <div id="content-wrapper">

      <div class="container-fluid">