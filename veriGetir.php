<?php

    require_once "db.php";



    $sec = "SELECT * FROM students WHERE studentId=".$_POST['studentId'];


    $veri = $conn->query($sec)->fetch_array(MYSQLI_ASSOC);


    echo json_encode($veri);

    ?>