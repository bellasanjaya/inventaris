<?php


include "../include/koneksi_db.php"; //memanggil file koneksi_db.php


$user = $_SESSION['user'];
$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];
$querytabel = mysql_query("select * from barang2 where createdby='$userr' order by header");
?>
<form>
<table  id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<td class="head-data4">Nama</td>
<td class="head-data4">Kode</td>
</tr>
</thead>
<tbody>
<?php
while ($hasil=mysql_fetch_array($querytabel)) {
$kode = $hasil['header'] . "-" . $hasil['no_urut'];
echo "<tr>
	  <td class='td-data'>$hasil[nama_j]</td>
	  <td class='td-data'>$kode</td>

</tr>";
}
?>
</tbody>
</table>
</form>