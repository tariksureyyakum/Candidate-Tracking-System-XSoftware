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
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("İsim Doldurulmalıdır.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("Departman Doldurulmalıdır");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Geçerli olmayan e-posta adresi.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Şifre doldurulmalıdır.");return false;}if(a.length<5 || a.length>25){alert("Parolalar 5 ila 25 karakter uzunluğunda olmalıdır.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Şifreler aynı olmalıdır.");return false;}}
</script>


</head>

<body>
<div class="header">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-8">
      <span class="logo">X SOFTWARE</span>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-1 text-right">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-1">
      <a href="#" class="pull-right btn sub1" style="border-radius: 50px;" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>ADAY GİRİŞ</b></span>
      </a>
    </div>
  </div>

  <!-- sign in modal start -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
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
          <button type="submit" class="btn btn-primary text-center">GİRİŞ</button>
        </fieldset>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  <!-- sign in modal closed -->
</div><!-- header row closed -->
<!-- header row closed -->
</div>



<div class="bg1">
  <div class="row">
    <div class="col-md-7"></div>
      <div class="col-md-4 panel">
<!-- sign in form begins -->  
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>

<p class="text-center" style="color:#fff"><b>Bizimle Çalışmak İster misiniz?</b></p>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
    <input id="name" name="name" placeholder="Ad Soyad" class="form-control input-md" type="text">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Gender" class="form-control input-md" >
      <option value="Male" style="color:black">Cinsiyetinizi Seçiniz</option>
      <option value="E" style="color:black">Erkek</option>
      <option value="K" style="color:black">Kadın</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
    <select id="college" name="college" placeholder="Departman" class="form-control input-md">
      <option value="college" style="color:black">Departman Seçiniz</option>
      <option value="FRONT END" style="color:black">Front-End Developer</option>
      <option value="BACK END" style="color:black">Back-End Developer</option>
      <option value="MOBIL APP" style="color:black">Mobil App Developer</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Email" class="form-control input-md" type="email">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
    <input id="mob" name="mob" placeholder="Telefon Numarası" class="form-control input-md" type="number">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Şifre" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Şifre Kontrol" class="form-control input-md" type="password">
    
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub btn btn-primary" value="Başvuru Yap"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div>
</div>
<div class="bg6">
  <div class="container">
    <div class="row col-lg-12 col-md-12">   
      <div class="title5 d-flex align-items-center justify-content-center">
        <h1 style="color:#224184">SIKÇA SORULAN SORULAR</h1>
      </div> </br>      
      <div class="title5 d-flex align-items-center justify-content-center">
        <div class="faq-box col-lg-4 col-md-4 col-sm-1">
          <h3>İş başvurusunu nasıl yapabilirim?</h3>
          <p style="font-size:15px;">Başvurmak için ana sayfada bulunan bilgileri eksiksiz doldurup "Başvuru Yap" butonuna tıklayabilirsiniz.</p>
        </div>

        <div class="faq-box col-lg-4 col-md-4 col-sm-1">
          <h3>Başvuru durumunu nasıl öğrenirim?</h3>
          <p style="font-size:15px;">Aday giriş kısmından başvuru yaptığınız mail adresi ve şifreniz ile giriş yapıp sonucunuzu öğrenebilrisiniz.</p>
        </div>

        <div class="faq-box col-lg-4 col-md-4 col-sm-1">
          <h3>Sorunları nasıl bildirebilirim?</h3>
          <p style="font-size:15px;">Sayfanın en altında bulunan kısımdan "Bize Ulaşın" sayfasına gidebilirsiniz.</p>
        </div>
      </div>
    </div>
  </div>
</div></br></br></br>
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

  <div class="bg3">
    <nav class="container2">
      <div class="container-fluid">
        <div class="row justify-content-end">
          <div class="col-auto">
            <div class="title3 d-flex align-items-center justify-content-center">
              <h1 style="color:#fff">ÇALIŞMA PRENSİPLERİ</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row cards-items">
          <div class=" flip-card col-md-3 col-6 mb-3">
              <div class="flip-card-inner">
                <div class="flip-card-front1">
                  <i style="margin-top:60px;" class="fa-solid fa-ruler-combined fa-2xl"></i>
                  <h2>Analiz</h2>
                </div>
                <div class="flip-card-back1"></br>
                  <h3>Lorem, ipsum same as same developer
                  </h3>
                </div>
              </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
              <div class="flip-card-inner">
                <div class="flip-card-front2">
                  <i style="margin-top:60px;" class="fa-solid fa-paint-roller fa-2xl"></i>
                  <h2>Planlama</h2>
                </div>
                <div class="flip-card-back2"></br>
                  <h3>Lorem, ipsum same as same developer
                  </h3>
                </div>
              </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
              <div class="flip-card-inner">
                <div class="flip-card-front3">
                  <i style="margin-top:60px;" class="fa-solid fa-pen-nib fa-2xl"></i>
                  <h2>Dizayn</h2>
                </div>
                <div class="flip-card-back3"></br>
                  <h3>Lorem, ipsum same as same developer
                  </h3>
                </div>
              </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
              <div class="flip-card-inner">
                <div class="flip-card-front4">
                  <i style="margin-top:60px;" class="fa-solid fa-hammer fa-2xl"></i>
                  <h2>Test</h2>
                </div>
                <div class="flip-card-back5"></br>
                  <h3>Lorem, ipsum same as same developer
                  </h3>
                </div>
              </div>
          </div>
          <div class="flip-card col-md-3 col-6 mb-3">
              <div class="flip-card-inner">
                <div class="flip-card-front5">
                  <i style="margin-top:60px;" class="fa-solid fa-network-wired fa-2xl"></i>
                  <h2>Uygulama</h2>
                </div>
                <div class="flip-card-back4"></br>
                  <h3>Lorem, ipsum same as same developer
                  </h3>
                </div>
              </div>
          </div>
        </div>
    </nav>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
        <h4 align="center" class="modal-title" style="font-family: 'Bruno Ace SC', cursive; "><span style="color:#3168d8">DEVELOPER</span></h4>
      </div>

      <div class="modal-body-1">
        <p>
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <img src="image/me.jpg" class="img-responsive img-rounded" alt="Tarık Süreyya Kum">
            </div>
            <div class="col-xs-12 col-sm-8">
              <a style="color:#202020; font-family: 'Bruno Ace SC', cursive;; font-size:18px; text-decoration:none" title="Developer">Tarık Süreyya Kum</a>
              <h4 style="color:#202020; font-family: 'Bruno Ace SC', cursive;; font-size:16px" class="title1" title="Telefon Numarası">+90 (553) 909 38 00</h4>
              <h4 style="font-family: 'Moonhouse';" title="Gmail">tariksureyyakum@gmail.com</h4>
              <p title="Lisans">Dokuz Eylül Üniversitesi - Yönetim Bilişim Sistemleri
              </p>
              <table>
  <tr>
    <td><a style="font-family: 'Bruno Ace SC', cursive;" href="https://github.com/tariksureyyakum" title="Linkedin">Linkedin</a></td>
    <td style="padding-left: 50px;"><a style="font-family: 'Bruno Ace SC', cursive;" href="https://www.linkedin.com/in/tariksureyyakum/" title="GitHub">GitHub</a></td>
    <td style="padding-left: 50px;"><a style="font-family: 'Bruno Ace SC', cursive;" href="https://www.instagram.com/tarik.kum/" title="Instagram">Instagram</a></td>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
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
