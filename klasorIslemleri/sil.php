<?php
    if($_POST['delete']){
        require_once "db.php";
        $userId = $_POST['userId'];
        
        $sec = $b->query("SELECT * FROM users WHERE userId='$userId'")->fetch_array(MYSQLI_ASSOC);

        $silinecekDosya = $sec['photo'];
        
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/okul/klasorIslemleri/upload/' . $silinecekDosya)){
            unlink($_SERVER['DOCUMENT_ROOT'].'/okul/klasorIslemleri/upload/'. $silinecekDosya);
        }
        $sql = "DELETE from users where userId = '$userId'";
        $b->query($sql);
        echo '<div class="msg-info">User deleted successfully.</div>';


    }
    header("Refresh:2;url=users.php");

?>