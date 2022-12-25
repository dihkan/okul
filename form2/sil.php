
<?php
 require_once "db.php";

 if(isset($_POST['sil'])):
    $sil = "DELETE FROM students WHERE studentId= ".$_POST['studentId']." ";
    $conn->query($sil);
 endif;


echo "Öğrenci Başarıyla Silinmiştir";
 
    
 header("Refresh: 5; url=index.php");

    

?>