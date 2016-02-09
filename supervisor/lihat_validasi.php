<?php

include "../supervisor/link.php";
include "../include/koneksi_db.php"; //memanggil file koneksi_db.php

$user = $_SESSION['user'];

$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];

$query2=mysql_query("SELECT * FROM detail_barang WHERE validasi='Sudah' AND no_extracom LIKE '$userr%'");

?>
<table class="table-data" border=1 width=100% border=0 >
<tr>
<td class="head-data4">ID</td>
<td class="head-data4">NO</td>
<td class="head-data4">KODE</td>
<td class="head-data4">No Extracom</td>
<td class="head-data4">Header</td>
<td class="head-data4">No Urut</td>
<td class="head-data4">Nama Barang</td>
<td class="head-data4">Merk</td>
<td class="head-data4">Jumlah</td>
<td class="head-data4">Satuan</td>
<td class="head-data4">Keadaan</td>
<td class="head-data4">Lokasi</td>
<td class="head-data4">Supplier</td>
<td class="head-data4">Harga</td>
<td class="head-data4">Validasi</td>

</tr>

<?php
while ($hasil=mysql_fetch_array($query2)) { ?>

<tr>
	<td class='td-data'><?php echo $hasil['id'] ?></td>
	<td class='td-data'><?php echo $hasil['kode_akhir']?></td>
	<td class='td-data'><?php echo $hasil['kode'] ?></td>
	<td class='td-data'><?php echo $hasil['no_extracom'] ?></td>
	<td class='td-data'><?php echo $hasil['header'] ?></td>
	<td class='td-data'><?php echo $hasil['no_urut'] ?></td>
	<td class='td-data'><?php echo $hasil['namabrg'] ?></td>
	<td class='td-data'><?php echo $hasil['merk'] ?></td>
	<td class='td-data'><?php echo $hasil['jumlah'] ?></td>
	<td class='td-data'><?php echo $hasil['satuan'] ?></td>
	<td class='td-data'><?php echo $hasil['keadaan'] ?></td>
	<td class='td-data'><?php echo $hasil['lokasi'] ?></td>
	<td class='td-data'><?php echo $hasil['supplier'] ?></td>  
	<td class='td-data'>Rp.<?php echo number_format($hasil['harga'],2,",",".");?></td>
	<td class='td-data'><?php echo $hasil['validasi'] ?></td>
</tr>
<?php } ;
?>

</table>