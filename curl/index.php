<?php

if (extension_loaded("curl")) {
    echo "Curl kurulu.";
} else {
    echo "Curl kurulu değil.";
}


    
    $ch = curl_init();
        
    curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/photos');
    curl_setopt( $ch , CURLOPT_USERAGENT, "Mozilla/5.0 (Linux Centos 7;) Chrome/74.0.3729.169 Safari/537.36");
    curl_setopt( $ch , CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch , CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt( $ch , CURLOPT_SSL_VERIFYHOST, false);

    $sonuc = curl_exec($ch);
    

    curl_close($ch);
   
    echo $sonuc;
 
    ?>