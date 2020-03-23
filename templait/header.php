<?php 
include '../config.php';
$profil = mysqli_query($koneksi, "SELECT foto, nama_petugas FROM tbl_petugas WHERE id_petugas");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INVENTARIS</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

<!--   <link rel="stylesheet" type="text/css" href="../js2/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="../js2/sweetalert2.js">
 -->
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

    <a class="navbar-brand mr-1" href="../index2.php"><h4> INVENTARIS</h4></a>

     <ul class="navbar-nav ml-auto ml-md-8">
    <a class="navbar-brand navbar-nav-right" href="../logoutpeminjam.php" onclick="return confirm('Apakah anda yakin ingin logout?');" >
          <i class="fas fa-fw fa-lock"></i>
          <span><?php echo $_SESSION['petugas_username'] ;?></span></a> 
</ul>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav " style="width: 100px;">


        <li class="nav-item active">
       <?php $gambar = mysqli_fetch_assoc($profil) ?>
       <p class="centered mt-2" style="text-align: center;">
          <img width="100" height="100" class="rounded-circle mt-2" src="http://localhost/inventarisdwi/gambar/<?php echo $_SESSION['petugas_foto']; ?>"  >
       </p>
       <h5 class="centered" style="color: white; text-align: center;"><?php echo  $_SESSION['petugas_nama_petugas'];?> </h5>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="../index2.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span>
        </a>
      </li>
       <?php 
    if ($_SESSION['petugas_level'] == 1) {

     ?>
   
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="../dataruang.php">Ruang</a>
          <a class="dropdown-item" href="../datajenis.php">Jenis</a>
          <a class="dropdown-item" href="../datapetugas.php">Petugas</a>
          <a class="dropdown-item" href="../datapegawai.php">Peminjam</a>
           <a class="dropdown-item" href="../datainventaris.php">Inventaris</a>
        </div>
      </li>
    <?php   } ?>

     

          <?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2) { ?>

       <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="..dataproses.php">Proses</a>
          <a class="dropdown-item" href="../datapeminjaman.php">Peminjaman</a>
          <a class="dropdown-item" href="../datakembali.php">Pengembalian</a>
        </div>
      </li>
    <?php   } ?>

 <!--  <?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2 ) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="../denda.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Denda</span>
        </a>
      </li>
    <?php   } ?> -->




    <?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2) { ?>

     <li class="nav-item active">
        <a class="nav-link" href="../pinjam.php">
          <i class="fas fa-fw fa-download"></i>
          <span>Pinjam</span>
        </a>
      </li>
      <?php   } ?>


     <!-- <?php 
    if ($_SESSION['petugas_level'] == 1) {

     ?>
        <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="datalaporaninventaris.php">Inventaris</a>
          <a class="dropdown-item" href="datalaporanpeminjaman.php">Peminjaman</a>
        </div>
      </li>
    <?php   } ?> -->
       
        <!--  <li class="nav-item active">
        <a class="nav-link" href="../logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');" >
          <i class="fas fa-fw fa-lock"></i>
          <span>Sign-Out</span></a>
      </li> -->

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

     