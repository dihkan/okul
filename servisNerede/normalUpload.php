<?php 

// header("Access-Control-Allow-Methods:POST");
// $json = file_get_contents('php://input');
// error_reporting(E_ALL);
// ini_set("display_errors", 1);


// $sonuc = json_decode($json);


// include "include/db.php";

// if($sonuc->base64 != ''):

//   if($sonuc->la != '' && $sonuc->lo != '' && $sonuc->mac != ''):
//     $dosyaAdi = time().substr($sonuc->mac,3,3).".jpg";
//     $yol = "../upload/".$dosyaAdi;
//     file_put_contents($yol,base64_decode($sonuc->base64));
//     $an = date("Y-m-d H:i:s" , time());
//     $query = "UPDATE servisler SET la = '".$sonuc->la."' , lo = '".$sonuc->lo."' , foto ='".$yol."' , tarih = '".$an."' WHERE macAdres = '".$sonuc->mac."'";
//     $conn->query($query);
  
//   endif;

// endif;


if($_POST['foto']):
          $gecerliDosyaUzanti = [
            'image/jpeg',
            'image/png'
          ];
          if(in_array($_FILES['foto']['type'] , $gecerliDosyaUzanti)):
            $gecerliBoyut = 1024*1024*5;
            if($_FILES['foto']['size'] >= $gecerliBoyut):
                $yukle = move_uploaded_file($_FILES['foto']['tmp_name'] , '../upload/'.$_FILES['foto']['name']);
                if($yukle)
                {
                 $yol = $_FILES['foto']['name'];
                }else{
                  $yol = "";
                }

            endif;
          endif;
        endif;
        return $yol;
?>
?>