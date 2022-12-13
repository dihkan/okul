<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../../db.php";



    if(isset($_POST['sehirKayit'])):



        $sql = "INSERT INTO iller  (sehirAdi , ulkeId) VALUES ('".$_POST['sehirAdi']."' , '".$_POST['ulkeId']."')";

 
        $aaa = $conn->query($sql);


    endif;


    $sec = "SELECT * FROM iller where ulkeId =".$_POST['ulkeId'];

    $sehirler = $conn->query($sec)->fetch_all(MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width:80%;
            margin:0 auto;
            background-color:#ae4545;
            display:flex;
        }
        .form1{
            width:30%;
            background-color:#1212ae;
            
        }
        #form1 input{
            padding:10px;
            margin:10px
        }
        .ulkeler ul li{
            background-color: aqua;
            display:flex;
            justify-content: space-between;
            margin-bottom:4px
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form1">

            <form action="sehirEkle.php" method="post" id="form1">
                <input type="text" name="sehirAdi" placeholder="Şehir Adını Yazın" required> <br>
                <input type="hidden" name="ulkeId" value="<?= $_POST['ulkeId'] ?>">

                <input type="submit" value="Kaydet" name="sehirKayit">
            </form>
        </div>
        <div class="ulkeler">
        <ul>

<?php foreach ($sehirler as $sehir) { ?>
    
    <li> <?= $sehir['sehirAdi'] ?> 
    
</li>
    
    <?php } ?>
    
    
 
</ul>
        </div>
    </div>
</body>
</html>