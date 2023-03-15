<?php
session_start();
if(!$_POST){
    $sayi = mt_rand(1,99);
    $_SESSION['sayi'] = $sayi;
}else{
 
    if($_SESSION['sayi'] < $_POST['tahmin'])
    {
        echo "Sayıyı küçültün";
    }else if($_SESSION['sayi'] > $_POST['tahmin'])
    {
        echo "Sayıyı büyütün";
    }else{
        echo "Tebrikler";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="tahmin">
        <input type="submit" value="Gönder">

    </form>
</body>
</html>


