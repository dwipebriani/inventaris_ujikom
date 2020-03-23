 <?php   
                      $masaaktif= "$data[tanggal_kembali]";
                      $sekarang = date("d-m-Y");
                      $masaberlaku = strtotime($masaaktif)-strtotime($sekarang);
                      $sisahari = $masaberlaku/(24*60*60);
                      $tanggal = $data['tanggal_kembali'];
                      $day= date('D',strtotime($tanggal));
                      $daylist= array('Sun'=>'minggu','Mon'=>'senin','Tue'=>'selasa','Wed'=>'rabu','Thu'=>'kamis','Fri'=>'jumat','Sat'=>'sabtu');
                      $tanggal = date('d-m-Y');
                      $hari = $daylist[$day];
                      if ($hari=='sabtu' || $hari=='minggu') {
                       $denda =0*$sisahari;
                      }else{
                        $denda = 1000*$sisahari;
                      }
                      echo $denda;

                      ?>  


                      <!-- yang lihat dari contoh google -->
                        <?php   
                        $date1 ="02-02-2020";
                        $date2 = "02-03-2020";

                        $pecahTgl = explode("_", $date1);
                         $tgl1 = $pecahTgl1&#91;0&#93;;
                          $bln1 = $pecahTgl1&#91;1&#93;;
                           $thn1 = $pecahTgl1&#91;2&#93;;


                           $i = 0;
                           $sum = 0;
                            do {
                              $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1 +$i, $thn1));

                              if(date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0)
                              {
                                $sum++;
                                echo $tanggal."<br>";
                              }
                              $i++;
                            }
                            while ($tanggal != $date2);
                            echo "$sum";
                            ?>









                            validasi username
                            <?php
include "config.php"; //ini untuk masuk ke database
$cekdulu= "select * from table_anda where username='$_POST[un]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysql_query($cekdulu);
if (mysql_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Username Sudah Digunakan');history.go(-1) </script>";
}
else { //proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
 
}
?>





//PERINTAH MENGECEK AGAR TIDAK TERDAPAT USER YANG SAMA
$cek_user=mysql_num_rows(mysql_query("SELECT * FROM user WHERE userid='$_POST[userid]'"));
if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("User Sudah Ada Yang Menggunakan");
              window.location="index.php?hal=register";
              </script>';
              exit();
}