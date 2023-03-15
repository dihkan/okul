<?php
    require_once "db.php";
    if(isset($_POST['changeImage']) && $_FILES['resim']['error'] ==0){
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
                    move_uploaded_file($_FILES['resim']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/okul/klasorIslemleri/upload/".$path);
                }else{ 
                    echo "Error - Dosya tipi uygun değil";
                }
            
            }

            $userId = $_POST['userId'];
            $resimAdi = $path;
            
            $baglanti->query("UPDATE users SET photo = '".$resimAdi."' WHERE userId ='".$userId."'");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <table class="table table-condensed">
<?php

$sql = "SELECT * FROM users";

$uyeler = $baglanti->query($sql)->fetch_all(MYSQLI_ASSOC);

foreach ($uyeler as $key) {  ?>
        <tr>
            <td width="200">
                <img src="upload/<?= $key['photo'] ?>" width="120" alt=""> <br> <br>
                <form action="users.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="userId" value="<?= $key['userId']?>">
                    <input type="file" name="resim" class="form-control"> <br>
                    <input type="submit" value="Change" name="changeImage" class="btn btn-primary btn-sm form-control">
                </form>
            </td>
            <td><?= $key['username'] ?></td>
            <td><?= $key['country'] ?></td>
            <td><?= $key['email'] ?></td>
            <td> 
                <form action="sil.php" method="post">
                    <input type="hidden" name="userId" value="<?= $key['userId']?>">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm form-control" name="delete">
                </form>
            </td>
        </tr>
<?php }  ?>
</table>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>

