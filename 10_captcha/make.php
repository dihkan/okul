<?php 
session_start();  // oturum başlat - 
header('Content-Type: image/jpeg'); // uzantı php gözükse bile bu sayfanın content i  JPEG ayarladık
$kod = substr(md5(uniqid()) , 0 , 6); // uniqid => 2365465536764
$_SESSION['kod'] = $kod;
$resim = imagecreate(90,35);
$arkaPlan = imagecolorallocate($resim , 219 , 45,45);
$beyaz = imagecolorallocate($resim , 255 , 255,255);

imagestring($resim , 6,10,10,$kod , $beyaz);
imagejpeg($resim ,NULL , 100);

imagedestroy($resim);
?>