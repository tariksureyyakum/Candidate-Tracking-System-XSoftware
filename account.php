<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>XS ADAY</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">XS ADAY</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Merhaba,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a><a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;ÇIKIŞ</button></a></span>';
}?>
</div>
</div></div>
<div class="bg4">

 <!--navigation menu-->
  <nav class="navbar navbar-default title2 navbar-text">
    <div class="container4">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav justify-content-end">
              <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> >
                <a href="account.php?q=1">
                  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Sınavlar
                  <span class="sr-only">(seçilmiş)</span>
                </a>
              </li>
              <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>>
                <a href="account.php?q=2">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Geçmiş
                </a>
              </li>
              <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>>
                <a href="account.php?q=3">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Sonuç
                </a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </nav>
 <!--navigation menu closed-->
  <div class="container1"><!--container start-->
    <div class="row">
      <div class="col-md-12">



      <!--home start-->
      <?php if(@$_GET['q']==1) {


        $email = $_SESSION['email'];

        // Collage sütunundaki departman adını sorgulayalım
        $qry = mysqli_query($con, "SELECT college FROM user WHERE email='$email'")or die('Error451');
        $row = mysqli_fetch_array($qry);
        $college = $row['college'];

        // Sınavları departman adı ile filtreleyelim ve ekrana yazdıralım
        $result = mysqli_query($con, "SELECT * FROM quiz WHERE UPPER(title) IN (SELECT college FROM user WHERE email='$email') OR UPPER(title)='GENEL KÜLTÜR' ORDER BY date ASC
") or die('Error: ' . mysqli_error($con));
        echo '<div class="panel3"><table class="table table-striped title">
              <tr><td><b>Sınavlar</b></td><td><b>Sınav Adı</b></td><td><b>Toplam Soru</b></td><td><b>Puan</b></td><td><b>Sınav Süresi</b></td><td></td></tr>';
        $c = 1;
        while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $time = $row['time'];
            $eid = $row['eid'];
            $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error: ' . mysqli_error($con));
            $rowcount = mysqli_num_rows($q12);
            if ($rowcount == 0) {
                echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
                <td><b><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="margin:0px;background:#2db44a; border-radius:0%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Başla</b></span></a></b></td></tr>';
            } else {
                echo '<tr style="color:#2db44a"><td>' . $c++ . '</td><td>' . $title . '&nbsp;<span title="Bu sınav zaten sizin tarafınızdan çözüldü" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td><td></td>';
            }
        }
        $c = 0;
        echo '</table></div>';


      }?>
      <!--<span id="countdown" class="timer"></span>
      <script>
      var seconds = 40;
          function secondPassed() {
          var minutes = Math.round((seconds - 30)/60);
          var remainingSeconds = seconds % 60;
          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds; 
          }
          document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
              document.getElementById('countdown').innerHTML = "Buzz Buzz";
          } else {    
              seconds--;
          }
          }
      var countdownTimer = setInterval('secondPassed()', 1000);
      </script>-->

      <!--home closed-->

      <!--quiz start-->
      <?php
      if(@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
          $eid = @$_GET['eid'];
          $sn = @$_GET['n'];
          $total = @$_GET['t'];

          // eid'ye göre quiz tablosundan sınav süresini al
          $duration_query = mysqli_query($con, "SELECT time FROM quiz WHERE eid='$eid'");
          $duration_row = mysqli_fetch_array($duration_query);
          $duration = $duration_row['time'] * 60; // süreyi saniyeye çevir

          // sınava zamanlayıcı ekle
          if (!isset($_SESSION['start_time'])) { // session değişkeni tanımlanmamışsa başlangıç zamanını kaydet
              $_SESSION['start_time'] = time();
          }
          echo '<script type="text/javascript">
              var duration = '.$duration.'; // set countdown duration in seconds
              var interval = setInterval(function() {
                  var elapsed_time = Math.floor((new Date() - new Date('.($_SESSION['start_time']*1000).'))/1000); // geçen süreyi hesapla
                  var remaining_time = duration - elapsed_time; // kalan süreyi hesapla
                  var minutes = Math.floor(remaining_time / 60);
                  var seconds = remaining_time % 60;
                  document.getElementById("quiz-timer").innerHTML = "Kalan süre: " + minutes + " dakika " + seconds + " saniye";
                  if (remaining_time <= 0) { // süre dolduysa formu submit et
                      clearInterval(interval);
                      document.getElementById("quiz-form").submit();
                  }
              }, 1000);
          </script>';

          // sınav formunu göster
          $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
          echo '<div class="panel3" style="margin:5%">';
          while ($row = mysqli_fetch_array($q)) {
              $qns = $row['qns'];
              $qid = $row['qid'];
              echo '<b>Soru &nbsp;'.$sn.'&nbsp;:<br><br>'.$qns.' <br>';
          }

          $options = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid'");
          echo '<form id="quiz-form" action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST" class="form-horizontal">
              <br />';

          while ($row = mysqli_fetch_array($options)) {
              $option = $row['choice'];
              $optionid = $row['optionid'];
              echo'<input type="radio" name="ans" value="'.$optionid.'"><b> '.$option.' </b><br><br>';
          }

          echo '<br /><button type="submit" class="btn btn-success" style="border-radius:0%">
              <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;İlerle</button></form></div>';

          // kalan süre alanını göster
          $elapsed_time = time() - $_SESSION['start_time'];
          $remaining_time = $duration - $elapsed_time;
          $minutes = floor($remaining_time / 60);
          $seconds = $remaining_time % 60;
          echo '<div class="quiz-timer-box">
        <div class="quiz-timer-label">Sınavın bitmesine</div>
        <div class="quiz-timer" id="quiz-timer">Kalan süre: '.$duration/60 .' dakika 0 saniye</div>
      </div>';
      }







      //Sonuç Ekranı

      if(@$_GET['q']== 'result' && @$_GET['eid']) 
      {
      $eid=@$_GET['eid'];
      $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
      echo  '<div class="panel3">
      <center><h1 class="title" style="color:#17a2b8">Sonuç</h1><center><br /><table class="table table-striped title" style="font-size:20px;font-weight:1000;">';

      while($row=mysqli_fetch_array($q) )
      {
      $s=$row['score'];
      $w=$row['wrong'];
      $r=$row['sahi'];
      $qa=$row['level'];
      echo '<tr style="color:#17a2b8"><td>Toplam Soru Sayısı</td><td>'.$qa.'</td></tr>
            <tr style="color:green"><td>Doğru Cevap&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
          <tr style="color:red"><td>Yanlış Cevap&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
          <tr style="color:black"><td>Puan&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
      }


      }
      ?>
      <!--quiz end-->
      <?php
      //history start
      if(@$_GET['q']== 2) 
      {
      $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
      echo  '<div class="panel3 title">
      <table class="table table-striped title" >
      <tr style="color:#5bc0de"><td><b>S.S.</b></td><td><b>Sınavlar</b></td><td><b>Soru Sayısı</b></td><td><b>Doğru Sayısı</b></td><td><b>Yanlış Sayısı<b></td><td><b>Puan</b></td>';
      $c=0;
      while($row=mysqli_fetch_array($q) )
      {
      $eid=$row['eid'];
      $s=$row['score'];
      $w=$row['wrong'];
      $r=$row['sahi'];
      $qa=$row['level'];
      $q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
      while($row=mysqli_fetch_array($q23) )
      {
      $title=$row['title'];
      }
      $c++;
      echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
      }
      echo'</table></div>';
      }

      //Sınav Sonucu Bilgilendirme Sayfası

      if (@$_GET['q'] == 3) {
          $q = mysqli_query($con, "SELECT * FROM rank WHERE email = '$email' ORDER BY score DESC") or die('Error223');
          $row = mysqli_fetch_array($q);
          $score = $row['score'];
      ?>    
          <div class="panel panel-default">
              <div class="panel-heading text-center">
                <h3 class="panel-title">Sınav Hakkında Bilgilendirme</h3>
                <p><strong>Genel Kültür Sınavı:</strong> Yazılım ile alakalı 20 tane genel kültür sorusu bulunmaktadır.</p>
                <p><strong>Alan Sınavı:</strong> Başvurmuş olduğunuz departmana ait 20 tane soru bulunmaktadır.</p>
                <p><strong>Sınav Sonucu:</strong> Toplamda 160 puan almadığınız takdirde başvurunuz değerlendirmeye alınmayacaktır.</p>
              </div>
              <div class="panel-body text-center">
                <?php if ($score == 0): ?>
                  <h4>Sınava Henüz Girilmedi</h4>
                  <p>Lütfen sınava girerek başvurunuzu tamamlayın.</p>
                <?php elseif ($score >= 160): ?>
                  <h4 style="color:green">Başvurunuz Alındı!</h4>
                  <p>Sınav sonuçlarınız 200 üzerinden, 160 puanı geçerek <?php echo $score; ?> puan aldığınız için başvurunuz değerlendirilecektir. Detaylar için sizinle iletişime geçeceğiz.</p>
                <?php else: ?>
                  <h4 style="color:red">Üzgünüz!</h4>
                  <p>Sınav sonuçlarınız 200 üzerinden, 160 puanın altında kalarak <?php echo $score; ?> puan aldığınız için maalesef kriterlerimizi karşılayamadınız. Başvurunuz değerlendirilmeye alınmamıştır.</p>
                <?php endif; ?>
              </div>

            
      <?php
          $q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
      $total_score = 0;
      echo '<div style=" max-width: 500px; margin: 0 auto;">
      <table style="border-collapse: collapse; width: 100%;">
      <thead>
      <tr style="background-color: #5bc0de; color: #fff;">
      <th style="padding: 10px 5px;">Sınavlar</th>
      <th style="padding: 10px 5px;">Puan</th>
      </tr>
      </thead>
      <tbody>';
      $c=0;
      while($row=mysqli_fetch_array($q)) {
      $eid=$row['eid'];
      $s=$row['score'];
      $total_score += $s;
      $q23=mysqli_query($con,"SELECT title FROM quiz WHERE eid='$eid' " )or die('Error208');
      while($row=mysqli_fetch_array($q23) )
      {
      $title=$row['title'];
      }
      $c++;
      echo '<tr style="border-bottom: 1px solid #ddd;">
      <td style="padding: 10px 5px;">'.$title.'</td>
      <td style="padding: 10px 5px;">'.$s.'</td>
      </tr>';
      }
      echo '<tr style="background-color: #5bc0de; color: #fff;">
      <td style="padding: 10px 5px;"><b>Toplam</b></td>
      <td style="padding: 10px 5px;"><b>'.$total_score.'</b></td>
      </tr>';
      echo '</tbody></table></div>';

      }




      ?>
      
      </div>
    </div>
  </div>
</div>
<!--Footer start-->

<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:#5bc0de">Developer</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/me.jpg" width=100 height=120 alt="Tarık Süreyya Kum" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a style="color:#202020; font-family:'times roman' ; font-size:18px; text-decoration:none" title="Find on Facebook">Tarık Süreyya Kum</a>
		<h4 style="color:#202020; font-family:'times roman' ;font-size:16px" class="title1">+90(553)909 38 00</h4>
		<h4 style="font-family:'times roman' ">tariksureyyakum@gmail.com</h4>
		<h4 style="font-family:'times roman' ">Jr.Front-End Developer</h4></div></div>
		</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'times roman' ">GİRİŞ</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin Mail" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Şİfre" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Giriş" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>
