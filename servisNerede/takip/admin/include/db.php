<?php
$servername = "localhost";
$username = "dihkan";
$password = "Meric1Ahmet2";
$dbname = "idos_takip";
// Create connection

try {
    $conn = new PDO('mysql:host=localhost;dbname='.$dbname.'' , $username , $password);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>