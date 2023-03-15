<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div style="text-align: center;">

    <?php 

$degisken = "Meslek";
for ($i=0; $i <strlen($degisken) ; $i++) { 
  
  echo substr($degisken , 0 , strlen($degisken)-$i)."<br>";
  
}


?>
  </div>
</body>

</html>