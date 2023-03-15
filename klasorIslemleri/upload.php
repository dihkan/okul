<?php
    require_once "db.php";

    if($_POST)
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $path = "";
    
        if($_FILES['resim']['error'] == 0){

            $klasorAdi = "upload";
            
            if(!is_dir($_SERVER['DOCUMENT_ROOT']."/okul/klasorIslemleri/".$klasorAdi)){
                mkdir($_SERVER['DOCUMENT_ROOT']."/okul/klasorIslemleri/".$klasorAdi , 0777 , true); 
            }
                $dosyaAdi = uniqid();
                $dizi1 = explode("." , $_FILES['resim']['name']);
                $maxFileLimit = 1024 * 1024  * 15;
            if($_FILES['resim']['size'] > $maxFileLimit){
                    echo "Dosya boyutunuz çok fazla.. Max 5MB dosya yükleyebilirsiniz";
            }else{ 
                    $uzanti = $dizi1[count($dizi1) - 1];
                $izinliUzantilar = [
                    "image/png" , 
                    "image/jpeg", 
                    "image/gif"
                ];
                $type = ($_FILES['resim']['type']);
                
                if(in_array($type, $izinliUzantilar)) {
                    $path = $dosyaAdi.".".$uzanti;
                    move_uploaded_file($_FILES['resim']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/okul/klasorIslemleri/".$klasorAdi."/".$path);
                }else{ 
                    echo "Error - Dosya tipi uygun değil";
                }
            
            }
        }
        
        $baglanti->query("INSERT INTO `users` (`username`,`email`,`country` , `photo`  ) VALUES ('$username','$email','$country' , '$path')") or die("Error");
    }

    header("Refresh:2;url=users.php");

?> 
