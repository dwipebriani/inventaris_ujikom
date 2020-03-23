<?php 
ob_start();
session_start();
if(!isset($_SESSION['petugas_id'])) header("location:login.php");
include "config.php";
include "templaitdata/header.php";

 ?>
 
            <br>  
          
            <div class="text-center " >
              <h2 style="color: purple";><b>HALAMAN PETUGAS INVENTARIS</b></h2>
              <img src="gambar/5.png">
            </div>
            <?php 

             ?>

      <?php 
      mysqli_close($koneksi);
      ob_end_flush();
      include 'templaitdata/footer.php';

       ?>


     