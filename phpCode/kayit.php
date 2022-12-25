<?php

    if(count($_GET) == 2 && isset($_GET['isim']) && isset($_GET['gonder'])):
        $aaa = htmlspecialchars($_GET['isim']);

    print_r($aaa);
    endif;

    

?>

<div style="text-align:center">

<?php

$degisken= "2021-2022 Super Lig Sampiyonu Trabzonspordur";


$dizi = explode(" " , $degisken);

echo substr($dizi[4] , 0 , 11);

echo substr($degisken, 30 , 11);



?>

</div>