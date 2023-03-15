<?php 
session_start();
header('Content-Type: image/jpeg');
$kod = substr(md5(uniqid()) , 0 , 6);
$_SESSION['kod'] = $kod;
$resim = imagecreate(90,35);
$arkaPlan = imagecolorallocate($resim , 61 , 1,1);
$beyaz = imagecolorallocate($resim , 222 , 220,220);

imagestring($resim , 10,10,10,$kod , $beyaz);
imagejpeg($resim , NULL , 100);

imagedestroy($resim);
?>