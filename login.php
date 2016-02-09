<?php
session_start();
$_SESSION['sesi']	= NULL;

include "include/koneksi_db.php";

$user	= isset($_POST['user']) ? $_POST['user'] : "";
$pass	= isset($_POST['pass']) ? $_POST['pass'] : "";
$op		= $_GET['op'];

if($op=="in"){

$cek	= mysql_query("SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");

if(mysql_num_rows($cek)==1){
$c=mysql_fetch_array($cek);
$_SESSION['user']=$c['username'];
$_SESSION['hak_akses']=$c['hak_akses'];

if($c['hak_akses']=="3" && $c['groupid']=="1"){
$_SESSION['user']=$c['username'];
header("location:user/index.php");
}
else if($c['hak_akses']=="2" && $c['groupid']=="1"){
$_SESSION['user']=$c['username'];
header("location:supervisor/index.php");
}
else if($c['hak_akses']=="3" && $c['groupid']=="2"){
$_SESSION['user']=$c['username'];
header("location:user/index.php");
}
else if($c['hak_akses']=="2" && $c['groupid']=="2"){
$_SESSION['user']=$c['username'];
header("location:supervisor/index.php");
}
else if($c['hak_akses']=="3" && $c['groupid']=="3"){
$_SESSION['user']=$c['username'];
header("location:user/index.php");
}
else if($c['hak_akses']=="2" && $c['groupid']=="3"){
$_SESSION['user']=$c['username'];
header("location:supervisor/index.php");
}
else if($c['hak_akses']=="1" && $c['groupid']=="0"){
$_SESSION['user']=$c['username'];
header("location:superadmin/index.php");
}

else{
echo "Maaf, password yang anda masukkan salah";
}

}

}

else if($op=="out"){
unset($_SESSION['user']);
unset($_SESSION['level']);
header("location:index.php");
}

?>