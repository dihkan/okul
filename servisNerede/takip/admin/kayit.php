<?php 

header("Access-Control-Allow-Methods:POST");
$json = file_get_contents('php://input');

  if($_POST):

    resimYukle();
    if($_POST['lo']):
        extract($_POST);
       $yol = resimYukle();
      // $yol = "deneme";


        if($yol != ''):
        include "include/db.php";
        $an = date("Y-m-d H:i:s" , time());
        $query = "UPDATE servisler SET la = '".$la."' , lo = '".$lo."' , foto ='".$yol."' , tarih = '".$an."' WHERE macAdres = '".$mac."'";
        $conn->query($query);
          echo  "Başarılı";
        else:
          echo "Resim Dosyası gelmedi";
        endif;
    else:
        echo "Gelen Koordinat Bilgisi yok";

    endif;
    else:
      echo  "OLMADI";
 endif;





 function resimYukle()
 {
  include "include/db.php";
   if($_POST['foto']):

      $yol = time().substr($_POST['mac'],3,3).".jpg";


      $sorgu = $conn->prepare('SELECT foto FROM servisler where macAdres= ?');
    
      $sorgu->execute($_POST['mac']);
      $sonFoto = $sorgu->fetch(PDO::FETCH_ASSOC);
      var_dump($sonFoto);
       //unlink($SERVER['DOCUMENT_ROOT'].'takip/upload/'.$sonFoto['foto'].'');
      

      // file_put_contents("../upload/".$yol,base64_decode($_POST['foto']));
      return $yol;

   else:

    echo "post edilmiş foto yok";
    
   endif;
 }
?>