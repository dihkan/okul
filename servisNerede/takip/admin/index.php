<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

 include "include/db.php";


  if($_POST):

    if(isset($_POST['servisKayit'])):
      
      $isim = htmlspecialchars(trim($_POST['isim']));
      $plaka = htmlspecialchars(trim($_POST['plaka']));
      $macAdres = htmlspecialchars(trim($_POST['macAdres']));
      if($macAdres != '' && $isim != '' && $plaka != ''):
        $kayit = "INSERT INTO servisler (isim , plaka , macAdres) VALUES ('".$isim."','".$plaka."','".$macAdres."') ";
        $kayit1 = $conn->query($kayit);
      endif;
   
    endif;
  endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style.css">

  <title>Servisim Nerede ?</title>
</head>

<body>
  <?php require_once "include/navbar.php" ?>
  <div class="container">
    <div class="row align-items-start mt-3">
      <?php require "include/servisKayit.php" ?>
      <?php require "include/servisListele.php" ?>

    </div>

  </div>
  </div>


  <script src="assets/jquery/jquery.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>