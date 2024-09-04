<?php
include_once 'dbConnection.php';
date_default_timezone_set('Europe/Istanbul');
$ref=@$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$id=uniqid();
$date=date("Y-m-d");
$time = date("H:i:s");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time')")or die ("Error");
header("location:$ref?q=Görüş/Öneri/Şikayetiniz için teşekkür ederiz.");
?>