<?php
include_once 'dbConnection.php';
require_once('fpdf/fpdf.php');
$q = mysqli_query($con, "SELECT * FROM rank WHERE email = '$email' ORDER BY score DESC") or die('Error223');
$row = mysqli_fetch_array($q);
    

// Değişkenleri al
$name = $row['name'];
$email = $row['email'];
$mob = $row['mob'];
$score = $row['score'];

// PDF nesnesi oluştur
$pdf = new FPDF();

// PDF sayfası ekle
$pdf->AddPage();

// PDF içeriğini oluştur
$pdf->SetFont('Arial', 'B', 16);
$pdf->AddFont('ArialUnicodeMS', '', 'arialuni.php');
$pdf->Cell(40, 10, 'Başvuru Durumu');

// Aday bilgilerini PDF'ye ekle
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'İsim Soyisim: '.$name);
$pdf->Ln();
$pdf->Cell(40, 10, 'Email: '.$email);
$pdf->Ln();
$pdf->Cell(40, 10, 'Telefon: '.$mob);
$pdf->Ln();
$pdf->Cell(40, 10, 'Puan: '.$score);

// Başvuru durumunu PDF'ye ekle
$pdf->Ln();
if ($score >= 160) {
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetTextColor(0, 128, 0);
    $pdf->Cell(40, 10, 'Başvurunuz Kabul Edilmiştir!');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(40, 10, 'Sınav puanınız '.$score.'/200, minimum gereklilik olan 160 puanın üzerindedir. Başvurunuz değerlendirilecektir. Size ilerleyen aşamalar için ulaşacağız.');
} else {
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(40, 10, 'Üzgünüz!');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(40, 10, 'Sınav puanınız '.$score.'/200, minimum gereklilik olan 160 puanın altındadır. Başvurunuz değerlendirilmemiştir.');
}

// PDF dosyasını kaydet
ob_end_clean(); // Önceki çıktıları temizle
$pdf->Output('basvurudurumu.pdf', 'D');
exit(); // PDF dosyası gösterildiği için betiği sonlandır
?>
