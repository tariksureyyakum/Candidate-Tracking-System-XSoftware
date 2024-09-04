<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>X SOFTWARE</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">XS ADMIN PANELI</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hoşgeldin,</span> <a href="#" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;ÇIKIŞ YAP</button></a></span>';
}?>

</div></div>
<!-- admin start-->
<div class="bg4">
<!--navigation menu-->
<nav class="navbar navbar-default title2 navbar-text">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Menü</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Sınavlar<span class="sr-only"></span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">Adaylar</a></li>
		    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Aday Sonuçları</a></li>
        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Görüş/Öneri/Şikayet</a></li>
        <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="dash.php?q=4">Sınav Oluştur</a></li>
        
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container1"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date ASC") or die('Error');
echo  '<div class="panel3"><table class="table table-striped title2">
<tr style="color:GREY"><td><b>Sınavlar</b></td><td><b>Sınav İsimleri</b></td><td><b>Soru Sayısı</b></td><td><b>Puan</b></td><td><b>Sınav Süresi</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn btn-danger" style="margin:0px; border-radius:0%;"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span>&nbsp;<span class="title1"><b>Sil</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div>';

}

//ranking start
if(@$_GET['q']== 2) {
    $q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
    echo  '<div class="panel3 title">
    <table class="table table-striped title2">
    <tr style="color:green">
      <td><b>Sıralama</b></td>
      <td><b>Aday İsimleri</b></td>
      <td><b>Puan</b></td>
      <td><b>Mail Gönder</b></td>
    </tr>';
    $c=0;
    while($row=mysqli_fetch_array($q) ) {
        $e=$row['email'];
        $s=$row['score'];

        $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) ) {
          
            $name=$row['name'];
            $gender=$row['gender'];
            $college=$row['college'];
        }
        $c++;
        echo '<tr><td style="color:black"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$s.'</td>
        <td>
          <form action="send.php" method="POST">
            <input type="hidden" name="email" value="'.$e.'">
            <button type="submit"><b><span class="glyphicon glyphicon-send" style="color:green;" aria-hidden="true"></span></b></button>
          </form>
        </td>
        </tr>';
    }
    echo '</table></div>';
}

?>



<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel3"><table class="table table-striped title2">
<tr style="color:#0066CC"><td><b>Adaylar</b></td><td><b>Aday İsimleri</b></td><td><b>Cinsiyet</b></td><td><b>Departman</b></td><td><b>Email</b></td><td><b>Telefon No</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Adayı Sil" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" style="color:red;" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel3"><table class="table table-striped title2">
<tr style="color:red"><td><b>Sıralama</b></td><td><b>Konu</b></td><td><b>Email</b></td><td><b>Tarih</b></td><td><b>Saat</b></td><td><b>Kimden</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Şikayeti Oku" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Şikayeti Oku" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Şikayeyi Sil" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" style="color:red;" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {

$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel3"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>Tarih</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Saat</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Kimden</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row   panel5 ">
<span class="title1" style="margin-left:43%;font-size:30px;"><b>Sınav Oluştur</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group ">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Sınav Adı" class="form-control input-md giris-input" type="text" >
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Toplam Soru Sayısı" class="form-control input-md giris-input" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Doğru Cevabın Puanı" class="form-control input-md giris-input" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Yanlış Cevabın Puanı" class="form-control input-md giris-input" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Ortalama Sınav Süresi" class="form-control input-md giris-input" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Anahtar Kelime" class="form-control input-md giris-input" type="text">
    
  </div>
</div>



<div class="form-group   panel4">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12 "> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Sınav Oluştur" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add exam end-->

<!--add exam step2 start-->
<?php
if(@$_GET['q']==4 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:38%;font-size:30px;"><b>Soruları ve Cevapları Giriniz</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Soru&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control giris-input" placeholder="'.$i.'. soruyu buraya yazınız"></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="A Seçeneği" class="form-control input-md giris-input" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="B Seçeneği" class="form-control input-md giris-input" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="C Seçeneği" class="form-control input-md giris-input" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="D Seçeneği" class="form-control input-md giris-input" type="text">
    
  </div>
</div>
<br />
<b>Doğru Cevap</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Doğru Seçenek " class="form-control input-md giris-input" >
   <option value="a">Doğru Seçeneği İşaretleyiniz '.$i.'</option>
  <option value="a">A Seçeneği</option>
  <option value="b">B Seçeneği</option>
  <option value="c">C Seçeneği</option>
  <option value="d">D Seçeneği</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Sınav Oluştur" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add exam step 2 end-->

<!--remove exam-->



</div><!--container closed-->
</div></div>
</body>
</html>
