<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>X SOFTWARE</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/font.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Foldit:wght@600&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,700,300"
      rel="stylesheet"
      type="text/css"
    />

    <script src="js/jquery.js" type="text/javascript"></script>
    <script
      src="https://kit.fontawesome.com/3348cb251b.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>

<body>

<!--header start-->
<div class="row header">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <span class="logo">X SOFTWARE</span>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 text-right">
    <div class="d-flex flex-row-reverse">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto" id="navbar-collapse">
        <?php
          include_once 'dbConnection.php';
          session_start();
          if ((!isset($_SESSION['email']))) {
            echo '<a href="#" class="sub1 btn title1" style="border-radius:50px" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;ADAY GİRİŞ</a>&nbsp;';
          } else {
            echo '<a href="logout.php?q=feedback.php" class="sub1 btn title1"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;ÇIKIŞ YAP</a>&nbsp;';
          }
        ?>
        <a href="index.php" style="border-radius:50px" class="btn sub1 title1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;ANA SAYFA</a>&nbsp;
      </div>
    </div>
  </div>
</div>



<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content title1 modal-background">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:#3168d8"><center>ADAY GİRİŞ</center></span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Mail Adresinizi Giriniz" class="form-control input-md giris-input" type="email">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Şifrenizi Giriniz" class="form-control input-md giris-input" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer footer-center">
        <button type="submit" class="btn btn-primary">GİRİŞ</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--header end-->

