<?php 
require('fpdf/fpdf.php');
include "../include/koneksi_db.php";
include "../include/fungsi2.php";

$user = $_SESSION['user'];

$cariuser = mysql_query("select * from admin where username='$user'" , $konek); 
$cs = mysql_fetch_array($cariuser);
$userr = $cs['kode'];


$namafile = "LAPORAN ADMIN ". " " . $tahun . " " . $validasi;
$tahun     = isset($_POST['tahunn']) ? addslashes($_POST['tahunn']) : "";
$validasi     = isset($_POST['validasi']) ? addslashes($_POST['validasi']) : "";


 class PDF extends FPDF
{
function Header()
{
$this->Image('logo.png',25,5,15,15);  
$this->SetFont('Arial','B',14);  
$this->Cell(0,0.75,' Laporan Barang ',0,0,'C');  
$this->Ln(); 
$this->Ln();   $this->Ln();  $this->Ln();  $this->Ln(); $this->Ln();$this->Ln();$this->Ln();
$this->SetFont('Arial','B',11);  
$this->Cell(0,0.5,'INVENTARIS',0,0,'C');  
$this->Ln();  $this->Ln();  $this->Ln();  $this->Ln(); $this->Ln();$this->Ln(); $this->Ln();
$this->SetFont('Arial','',9);  
$this->Cell(0,0.5,'INDONESIA POWER',0,0,'C');  
}  
} 





$pdf=new PDF('L','mm','A4');  
$pdf->Open();  
$pdf->text(10,25,'LAPORAN DATA BARANG');
$pdf->AddPage();  
$pdf->SetFont('Arial','B',12);    

$yi = 30;
    $ya = 24;
    $pdf->setFont('Arial','',9);
    $pdf->setFillColor(222,222,222);
    $pdf->setXY(10,$ya);
	
	$pdf->Cell(8,5,'NO',1,0,'C',1);
	$pdf->Cell(15,5,'Kode',1,0,'C',1);
	$pdf->Cell(30,5,'No Extracom',1,0,'C',1);
	$pdf->Cell(20,5,'Header',1,0,'C',1); 
	$pdf->Cell(20,5,'NO Urut',1,0,'C',1);
	$pdf->Cell(40,5,'Nama Barang',1,0,'C',1);
	$pdf->Cell(10,5,'Merk',1,0,'C',1);
	$pdf->Cell(15,5,'Jumlah',1,0,'C',1); 
	$pdf->Cell(15,5,'Satuan',1,0,'C',1);
	$pdf->Cell(15,5,'Keadaan',1,0,'C',1);
	$pdf->Cell(15,5,'Lokasi',1,0,'C',1);
	$pdf->Cell(20,5,'Supplier',1,0,'C',1);
	$pdf->Cell(20,5,'Harga',1,0,'C',1);
	$pdf->Cell(15,5,'Validasi',1,0,'C',1);
	
    $ya = $yi + $row;
    $sql = mysql_query("SELECT * FROM detail_barang where validasi='$validasi' AND no_extracom LIKE '%$tahun%' ORDER BY kode ",$konek);
    $max = 31;
    $row = 6;
    while($result = mysql_fetch_array($sql)){
    $pdf->setXY(10,$ya);
    $pdf->setFont('Arial','',9);
    $pdf->setFillColor(255,255,255);
    
	$kode_akhir = $result['kode_akhir'];
	$kode = $result['kode'];
	$no_extracom = $result['no_extracom'];
	$header = $result['header'];  
	$no_urut = $result['no_urut'];
	$namabrg = $result['namabrg'];
	$merk = $result['merk'];
	$jumlah = $result['jumlah']; 
	$satuan = $result['satuan'];
	$keadaan = $result['keadaan'];
	$lokasi = $result['lokasi'];
	$supplier = $result['supplier'];
	$harga = $result['harga'];
	$validasi = $result['validasi'];	
	
	
	$pdf->Cell(8,5,$kode_akhir,1,0,'C',1);
	$pdf->Cell(15,5,$kode,1,0,'C',1);
	$pdf->Cell(30,5,$no_extracom,1,0,'C',1);
	$pdf->Cell(20,5,$header,1,0,'C',1); 
	$pdf->Cell(20,5,$no_urut,1,0,'C',1);
	$pdf->Cell(40,5,$namabrg,1,0,'C',1);
	$pdf->Cell(10,5,$merk,1,0,'C',1);
	$pdf->Cell(15,5,$jumlah,1,0,'C',1); 
	$pdf->Cell(15,5,$satuan,1,0,'C',1);
	$pdf->Cell(15,5,$keadaan,1,0,'C',1);
	$pdf->Cell(15,5,$lokasi,1,0,'C',1);
	$pdf->Cell(20,5,$supplier,1,0,'C',1);
	$pdf->Cell(20,5,$harga,1,0,'C',1);
	$pdf->Cell(15,5,$validasi,1,0,'C',1);
	
	
	
	
    $ya = $ya+$row;
    }
    $pdf->text(150,$ya+6,"Jakarta , ". $hari_ini);
    $pdf->text(150,$ya+20,"SUPERVISOR ". $userr);
    $pdf->output($namafile.'.pdf','I');
    ?>