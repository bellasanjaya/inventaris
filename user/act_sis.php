<?php
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "../include/fungsi2.php"; //memanggil file fungsi.php

$tahun	= date('Y');
$user1 = $user;

$cariuser = mysql_query("select * from admin where username='$user1'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];



$a = mysql_query("select * from barang2" , $konek); 
$b = mysql_fetch_array($a);

$c = $b['header'];
$d = $b['no_urut'];
$e = $userr;

$no = $e ."-". $c . "-". $d . "-" . $tahun;

$kd3 = mysql_query("select no_extracom from detail_barang where no_extracom LIKE '$no%' ", $konek);
$kd2 = mysql_num_rows($kd3);
$kd = $kd2 + 1;

$no_extracom = $e . "-" . $c . "-" . $d . "-" . $tahun . "-" . $kd;

$kodeuser = $userr;
$id = "";



$header	 = isset($_POST['nama_brg']) ? addslashes($_POST['nama_brg']) : "";
$f = mysql_query("select * from barang2 where header ='$header' ");
$g = mysql_fetch_array($f);
$nama = $g['nama_j'];
$urut = $g['no_urut'];


$merk    		 = isset($_POST['merk']) ? addslashes($_POST['merk']) : "";
$jumlah  		 = isset($_POST['jumlah']) ? addslashes($_POST['jumlah']) : "";
$satuan	   		 = isset($_POST['satuan']) ? addslashes($_POST['satuan']) : "";
$keadaan  		 = isset($_POST['keadaan']) ? addslashes($_POST['keadaan']) : "";
$lokasi	  		 = isset($_POST['lokasi']) ? addslashes($_POST['lokasi']) : "";
$supplier 		 = isset($_POST['supplier']) ? addslashes($_POST['supplier']) : "";
$harga		 	= isset($_POST['harga']) ? addslashes($_POST['harga']) : "";

$tglnya		 	= isset($_POST['ininya']) ? addslashes($_POST['ininya']) : "";





$validasi = "Belum";
$tgl       		= $hari_ini;

if ($no_extracom==""||$nama==""||$merk==""||$jumlah==""||$satuan==""||$keadaan==""||$lokasi==""||$supplier==""||$harga=="") {
	echo "<script>alert('Pengisian form belum benar. Ulangi lagi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=input_barang'>";
} else {
	$cek=mysql_query("SELECT * FROM detail_barang WHERE no_extracom='$no_extracom'", $konek);
	$hasil_cek=mysql_num_rows($cek);

	if ($hasil_cek>0) {
		echo "<script>alert('Data barang dengan nama $no_extracom pernah direkam !')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=input_barang&nama=$nama'>";
	} else {
		$query = mysql_query("INSERT INTO detail_barang VALUES ('$id', '$kd', '$kodeuser', '$no_extracom', '$header', '$urut', '$nama', '$merk', '$jumlah', '$satuan', '$keadaan', '$lokasi', '$supplier', '$harga', '$validasi', '$tglnya')");

		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan @ $hari_ini. Terima Kasih')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=barang'>";
		} else {
			echo "<script>alert('Data anda gagal dimasukkan karena. Ulangi sekali lagi')</script>";
			echo mysql_error();
			//echo "<meta http-equiv='refresh' content='0; url=?page=input_barang'>";
		}
	}
}
?>
