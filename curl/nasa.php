<?php
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=100&api_key=4zG9rughsnEYspbQz9c12YarzDBzBv9raoFIrhfT',
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => 0
    ));
    $resp = curl_exec($ch);
    curl_close($ch);
    //echo $resp;

    $data = json_decode($resp, true);

    foreach ($data['photos'] as $key) {
        echo "<img src=".$key['img_src']." width='200'/>";
        
    }