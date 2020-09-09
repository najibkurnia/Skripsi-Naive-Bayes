<?php

require('fpdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('fpdf/1.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Penilaian Kinerja Karyawan menggunakan Metode Naïve Bayes',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 08*******',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Alamat : Jln Kabupaten, Kec Gamping, Kabupaten Sleman, DIY, ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Code by : Zaqie Alfatah',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Hasil Penilaian Kinerja Karyawan',0,0,'C');
$pdf->ln(1);
$pdf->Cell(0,0.7,'CV.SABIRIN SEJAHTERA',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Pendidikan Terakhir', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Disiplin', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Teamwork', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Leadership', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kepatuhan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kejujuran', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Inisiatif', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Hasil Status', 1, 0, 'C');
$pdf->ln();

$no=1;
include 'koneksi.php';
$query=mysqli_query($koneksi, "SELECT * FROM hasil_naive");
while($lihat=mysqli_fetch_array($query)){
    $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['nama'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['pendidikan_terakhir'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['disiplin'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['teamwork'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['leadership'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['kepatuhan'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['kejujuran'], 1, 0,'C');
    $pdf->Cell(2, 0.8, $lihat['inisiatif'], 1, 0,'C');

    if($lihat['hasil_baik'] > $lihat['hasil_normal']){
    $pdf->Cell(2, 0.8, 'Baik', 1, 0,'C');
    }elseif($lihat['hasil_normal'] > $lihat['hasil_kurang']){
    $pdf->Cell(2, 0.8, 'Normal', 1, 0,'C');
    }else {
        $pdf->Cell(2, 0.8, 'Kurang', 1, 0,'C');
    }

    $pdf->ln();
    $no++;
}
$pdf->Output("laporan_kinerja.pdf","I");
?>
