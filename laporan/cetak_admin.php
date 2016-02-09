<?php


include "../include/koneksi_db.php"; //memanggil file koneksi_db.php


$querytabel = mysql_query("select * from barang2 order by header");
$user = $_SESSION['user'];
?>

<form action="?page=cetakpdf" method="post">




<table width=100% border=1 class="table-data">
<tr><td class="head-data" colspan="5">Cetak Laporan</td></tr>

<!--Bagian Input-->

<!--Input Nama_Barang-->
<tr><td style="font-weight: bold;" class="pinggir-data">Tahun</td>
<td class="pinggir-data">
<input id=tahunn  name="tahunn" size="20" readonly>

</td></tr>

<tr><td style="font-weight: bold;" class="pinggir-data">Validasi</td>
<td class="pinggir-data"> <select name="validasi">
				<option value="">Pilih Validasi</option>
				<option value="Sudah">Sudah</option>
				<option value="Belum">Belum</option>
</select>


</td></tr>


<input type="hidden"  name="usernya" value="<?php echo $user;  ?>" readonly>
<tr><td colspan="2" align="center" class="head-data">
<input type="submit" value="Cetak">
</td></tr>
</table>

</form>