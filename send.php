<?php

include_once('dbConnection.php');
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require_once '/wamp64/www/projeler/xsoftware/PHPMailer-6.8.0/src/Exception.php';
require_once '/wamp64/www/projeler/xsoftware/PHPMailer-6.8.0/src/PHPMailer.php';

require_once '/wamp64/www/projeler/xsoftware/PHPMailer-6.8.0/src/SMTP.php';

// Yeni bir PHPMailer nesnesi oluşturun
$mail = new PHPMailer(true); // "true" hata ayıklama modunu açar

if (isset($_POST['email'])) {
    $e = $_POST['email'];

    $y = mysqli_query($con, "SELECT * FROM rank WHERE email='$e'");
    while ($row = mysqli_fetch_array($y)) {
        $ts = $row['score'];
    }
    $b = mysqli_query($con, "SELECT * FROM user WHERE email='$e'");
    while ($rowkullanici = mysqli_fetch_array($b)){
        $i = $rowkullanici['name'];
    }
    $d = mysqli_query($con,"SELECT college FROM user WHERE email='$e'");
    while ($rowdepartman = mysqli_fetch_array($d)){
        $dd = $rowdepartman['college'];
}


}


try {
    // Sunucu ayarlarını yapın
    $mail->SMTPDebug = 2; // Hata ayıklama: 0, 1, 2, 3 veya 4
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // E-posta sağlayıcınızın SMTP sunucusu
    $mail->SMTPAuth = true;
    $mail->Username = 'xs.xsoftware@gmail.com'; // E-posta adresiniz
    $mail->Password = 'tzzpbtjxvdrixhyz'; // E-posta hesabınızın şifresi
    $mail->SMTPSecure = 'tls'; // TLS şifreleme türü
    $mail->Port = 587; // SMTP portu (örnekte Gmail'in SMTP portu)

    // Alıcı, gönderici ve konu ayarlarını yapın
    $mail->setFrom('xs.xsoftware@gmail.com', 'X SOFTWARE'); // Gönderen
    $mail->addAddress($e, $i); // Alıcı
    $mail->Subject = 'X SOFTWARE ADAY SONUCU'; // Konu

    // E-posta içeriğini ve biçimlendirmesini ayarlayın
    $mail->isHTML(true); // HTML biçimlendirme kullanılsın mı?
    if($ts>=160){
        $mail->Body = '<div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3 class="panel-title">Sınav Hakkında Bilgilendirme</h3>
                <p><strong>Genel Kültür Sınavı:</strong> Yazılım ile alakalı 20 tane genel kültür sorusu bulunmaktadır.</p>
                <p><strong>Alan Sınavı:</strong> Başvurmuş olduğunuz departmana ait 20 tane soru bulunmaktadır.</p>
                <p><strong>Sınav Sonucu:</strong> Toplamda 160 puan almadığınız takdirde başvurunuz değerlendirmeye alınmayacaktır.</p>
            
          </div>
        <div class="panel-body text-center">
          
            <h4 style="color:green">Sayın '.$i.',Başvurunuz Alındı!</h4>
            <p style="color:blue">Başvuru yaptığınız departman : '.$dd.'</p>
            <p>Sınav sonuçlarınız 200 üzerinden, 160 puanı geçerek ' .$ts. ' alarak kriterlerimizi karşıladınız. Başvurunuz değerlendirilecektir. Detaylar için sizinle iletişime geçeceğiz.</p>
         
        </div>'; // E-posta içeriği
        
    }elseif($ts<160){
        $mail->Body = '<div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3 class="panel-title">Sınav Hakkında Bilgilendirme</h3>
                <p><strong>Genel Kültür Sınavı:</strong> Yazılım ile alakalı 20 tane genel kültür sorusu bulunmaktadır.</p>
                <p><strong>Alan Sınavı:</strong> Başvurmuş olduğunuz departmana ait 20 tane soru bulunmaktadır.</p>
                <p><strong>Sınav Sonucu:</strong> Toplamda 160 puan almadığınız takdirde başvurunuz değerlendirmeye alınmayacaktır.</p>
        
          </div>
        <div class="panel-body text-center">
          
            <h4 style="color:Red">Sayın '.$i.', Üzgünüz!</h4>
            <p style="color:blue">Başvuru yaptığınız departman : '.$dd.'</p>
            <p>Sınav sonuçlarınız 200 üzerinden, 160 puanın altında kalarak ' .$ts. ' puan aldınız. Maalesef kriterlerimizi karşılayamadınız. Başvurunuz değerlendirilmeye alınmamıştır.
            Detaylı inceleme için lütfen sitemizi ziyaret ederek aday girişi yapınız.</p>
         
        </div>'; // E-posta içeriği
    }
    

    // E-posta gönderme işlemini gerçekleştirin
    $mail->send();
    echo 'E-posta başarıyla gönderildi!';
} catch (Exception $e) {
    echo 'E-posta gönderme hatası: ' . $mail->ErrorInfo;
}
?>