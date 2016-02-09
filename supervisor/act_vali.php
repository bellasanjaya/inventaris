<?php
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "../include/fungsi2.php"; //memanggil file fungsi.php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$user = $_SESSION['user'];
$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];
//variabel _POST

$nama1 			 = isset($_POST['nama_b']) ? addslashes($_POST['nama_b']) : "";
$nama2 			 = isset($_POST['nama_j']) ? addslashes($_POST['nama_j']) : "";

$ceknama = mysql_query("select * from barang1 where nama='$nama1'");
$cek = mysql_fetch_array($ceknama);
$name = $cek['nama'];
//satu
$inisial = substr($nama2,0,1);
$inisial2 = strtoupper($inisial);
$nourut= mysql_query("SELECT no_urut FROM barang1 WHERE inisial='$inisial2' " );
$no = mysql_num_rows($nourut);
$noo = $no + 1;
$id= $inisial2 . $noo;






if ($nama1=="" && $nama2=="") {
	echo "<script>alert('Pengisian form belum benar. Ulangi lagi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=supervisor'>";
} 


//klondisi satu. nama sudah ada
else if ($nama1==$name) {

$ceksama = mysql_query("select * from barang1 where nama='$nama1'");
$cek2 = mysql_fetch_array($ceksama);
		//dua
		$header = $cek2['id'];
		
		
		
		
		$no2= mysql_query("SELECT no_urut FROM barang2 WHERE header='$header' " );
		$noo2 = mysql_num_rows($no2);
		$nooo = $noo2 + 1;
		
		
		
		$created=$userr;
		$id2 = "";

		$query2 = mysql_query("INSERT INTO barang2 VALUES ('$id2', '$nooo', '$header', '$nama2', '$created')");
		
		if ($query2) {
			echo "<script>alert('Data berhasil ditambahkan @ $hari_ini. Terima Kasih')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=supervisor'>";
		} else {
			echo "<script>alert('Data anda gagal dimasukkan karena. Ulangi sekali lagi')</script>";
			echo mysql_error();
			//echo "<meta http-equiv='refresh' content='0; url=?page=supervisor'>";
		}
	}

?>