<div class="bg3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12 panel2">
        <h2 align="center" style="font-family:'times roman'; color:#fff">GÖRÜŞ/ÖNERİ/ŞİKAYET</h2>
        <div style="font-size:14px">
          <?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
          else
          {echo' 
            <form role="form"  method="post" action="feed.php?q=feedback.php">
              <div class="form-group">
                <label for="name" style="color:#fff">İsim/Soyisim:</label>
                <input id="name" name="name" placeholder="İsim/Soyisim" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label for="subject" style="color:#fff">Konu:</label>
                <input id="subject" name="subject" placeholder="Konu" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label for="email" style="color:#fff">E-mail:</label>
                <input id="email" name="email" placeholder="E-mail" class="form-control" type="email">
              </div>
              <div class="form-group"> 
                <label for="feedback" style="color:#fff">Görüş/öneri/şikayetinizi buraya yazınız:</label>
                <textarea rows="5" name="feedback" class="form-control" placeholder="Görüş/öneri/şikayetinizi buraya yazınız."></textarea>
              </div>
              <div class="form-group" align="center">
                <input type="submit" name="submit" value="Gönder" class="btn btn-primary" />
              </div>
            </form>';}?>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
<!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
<div class="bg5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title5 d-flex align-items-center justify-content-center">
          <h1 style="color:#224184">KULLANDIĞIMIZ YAZILIMLAR</h1>
        </div>
        <br>
        <div class="scrolling-wrapper" style="overflow-x: auto;">
          <div class="d-flex flex-wrap align-items-center">
            <img  src="image/html.png" alt="html">
            <img  src="image/css.png" alt="css">
            <img  src="image/js.png" alt="js">
            <img style="margin-top:10px" src="image/bt.png" alt="bt">
            <img style="margin-top:10px; margin-bottom:30px; padding-top:20px" src="image/php.png" alt="php">
            <img style="padding-top:30px" src="image/ms.png" alt="ms">
            <img style="margin-bottom:15px; padding-top:10px" src="image/w.png" alt="w">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg2">
    <nav class="container2">
      <div class="container-fluid">
        <div class="row justify-content-end">
          <div class="col-auto">
            <div class="title3 d-flex align-items-center justify-content-center">
              <h1 style="color:#fff">DEPARTMANLARIMIZ</h1>
            </div>
          </div>
        </div>
      </div>
      
        <div class="row justify-content-center">
          <div class="flip-card col-md-3 col-6 mb-3">
            <div class="flip-card-inner">
              <div class="flip-card-front1">
                <h2 style="margin-top:30px;">Front </br>  End Developer</h2>
              </div>
              <div class="flip-card-back1"></br>
                <h3>Lorem, ipsum same as same developer</h3>
              </div>
            </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
            <div class="flip-card-inner">
              <div class="flip-card-front2">
                <h2 style="margin-top:30px;">Back</br> End Developer</h2>
              </div>
              <div class="flip-card-back2"></br>
                <h3>Lorem, ipsum same as same developer</h3>
              </div>
            </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
            <div class="flip-card-inner">
              <div class="flip-card-front3">
                <h2 style="margin-top:30px;">Mobile</br> App Developer</h2>
              </div>
              <div class="flip-card-back3"></br>
                <h3>Lorem, ipsum same as same developer</h3>
              </div>
            </div>
          </div>
        </div>
      
    </nav>
    <br>
</div>
  </div><!--container end-->


<!--Footer start-->
<div class="row footer">
  <div class="col-xs-12 col-sm-4 col-md-4 box">
    <a href="#" data-toggle="modal" data-target="#login">Admin Girişi</a>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 box">
    <a href="#" data-toggle="modal" data-target="#developers">Developer</a>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 box">
    <a href="feedback.php">Bize Ulaşın</a>
  </div>
</div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">KAPAT</span></button>
        <h4 align="center" class="modal-title" style="font-family:'times roman' "><span style="color:#3168d8">DEVELOPER</span></h4>
      </div>

      <div class="modal-body-1">
        <p>
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <img src="image/me.jpg" class="img-responsive img-rounded" alt="Tarık Süreyya Kum">
            </div>
            <div class="col-xs-12 col-sm-8">
              <a style="color:#202020; font-family:'times roman'; font-size:18px; text-decoration:none" title="Developer">Tarık Süreyya Kum</a>
              <h4 style="color:#202020; font-family:'times roman'; font-size:16px" class="title1" title="Telefon Numarası">+90 (553) 909 38 00</h4>
              <h4 style="font-family:'times roman'" title="Gmail">tariksureyyakum@gmail.com</h4>
              <p title="Lisans">Dokuz Eylül Üniversitesi - Yönetim Bilişim Sistemleri
              </p>
              <table>
  <tr>
    <td><a style="font-family:'times roman'" href="https://github.com/tariksureyyakum" title="Linkedin">Linkedin</a></td>
    <td style="padding-left: 90px;"><a style="font-family:'times roman'" href="https://www.linkedin.com/in/tariksureyyakum/" title="GitHub">GitHub</a></td>
    <td style="padding-left: 90px;"><a style="font-family:'times roman'" href="https://www.instagram.com/tarik.kum/" title="Instagram">Instagram</a></td>
  </tr>
</table>

            </div>
          </div>
        </p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal for admin login-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content modal-background">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">KAPAT</span></button>
        <h4 class="modal-title"><span style="color:#3168d8;font-family: 'Bruno Ace SC', cursive; "><center>ADMIN GİRİŞ</center></span></h4>
      </div>
      <div class="modal-body title1">
        <div class="row">
          <div class="col-xs-0 col-sm-3"></div>
          <div class="col-xs-12 col-sm-6">
            <form role="form" method="post" action="admin.php?q=index.php">
              <div class="form-group">
                <input type="text" name="uname" maxlength="50"  placeholder="Admin Email" class="form-control giris-input"/> 
              </div>
              <div class="form-group">
                <input type="password" name="password" maxlength="15" placeholder="Şifre" class="form-control giris-input"/>
              </div>
              <div class="form-group" align="center">
                <input type="submit" name="login" value="GİRİŞ YAP" class="btn btn-primary" style="border-radius:0%" />
              </div>
            </form>
          </div>
          <div class="col-xs-0 col-sm-3"></div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--footer end-->

<div class="bg6">
  <div class="container">          
    <div class="title6 d-flex align-items-center justify-content-center">
      <h6 style="color:black">© 2023 <b> X SOFTWARE</b> Tüm Hakları Saklıdır. </h6>
    </div>
  </div>
</div>
</body>
</html>