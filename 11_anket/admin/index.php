<?php
  
$baglan = new mysqli("localhost" , "root" , "" , "okul");
if($_POST)
{
    if($_POST['soru'] != '' && $_POST['cevap1'] !='' && $_POST['cevap2'] !='')
    {
       $sorgu = "INSERT INTO anket (soru , cevap1 , cevap2,tarih) VALUES ('".$_POST['soru']."', '".$_POST['cevap1']."' , '".$_POST['cevap2']."', '".date("Y-m-d H:i:s" , time())."')"; 
       $baglan->query($sorgu);
    }
}
$sorgu1 = "SELECT * FROM anket";
$anketler = $baglan->query($sorgu1)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css' integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==' crossorigin='anonymous'/>

</head>
<body>
    <div class="container">
        <div class="anket">
            <h1>Anket Soru ve Cevaplarını Girin</h1>
            <form action="#" method="post">
                <input type="text" name="soru" class="form-control" required placeholder="Anket Sorunuz?" id="">
                <br>
                <input type="text" name="cevap1" class="form-control" required id="" placeholder="Birinci Cevap">
                <br>
                <input type="text" name="cevap2" class="form-control" required id="" placeholder="İkinci Cevap">
                <br>
                <input type="submit" value="Kaydet" class="btn btn-danger">
            </form>
        </div>
        <div class="anketler">
            <div class="genel row">
                <?php foreach($anketler as $a): ?>
                    
                    <div class="col-md-3"><?= $a['soru'] ?></div>
                    <div class="col-md-3"><?= $a['cevap1'] ?></div>
                    <div class="col-md-3"><?= $a['cevap2'] ?></div>

                    
                    <?php endforeach; ?>
                </div>
        </div>
    </div>

</body>
</html>