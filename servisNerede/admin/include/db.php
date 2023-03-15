<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "servisNerede";
// Create connection

try {
    $conn = new PDO('mysql:host=localhost;dbname='.$dbname.'' , $username , $password);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>