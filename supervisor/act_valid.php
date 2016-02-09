<?php
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "../include/fungsi2.php"; //memanggil file fungsi.php

//variabel _POST
$id     = isset($_POST['id']) ? addslashes($_POST['id']) : "";
$no     = isset($_POST['no']) ? addslashes($_POST['no']) : "";
$kode     = isset($_POST['kode']) ? addslashes($_POST['kode']) : "";

$no_extracom     = isset($_POST['no_extracom']) ? addslashes($_POST['no_extracom']) : "";
$header     = isset($_POST['header']) ? addslashes($_POST['header']) : "";
$nourut     = isset($_POST['no_urut']) ? addslashes($_POST['no_urut']) : "";
$nama 			 = isset($_POST['nama']) ? addslashes($_POST['nama']) : "";
$merk    		 = isset($_POST['merk']) ? addslashes($_POST['merk']) : "";
$jumlah  		 = isset($_POST['jumlah']) ? addslashes($_POST['jumlah']) : "";
$satuan	   		 = isset($_POST['satuan']) ? addslashes($_POST['satuan']) : "";
$keadaan  		 = isset($_POST['keadaan']) ? addslashes($_POST['keadaan']) : "";
$lokasi	  		 = isset($_POST['lokasi']) ? addslashes($_POST['lokasi']) : "";
$supplier 		 = isset($_POST['supplier']) ? addslashes($_POST['supplier']) : "";
$harga  		 = isset($_POST['harga']) ? addslashes($_POST['harga']) : "";

$validasi		 = "Sudah";

if ($no_extracom == "") {
	echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=barang'>";
} else {
	$query = mysql_query("UPDATE detail_barang SET id='$id', kode_akhir='$no', kode='$kode',  no_extracom='$no_extracom', header='$header', namabrg='$nama', merk='$merk', jumlah='$jumlah', satuan='$satuan', keadaan='$keadaan', lokasi='$lokasi', supplier='$supplier', harga='$harga', validasi='$validasi' WHERE no_extracom='$no_extracom'", $konek);

	if ($query) {
		echo "<script>alert('Data berhasil divalidasi @ $hari_ini.Terima Kasih')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=lihat_vali'>";
	} else {
		Echo "Data anda gagal diupdate. Ulangi sekali lagi".mysql_error();
		echo "<meta http-equiv='refresh' content='0; url=?page=edit_barang&no_extracom=$no_extracom'>";
	}
}
?>
