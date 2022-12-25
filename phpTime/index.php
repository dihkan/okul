<?php

   //echo date("Y-m-d",time()-(60 * 60 * 24* 365));
    //echo strtotime("2006-04-19");
    //echo date("l",strtotime("2007-02-07"));

    $bugun = time();
    $dt = strtotime("2007-02-07");

    $fark = $bugun - $dt;

    echo ceil($fark / (60*60*24*30*12));

  
?>