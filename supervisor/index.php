<?php 
session_start();
include "../include/fungsi2.php";
$user = $_SESSION['user'];
error_reporting(E_ALL ^ (E_NOTICE | E_DEPRECATED));
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
function logout() {
	session_start();
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
}

$utama="<center>
<span class='s'>Selamat Datang di Sistem Management Inventaris. <br>
Untuk menggunakan, silakan memilih menu di samping kiri !
<br>Status Anda login sebagai <b> Supervisor $user </b> Jangan lupa LOG OUT sesudah menggunakan aplikasi ini.</span></center>";
?>

<html>

 
<head>
<title>.:: Inventory Application ::.</title>
   





<link rel="stylesheet" type="text/css" href="../include/style.css" />
   
	
<link rel="stylesheet" href="../include/datepicker/lib/css/default.css" />
  
	   <link rel="stylesheet" href="../laporan/css/bootstrap.min.css">
       <link rel="stylesheet" href="../laporan/css/dataTables.bootstrap.css">
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
</head>

<body>
<table border=0 width="100%" bgcolor="#FFFFF0" cellpadding=2 cellspacing=2 >
<tr>
<td colspan="2"><img src="../image/header.PNG" width="100%" height="180px">
<div style="position: absolute; width: 418px; height: 69px; z-index: 1; left:550px; top:44px" id="layer1">
<p align="center"><font color="#DC143C"><u><b>
<font size="6" face="Bookman Old Style">Inventory Application</font></b></u><br></font>
<b><font size="3" font color="#DC143C">Indonesia Power Unit Jasa Pemeliharaan</font></b></div>
</td>
	</tr>
	<tr>
		<td colspan=2><marquee onmouseover="this.stop();" behavior="alternate" onmouseout="this.start();">Halaman Supervisor</marquee>
		</td>
	</tr>
	<tr>
	<td width="20%" valign="top">
	<h3>Menu</h3>
	<div class="kotak">
	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="?page=supervisor">Data Barang</a></li>
	<li><a href="?page=belum_vali">Validasi Barang</a></li>
	<li><a href="?page=lap">Laporan</a></li>
	<li><a href="?page=logout" onclick="return confirm('Anda yakin ingin Keluar ?')" >Log Out</a></li>
	</ul><br>
	</div>
	</td>
	<td width="80%" valign="top">
	<h3>
		<?php 
			$page	= isset($_GET['page']) ? $_GET['page'] : "";
			
			if(strstr($page,"supervisor")) {
			$j="Menu Data Barang";
			} else {
			$j="Menu Utama";
			} 
			echo $j;
		?>
			</h3>
			<div class="tengah">
		<?php 
		
	//menu data_barang untuk supervisor
	if($page=="supervisor") {
	include "../supervisor/lihat_barang.php";
	$user = $_SESSION['user'];
	} else if ($page=="kode_barang") {
	include "../supervisor/kode_barang.php";
	} 
	else if ($page=="tambah_barang") {
	include "../supervisor/act_vali.php";
	} else if ($page=="act_valid") {
	include "../supervisor/act_valid.php";
	} else if ($page=="valid") {
	include "../supervisor/hasil_validasi.php";
	}
	
	//======== akhir menu barang ================
	
	else if ($page=="lihat_vali") {
	include "../supervisor/lihat_validasi.php";
	} else if ($page=="belum_vali") {
	include "../supervisor/belum_validasi.php";
	}
	
	
	
	//----menu laporan 
	else if($page=="lap") {
	include "../laporan/data_valid.php";
	$user = $_SESSION['user'];
	} 
	
	//=============== akhir menu laporan =================


	//----menu cetak 
	else if($page=="cetak") {
	include "../laporan/cetak.php";
	$user = $_SESSION['user'];
	} else if($page=="cetakpdf") {
	include "../laporan/act_cetak_.php";
	$user = $_SESSION['user'];
	} 
	
	//=============== akhir menu cetak =================
	
	
	//log out	
	else if($page=="logout") {
	logout();
	} else {
	echo $utama;
	}
	?>
	</td>
	
</table>
<tr>
	</div>
	<td colspan="2"><img src="../image/footer.PNG" width="100%" height="180px"></td>
	</tr>
<?php
//}
?>



<script src="../laporan/js/jquery-1.11.1.min.js"></script>
        <script src="../laporan/js/bootstrap.min.js"></script>
        <script src="../laporan/js/jquery.dataTables.min.js"></script>
        <script src="../laporan/js/dataTables.bootstrap.js"></script>	
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
		
		
			

<script src="../include/datepicker/lib/zebra_datepicker.js"></script>
<script>
    $(document).ready(function(){
        $('#tahunn').Zebra_DatePicker({
            format: 'Y',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
    });
</script>

</html>