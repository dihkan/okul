<?php
if ($_POST) {
    $conn = new mysqli("localhost", "root", "", "uyeler");
    $uyeAdi = $_POST['uyeAdi'];
    $sifre = $_POST['sifre'];

    $sql = "insert into uyeler (uyeAdi , sifre) VALUES ('" . $uyeAdi . "' , '" . $sifre . "')";

    $conn->query($sql);
} else {
    echo "Veri yok";
}
