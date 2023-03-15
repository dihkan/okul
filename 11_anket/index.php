<?php
    session_start();
    $baglan = new mysqli("localhost" , "root" , "" , "okul");
    if(!isset($_SESSION['oy']))
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
    }
    $sorgu1 = "SELECT * FROM anket where durum = 1 order by tarih DESC limit 1";
    $anket = $baglan->query($sorgu1)->fetch_array(MYSQLI_ASSOC);
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
            <div class="banner">
                <h1>Anket Sitesi</h1>
            </div>

            <div class="content row">
                <div class="col-md-3">
                    <?php if(isset($_SESSION['oy'])): ?>
                        <div class="soru">
                        <?= $anket['soru']; ?> <br><br>
                            <?= $anket['cevap1'] ?> :
                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: <?= ($anket['oy1'] / ($anket['oy1'] + $anket['oy2']) * 100) ?>%"></div>
                            </div>
                            <?= $anket['cevap2'] ?> :  <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" style="width: <?= ($anket['oy2'] / ($anket['oy1'] + $anket['oy2']) * 100) ?>"></div>
                            </div>
                        </div>

                        <?php else: ?>
                    <div class="soru">
                        <?= $anket['soru']; ?> <br><br>
                        <form action="#" method="post">
                            <input type="hidden" name="id" value="<?= $anket['id'] ?>">
                            <input type="radio" name="cevap" value="1"> <?= $anket['cevap1']  ?>
                            <input type="radio" name="cevap" value="2"> <?= $anket['cevap2']  ?>
                            <br> <br>
                            <input type="submit" value="Gönder" name="oylandi" class="btn btn-primary">
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="mainContent col-md-9"></div>
            </div>
        </div>
    </body>
</html>