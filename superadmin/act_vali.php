<?php
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "../include/fungsi2.php"; //memanggil file fungsi.php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//variabel _POST

$nama1 			 = isset($_POST['nama_b']) ? addslashes($_POST['nama_b']) : "";

$ceknama = mysql_query("select * from barang1 where nama='$nama1'");
$cek = mysql_fetch_array($ceknama);
$name = $cek['nama'];


//satu
$inisial = substr($nama1,0,1);
$inisial2 = strtoupper($inisial);
$nourut= mysql_query("SELECT no_urut FROM barang1 WHERE inisial='$inisial2' " );
$no = mysql_num_rows($nourut);
$noo = $no + 1;
$id= $inisial2 . $noo;






if ($nama1=="") {
	echo "<script>alert('Pengisian form belum benar. Ulangi lagi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=supervisor'>";
} 

else if ($nama1==$name) {



			echo "<script>alert('Data anda sudah ada di database. Ulangi sekali lagi')</script>";
			echo mysql_error();
			echo "<meta http-equiv='refresh' content='0; url=?page=superadmin'>";

	
	}



//kondisi dua. jiika belum ada.
else {

		//dua
		$query = mysql_query("INSERT INTO barang1 VALUES ('$id', '$noo', '$inisial2', '$nama1')");
		
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan @ $hari_ini. Terima Kasih')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=superadmin'>";
		} else {
			echo "<script>alert('Data anda gagal dimasukkan karena. Ulangi sekali lagi')</script>";
			echo mysql_error();
			//echo "<meta http-equiv='refresh' content='0; url=?page=supervisor'>";
		}
	}

	
?>



