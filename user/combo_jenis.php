<?php
$user = $_SESSION['user'];

$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];
?>

<script language='javascript'>



function showJenis()

{

<?php

include "../include/koneksi_db.php"; //memanggil file koneksi_db.php

// membaca semua barang1

$query = "SELECT * FROM barang1";

$hasil = mysql_query($query);

// membuat if untuk masing-masing pilihan barang1 beserta isi option untuk combobox kedua

while ($data = mysql_fetch_array($hasil))

{

$jenis = $data['id'];

// membuat IF untuk masing-masing barang1

echo "if (document.form1.jenis_brg.value == \"".$jenis."\")";

echo "{";

// membuat option barang 2

$query2 = "SELECT * FROM barang2 WHERE header='$jenis' AND createdby='$userr'";

$hasil2 = mysql_query($query2);

$content = "document.getElementById('brg').innerHTML = \"";

while ($data2 = mysql_fetch_array($hasil2))

{

$content .= "<option value='".$data2['header']."'>".$data2['nama_j']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}
</script>