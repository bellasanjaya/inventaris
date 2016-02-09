<?php
include "../include/koneksi_db.php";
$user = $_SESSION['user'];

$no_extracom = isset($_GET['no_extracom']) ? $_GET['no_extracom'] : "";

if ($no_extracom == "") {
	echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
	echo "<meta http-equiv='refresh' content='0; url=lihat_barang.php'>";
} else {
	$query		= mysql_query("SELECT * FROM detail_barang WHERE no_extracom='$no_extracom'", $konek);
	$hasil		= mysql_fetch_array($query);
	$no_extracom = $hasil['no_extracom'];
	$nama =$hasil['namabrg']; 
?>

<form method="post" action="?page=act_rusak">
<table width=100% border=1 class="table-data">
<input type="hidden" name="id" value="<?php echo $no_extracom  ?>">
<tr><td class="head-data" colspan="2">Barang Rusak : <?php echo $nama  ?></td></tr>
<!--Bagian Input-->

<!--Untuk sementara no_extacomnya diinput dahulu..-->
<tr><td class="pinggir-data">ID</td>
<td class="pinggir-data"><input type="text" name="id" size="25" value="<?php echo $hasil['id']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">NO</td>
<td class="pinggir-data"><input type="text" name="no" size="25" value="<?php echo $hasil['kode_akhir']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">KODE</td>
<td class="pinggir-data"><input type="text" name="kode" size="25" value="<?php echo $hasil['kode']; ?>" readonly></td></tr>


<!--Untuk sementara no_extacomnya diinput dahulu..-->
<tr><td class="pinggir-data">No.Extracomptable</td>
<td class="pinggir-data"><input type="text" name="no_extracom" size="25" value="<?php echo $hasil['no_extracom']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">Header</td>
<td class="pinggir-data"><input type="text" name="header" size="25" value="<?php echo $hasil['header']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">No Urut</td>
<td class="pinggir-data"><input type="text" name="no_urut" size="25" value="<?php echo $hasil['no_urut']; ?>" readonly></td></tr>


<!--Input Nama_Barang-->
<tr><td class="pinggir-data">Nama Barang</td>
<td class="pinggir-data"><input type="text" name="nama" size="25" value="<?php echo $hasil['namabrg']; ?>" readonly></td></tr>

<!--Input Merk_Barang-->
<tr><td class="pinggir-data">Merk Barang</td>
<td class="pinggir-data"><input type="text" name="merk" size="25" value="<?php echo $hasil['merk']; ?>" readonly></td></tr>

<!--Input Jumlah_Barang-->
<tr><td class="pinggir-data">Jumlah Barang</td>
<td class="pinggir-data"><input type="text" name="jumlah" size="15" value="<?php echo $hasil['jumlah']; ?>" readonly></td></tr>

<!--Input Satuan_Barang-->
<tr><td class="pinggir-data">Satuan Barang</td>
<td class="pinggir-data"><input type="text" name="satuan" size="25" value="<?php echo $hasil['satuan']; ?>" readonly></td></tr>


<!--Input Keadaan_Barang-->
<tr><td class="pinggir-data">Keadaan</td>
<td class="pinggir-data"><input type="text" name="keadaan" size="15" value="<?php echo $hasil['keadaan']; ?>" readonly></td></tr>

<!--Input Lokasi_Barang-->
<tr><td class="pinggir-data">Lokasi</td>
<td class="pinggir-data"><input type="text" name="lokasi" size="15" value="<?php echo $hasil['lokasi']; ?>" readonly></td></tr>

<!--Input Supplier_Barang-->
<tr><td class="pinggir-data">Supplier</td>
<td class="pinggir-data"><input type="text" name="supplier" size="35" value="<?php echo $hasil['supplier']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">Harga</td>
<td class="pinggir-data"><input type="text" name="harga" size="35" value="<?php echo $hasil['harga']; ?>" readonly></td></tr>

<tr><td class="pinggir-data">Validasi</td>
<td class="pinggir-data"><input type="text" name="validasi" size="35" value="<?php echo $hasil['validasi']; ?>" readonly></td></tr>

<tr><td class="head-data" colspan="2" align="center">
<input type="submit" value="Laporkan Barang Rusak">
</td></tr>
</table>
</form>
<?php
}
?>