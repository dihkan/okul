<?php

    require_once "db.php";


    if(isset($_POST['studentId']))
    {
        $sec = "SELECT * FROM students WHERE studentId=".$_POST['studentId'];
        $veri = $conn->query($sec)->fetch_array(MYSQLI_ASSOC);   
        echo json_encode($veri);
    }else if(isset($_POST['ulkeId'])){
        $sec = "SELECT * FROM iller WHERE ulkeId=".$_POST['ulkeId'];
        $veri = $conn->query($sec)->fetch_all(MYSQLI_ASSOC);   
        echo json_encode($veri);
    }
   
        
    ?>