<?php
include '../../inc/koneksi.php';
include '../../inc/fungsi.php';
require('../../inc/pdf/fpdf.php');
$query=$mysqli->query("SELECT * FROM tb_dosen ORDER BY nip");
$cek = $query->num_rows;

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);

$pdf->SetX(9.5);   
$pdf->SetFont('Arial','B',20);         
$pdf->MultiCell(19.5,0.5,'Sistem Akademik Mahasiswa',0,'L');
$pdf->SetX(10);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','',13);
$pdf->SetX(13);
$pdf->MultiCell(19.5,0.5,'Wahyu Pratama',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Mahasiswa",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(49.5,0.7,"Total Data : ".$cek,0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NIP', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Dosen', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Gender', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Telepon', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

while($lihat=$query->fetch_assoc()){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nip'], 1, 0,'C');
	$pdf->Cell(9, 0.8, ucwords($lihat['nama_dosen']),1, 0, 'C');	
	$pdf->Cell(4.5, 0.8, gender($lihat['j_kel']), 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['alamat'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['telepon'], 1, 1,'C');

	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Dosen",0,10,'C');

$pdf->Output("laporan_dosen.pdf","I");

?>

