<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "combo_jenis.php";
include "../include/fungsi2.php"; //memanggil file fungsi.php
?>
<head>
<title>.:: Inventory Application ::.</title>
</head>

<form name="form1"  action="?page=act_sis" method="post">
<table width=100% border=1 class="table-data">
<tr><td class="head-data" colspan="2">Tambah Barang <?php echo $user ?></td></tr>

<!--Bagian Input-->

<!--Untuk sementara no_extacomnya diinput dahulu..-->

<tr><td class="pinggir-data">Jenis Barang</td>
<td class="pinggir-data">
<select name="jenis_brg" onchange='showJenis()'>
<option selected="" value="0">-- Pilih Kategori --</option>
<?php

$user = $_SESSION['user'];

$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];

include "../include/koneksi_db.php";
$query = "SELECT * FROM barang1";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result)) {
echo "<option value=$rows[id]> $rows[nama]</option>";
}
?>

</select>
</td></tr>


<tr><td class="pinggir-data">Nama Barang</td>
<td class="pinggir-data">
<select name="nama_brg" id="brg">
<option selected="" value="0">-- Pilih Kategori --</option>

</select>
</td></tr>

<!--Input Merk_Barang-->
<tr><td class="pinggir-data">Merk Barang</td>
<td class="pinggir-data"><input type="text" name="merk" size="25"></td></tr>

<!--Input Jumlah_Barang-->
<tr><td class="pinggir-data">Jumlah Barang</td>
<td class="pinggir-data"><input type="text" name="jumlah" size="15"></td></tr>

<!--Input Satuan_Barang-->
<tr><td class="pinggir-data">Satuan Barang</td>
<td class="pinggir-data">
<select name="satuan">
				<option value="">Pilih Satu</option>
				<option value="satuan">Satuan</option>
				<option value="set">Set</option>
				<option value="buah">Buah</option>
</select>
</td></tr>



<!--Input Keadaan_Barang-->
<tr><td class="pinggir-data">Keadaan Barang</td>
<td class="pinggir-data">
<select name="keadaan">
				<option value="Baik">Baik</option>
				<option value="Rusak">Rusak</option>
</select>
</td></tr>

<!--Input Lokasi_Barang-->
<tr><td class="pinggir-data">Lokasi</td>
<td class="pinggir-data"><input type="text" name="lokasi" size="15"></td></tr>

<!--Input Supplier_Barang-->
<tr><td class="pinggir-data">Supplier</td>
<td class="pinggir-data"><input type="text" name="supplier" size="35"></td></tr>

<!--Input Harga_Barang-->
<tr><td class="pinggir-data">Harga</td>
<td class="pinggir-data"><input type="text" name="harga" size="35"></td></tr>


<input type="hidden"  name="ininya" value="<?php echo $ini;  ?>" readonly>



<tr><td colspan="2" align="center" class="head-data">
<input type="submit" value="Input">
</td></tr>
</table>
</form>
