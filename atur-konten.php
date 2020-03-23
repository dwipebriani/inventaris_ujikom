

<?php
if ($_GET['menu'] == 'home') {
  include('index.php');
}
elseif ($_GET['menu'] == 'keluar') {
  session_destroy();
  header('Location: index.php');
}
elseif ($_GET['menu'] == 'jenis-barang') {
  include('konten/datajenis.php');
}

 ?>