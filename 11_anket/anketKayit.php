<?php
 $baglan = new mysqli("localhost" , "root" , "" , "okul");
if($_SESSION['oy'] != 1)
{

    if(isset($_POST['oylandi']))
    {
        if($_POST['cevap'] == 1)
        {
            $oylama = "UPDATE anket SET oy1 = oy1 + 1 WHERE id= ". $_POST['id'];
        }else if($_POST['cevap'] == 2)
        {
            $oylama = "UPDATE anket SET oy2 = oy2 + 1 WHERE id= ". $_POST['id'];
        }
        $baglan->query($oylama);
        $_SESSION['oy']=1;
    }
}else{
   echo "Sİz zaten oy kullandınız"; 
}

 ?>