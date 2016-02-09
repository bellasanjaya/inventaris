<?php 
session_start();
include "../include/fungsi2.php";
$user = $_SESSION['user'];
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
function logout() {
	session_start();
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
}

$utama="<center>
<span class='s'><br>Untuk menggunakan, silakan memilih menu di samping kiri !
<br>Status Anda login sebagai <b>USER $user</b> Jangan lupa LOG OUT sesudah menggunakan aplikasi ini.</span></center>";
?>

<html>
<head>
<title>.:: Aplikasi Inventaris::.</title>
<link rel="stylesheet" type="text/css" href="../include/style.css" />

	   <link rel="stylesheet" href="../laporan/css/bootstrap.min.css">
       <link rel="stylesheet" href="../laporan/css/dataTables.bootstrap.css">
</head>

<body>
<table border=0 width="100%" bgcolor="#FFFFF0" cellpadding=2 cellspacing=2 >
<tr>
<td colspan="2"><img src="../image/header.PNG" width="100%" height="180px">
<div style="position: absolute; width: 418px; height: 69px; z-index: 1; left:550px; top:44px" id="layer1">
<p align="center"><font color="#DC143C"><u><b>
<font size="6" face="Bookman Old Style">Aplikasi Extracomptable</font></b></u><br></font>
<b><font size="3" font color="#DC143C">Indonesia Power Unit Jasa Pemeliharaan</font></b></div>
</td>
	</tr>
	<tr>
		<td colspan=2><marquee onmouseover="this.stop();" behavior="alternate" onmouseout="this.start();">Halaman User</marquee>
		</td>
	</tr>
	<tr>
	<td width="20%" valign="top">
	<h3>Menu</h3>
	<div class="kotak">
	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="?page=barang">Lihat Barang</a></li>
	<li><a href="?page=input">Input Barang</a></li>

	<li><a href="?page=logout" onclick="return confirm('Anda yakin ingin Keluar ?')" >Log Out</a></li>
	</ul><br>
	</div>
	</td>
	
	
	<td width="80%" valign="top">
	<h3>
		<?php 
			$page	= isset($_GET['page']) ? $_GET['page'] : "";
			
			if(strstr($page,"barang")) {
			$j="Menu Data Barang";
			} else if(strstr($page,"input")) {
			$j="Menu Input Barang";	
			} else {
			$j="Menu Utama";
			} 
			echo $j;
		?>
			</h3>
			<div class="tengah">
			
		<?php 
		
	//menu data_barang
	if($page=="barang") {
	include "lihat_barang.php";
	$user = $_SESSION['user'];
	} else if($page=="input") {
	include "input_barang.php";
	$user = $_SESSION['user'];
	} else if($page=="act_sis") {
	$user = $_SESSION['user'];
	include "act_sis.php";
	}
	
	
	//rusak
	else if($page=="rusak") {
	$user = $_SESSION['user'];
	include "rusak.php";
	} else if($page=="lihat_rusak") {
	$user = $_SESSION['user'];
	include "lihat_rusak.php";
	} else if($page=="daftar_rusak") {
	$user = $_SESSION['user'];
	include "daftar_rusak.php";
	} else if($page=="act_rusak") {
	$user = $_SESSION['user'];
	include "act_rusak.php";
	}
	
	//log out	
	else if($page=="logout") {
	logout();
	} 
	else {
	echo $utama;
	}
	?>
	</td>
	
</table>

<tr>
	</div>
	<td colspan="2"><img src="../image/footerblue.PNG" width="100%" height="180px">
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
		
</html>