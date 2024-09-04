<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once("PHPMailer-6.8.0\src\PHPMailer.php");
require_once("PHPMailer-6.8.0\src\Exception.php");


// PDF dosyasının yolu
$pdfPath = 'basvurudurumu.pdf';

// E-posta gönderme işlemi
$mail = new PHPMailer(true);
try {
    //Sunucu ayarlarını yap
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'xs.xsoftware@gmail.com';
    $mail->Password = '827451998';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Alıcı, gönderici ve e-posta konusu bilgilerini ayarla
    $mail->setFrom('xs.xsoftware@gmail.com', 'Your Name');
    $mail->addAddress('tsureyyakum@gmail.com', 'Recipient Name');
    $mail->addAttachment($pdfPath);
    $mail->isHTML(true);
    $mail->Subject = 'Başvuru Durumu';
    $mail->Body = 'Başvuru durumunu gösteren PDF dosyası ektedir.';

    // E-posta gönder
    $mail->send();

    echo 'E-posta gönderildi!';

    // Ayarları değiştir ve tekrar gönder
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'xs.xsoftware@gmail.com';
    $mail->Password = '827451998';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('xs.xsoftware@gmail.com', 'Your Name');
    $mail->addAddress('tsureyyakum@gmail.com', 'Recipient Name');
    $mail->addAttachment($pdfPath);
    $mail->isHTML(true);
    $mail->Subject = 'Başvuru Durumu';
    $mail->Body = 'Başvuru durumunu gösteren PDF dosyası ektedir.';

    $mail->send();

    echo 'E-posta gönderildi!';
} catch (Exception $e) {
    echo 'E-posta gönderilemedi. Hata: ', $mail->ErrorInfo;
}
