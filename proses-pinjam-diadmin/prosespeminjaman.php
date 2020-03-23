<?php 
session_start();
include '../templait/header.php';
include "../config.php";
$pinjam = date("y-m-d");
$hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
$kembali =date("y-m-d", $hari);

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script>alert('Barang yang dipilih tidak ada, silahkan memilih dulu');</script>";
  echo "<script>location='../pinjam.php';</script>"; 
}

 ?>

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            <b><h4>Form Peminjaman Barang</h4></b></div>
        </div>
        <div class="card-body">
        	<div class="table-responsive">
        		<div class="col-xs-12 col-md-6">
        		<form  method="POST">
                <div class="row">
              
           <?php foreach ($_SESSION["keranjang"] as $kode_produk => $kode):

            $query =mysqli_query($koneksi, "SELECT * FROM tbl_inventaris 
                INNER JOIN tbl_jenis ON tbl_inventaris.kode_jenis=tbl_jenis.kode_jenis
                   INNER JOIN tbl_ruang ON tbl_inventaris.kode_ruang=tbl_ruang.kode_ruang
                 INNER JOIN tbl_petugas ON tbl_inventaris.id_petugas=tbl_petugas.id_petugas where tbl_inventaris.kode = '$kode_produk'");
$data = mysqli_fetch_assoc($query);
?>

<div class="col-xs-12 col-md-6">

               <div class="form-group">
                <label>Barang</label>
               <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly>
                  <label>Ruang</label>
               <input class="form-control" name="nama" value="<?php echo $data['nama_ruang']; ?>" readonly>
              </div>
              <div class="form-group">
                <input class="form-control" type="hidden" name="jumlah_baik[]" value="<?php echo $data['jumlah_baik'] ;?>" >
              </div>
                <div class="form-group">
               
                <input class="form-control" name="jumlah_pinjam[]" required="" placeholder="Masukan Jumlah Pinjam" type="number">
              </div>
        			<div class="form-group">
                        <input class="form-control" type="hidden" name="tanggal_kembali[]"  value=" <?php echo $kembali ?> "
                         required="">
                    </div>
        			<div class="form-group">
        				<input class="form-control" name="status_peminjaman[]" value="proses" required="">
        			</div>

                <div class="form-group form-label-group">
                           <select class="form-control" name="kode_ruang">
                               <option value="Pilih Ruang" disabled="" selected="">-- Pilih Peminjam--
                               </option>
                               <?php    
                               include "../config.php";
                               $pinjamkan=mysqli_query($koneksi,"SELECT * FROM tbl_pegawai order by id_peminjaman desc limit 1");
                        while($dataa=mysqli_fetch_assoc($pinjamkan)) {?>
                            <option value="<?php echo $dataa['id_pegawai']; ?>"><?php echo $dataa['nama_pegawai']; ?></option>
                            <?php 
                                }
                             ?>
                                ?>
                           </select> 
                        </div>
               <td> 
                
                <a href="hapuskeranjang.php?kode=<?php echo $kode_produk ?>" class="btn btn-danger btn btn-trash">Hapus</a></td><br>
              </div>

            <?php  endforeach ?> 
          </div>
            <br>  
            <div class=""> <a href="../index3.php" class="btn btn-success">Lanjutkan Pinjam</a>

            <input type="submit" name="simpan" value="Pinjam" class="btn btn-primary" alt="">
            </div>
                  
        		</form>
        		</div></div>
        </div>
        
 <?php 
if(isset($_POST['simpan'])){
$jumlah_pinjam= $_POST['jumlah_pinjam'];
// $kode_produk= $_POST['kode_produk'];
$jumlah_pinjam= $_POST['jumlah_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status_peminjaman= $_POST['status_peminjaman'];
$id_pegawai= $_POST['id_pegawai'];
?>

<?php 
$i=0;
foreach ($_SESSION["keranjang"] as $kode_produk => $kode): 
$tambah = mysqli_query($koneksi, "INSERT INTO tbl_peminjaman(kode,jumlah_pinjam,tanggal_pinjam,tanggal_kembali,status_peminjaman,id_pegawai) VALUES('$kode_produk','$jumlah_pinjam[$i]',now(),'$tanggal_kembali[$i]','$status_peminjaman[$i]','$id_pegawai[$i]')");
$i++;
?>
            <?php  endforeach ?> 
<?php 
 // cek apakah data berhasil ditambahkan atau tidak
  if($tambah) {
   echo "
    <script>
      alert('Anda Berhasil Meminjam');
      window.location.href = '../datapeminjaman.php';
    </script>
    ";
   } else {
     echo "
    <script>
      alert('Anda Gagal Meminjam !');
      window.location.href = 'tambahpeminjaman.php';
    </script> 

    ";
   }
 }

 include "../templait/footer.php";

?>



  