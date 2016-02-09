<?php

include "../include/koneksi_db.php"; //memanggil file koneksi_db.php
include "link2.php";

$user = $_SESSION['user'];
$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$user = $cs['kode'];

$query2=mysql_query("SELECT * FROM detail_barang WHERE keadaan='Baik' AND validasi='Sudah' AND no_extracom LIKE '$user%'");


//UNTUK PENCARIAN DAN SORTING




?>
<html>

<body>
<table id="example1" class="table table-bordered table-striped" >
<thead>
<tr>
<td class="head-data4">ID  </td>
<td class="head-data4">NO  </td>
<td class="head-data4">KODE  </td>
<td class="head-data4">No Extracom  </td>
<td class="head-data4">Header  </td>
<td class="head-data4">No Urut  </td>
<td class="head-data4">Nama Barang  </td>
<td class="head-data4">Merk  </td>
<td class="head-data4">Jumlah  </td>
<td class="head-data4">Satuan  </td>
<td class="head-data4">Keadaan  </td>
<td class="head-data4">Lokasi  </td>
<td class="head-data4">Supplier  </td>
<td class="head-data4">Harga  </td>
<td class="head-data4">Validasi  </td>
<td class="head-data4">Action  </td>
</tr>
</thead>
<tbody>
<?php
while ($hasil=mysql_fetch_array($query2)) {
echo "<tr>
	<td class='td-data'>$hasil[id]</td>
	<td class='td-data'>$hasil[kode_akhir]</td>
	<td class='td-data'>$hasil[kode]</td>
	<td class='td-data'>$hasil[no_extracom]</td>
	<td class='td-data'>$hasil[header]</td>
	<td class='td-data'>$hasil[no_urut]</td>
	<td class='td-data'>$hasil[namabrg]</td>
	<td class='td-data'>$hasil[merk]</td>
	<td class='td-data'>$hasil[jumlah]</td>
	<td class='td-data'>$hasil[satuan]</td>
	<td class='td-data'>$hasil[keadaan]</td>
	<td class='td-data'>$hasil[lokasi]</td>
	<td class='td-data'>$hasil[supplier]</td>  
	<td class='td-data'>$hasil[harga]</td>
	<td class='td-data'>$hasil[validasi]</td>
	<td class='td-data'><a href='?page=lihat_rusak&no_extracom=$hasil[no_extracom]'><img class='img_link' src='../image/edit.png' width='15px' height='15px'></a></td>
	  </tr>";
}
?>
</body>
</table>

      
</body>
</html>