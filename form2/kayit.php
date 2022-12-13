<?php

require_once "db.php";

if (isset($_POST['kayit'])) {


    $name       = htmlspecialchars(trim($_POST['isim']));
    $surname    = htmlspecialchars(trim($_POST['soyisim']));
    $number     = htmlspecialchars(trim($_POST['numara']));
    $tel        = htmlspecialchars(trim($_POST['telefon']));
    $sinif      = $_POST['sinif'];
    $ulkeId      = $_POST['ulkeId'];
    $sehirId      = $_POST['sehirId'];
    $dTarihi    = htmlspecialchars(trim($_POST['dTarihi']));


    $varMi = "SELECT * FROM students WHERE studentNumber=" . $number;

    $son = $conn->query($varMi)->fetch_all();

    if ($son == null) :

        $sql = "INSERT INTO students (studentName, studentSurname, studentNumber,phone,classroom,birthday,ulkeId , sehirId)
     VALUES ('" . $name . "','" . $surname . "','" . $number . "','" . $tel . "','" . $sinif . "','" . $dTarihi . "', '" . $ulkeId . "' , '" . $sehirId . "')";

        if ($conn->query($sql) === TRUE) :
            echo "Yeni kayıt işlemi başarıyla tamamlandı";
        else :
            echo "Error: " . $sql . "<br>" . $conn->error;
        endif;
    else :
        echo "Bu kayıt zaten var ... yada öğrenci numarasını yanlış girdiniz";
    endif;
} elseif (isset($_POST['guncelle'])) {
    $id = $_POST['studentId'];
    $name       = htmlspecialchars(trim($_POST['isim']));
    $surname    = htmlspecialchars(trim($_POST['soyisim']));
    $number     = htmlspecialchars(trim($_POST['numara']));
    $tel        = htmlspecialchars(trim($_POST['telefon']));
    $sinif      = $_POST['sinif'];
    $ulkeId      = $_POST['ulkeId'];
    $sehirId      = $_POST['sehirId'];
    $dTarihi    = htmlspecialchars(trim($_POST['dTarihi']));


    $sql = "UPDATE students SET 
    studentName = '" . $name . "' , 
    studentSurname = '" . $surname . "' , 
    studentNumber = '" . $number . "',
    phone = '" . $tel . "',
    classroom = '" . $sinif . "',
    birthday = '" . $dTarihi . "',
    ulkeId =' " . $ulkeId . "',
    sehirId = '" . $sehirId . "'
    WHERE studentId = '" . $id . "'";


    if ($conn->query($sql) === TRUE) :
        echo "Güncelle işlemi başarıyla tamamlandı";
    else :
        echo "Error: " . $sql . "<br>" . $conn->error;
    endif;
}


header("Refresh: 3; url=index.php");
