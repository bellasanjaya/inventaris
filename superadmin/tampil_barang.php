<?php


include "../include/koneksi_db.php"; //memanggil file koneksi_db.php

include "link3.php"; 

?>

<form action="?page=data" method="post">

<table width=100% border=1 class="table-data">
<tr><td class="head-data" colspan="5">Tampilkan Barang</td></tr>

<!--Bagian Input-->


<tr><td class="pinggir-data">Pilih User</td>
<td class="pinggir-data">
<select name="usernya">
<option selected="" value="0">-- USER --</option>
<?php

include "../include/koneksi_db.php";
$query = "SELECT * FROM admin where hak_akses='3'";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result)) {
echo "<option value=$rows[kode]> $rows[kode]</option>";
}
?>

</select>
</td></tr>




<tr><td class="pinggir-data">Validasi</td>
<td class="pinggir-data">
<select name="validasi">
				<option value="Sudah">Sudah</option>
				<option value="Belum">Belum</option>
</select>
</td></tr>




<tr><td colspan="2" align="center" class="head-data">
<input type="submit" value="Input">
</td></tr>
</table>

</form>