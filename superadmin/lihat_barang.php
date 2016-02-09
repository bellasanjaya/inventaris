<?php


include "../include/koneksi_db.php"; //memanggil file koneksi_db.php

include "link2.php"; 
$user = $_SESSION['user'];
$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];
$querytabel = mysql_query("select * from barang2 where createdby='$userr' order by header");
?>

<form action="?page=tambah_barang" method="post">

<table width=100% border=1 class="table-data">
<tr><td class="head-data" colspan="5">Tambah Barang</td></tr>

<!--Bagian Input-->

<!--Input Nama_Barang-->
<tr><td style="font-weight: bold;" class="pinggir-data">Header</td>
<td class="pinggir-data"><input type="text" name="nama_b" size="50"></td></tr>


<tr><td colspan="2" align="center" class="head-data">
<input type="submit" value="Input">
</td></tr>
</table>

</form>