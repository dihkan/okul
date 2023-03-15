<?php 
  session_start();
  $kod = $_SESSION['kod'];

if(isset($_POST['code'])){

    if($kod == $_POST['code'])
    {
        echo "Captcha Başarılı";






    }else{
        echo "Başarısız";





        
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
    <input type="text" name="code"> <br><br>
    <img src="make.php" alt=""> <br><br>
    <input type="submit" value="Gönder">
  </form>
</body>

</html>