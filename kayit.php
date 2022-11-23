<?php

    require_once "db.php";

    echo $_POST['isim'];

    $name       = htmlspecialchars(trim($_POST['isim']));
    $surname    = htmlspecialchars(trim($_POST['soyisim']));
    $number     = htmlspecialchars(trim($_POST['numara']));
    $tel        = htmlspecialchars(trim($_POST['telefon']));
    $sinif      = $_POST['sinif'];
    $dTarihi    = htmlspecialchars(trim($_POST['dTarihi']));


    $varMi = "SELECT * FROM students WHERE studentNumber=".$number;

    $son = $conn->query($varMi)->fetch_all();

   if($son == null):

        $sql = "INSERT INTO students (studentName, studentSurname, studentNumber,phone,classroom,birthday) VALUES ('".$name."','".$surname."','".$number."','".$tel."','".$sinif."','".$dTarihi."')";

            if ($conn->query($sql) === TRUE) :
            echo "Yeni kayıt işlemi başarıyla tamamlandı";
            else:
            echo "Error: " . $sql . "<br>" . $conn->error;
            endif;
    else:
        echo "Bu kayıt zaten var ... yada öğrenci numarasını yanlış girdiniz";
    endif;

    
    header("Refresh: 5; url=index.php");

    



?>
