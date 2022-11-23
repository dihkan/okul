
<?php
 require_once "db.php";

 if(isset($_POST['sil'])):
    $sil = "DELETE FROM students WHERE studentId= ".$_POST['studentId']." ";
    $conn->query($sil);
 endif;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Uygulaması</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
</head>
<body>
    <div class="container">

        <div class="form-panel mt-3 p-10">

         
                <div class="row">
                    <div class="col-md-4">
                       <form action="kayit.php" method="post">
                        <h1>Üye Formu</h1>
                        <input type="text" name="isim" id="isim" class="form-control" placeholder="İsim Giriniz"> <br>
                        
                        <input type="text" name="soyisim" id="soyisim" class="form-control" placeholder="Soyisim Giriniz"> <br>
                        <input type="text" name="numara" id="numara" class="form-control" placeholder="Okul numarası giriniz"> <br> <br>
                        <input type="text" name="telefon" id="telefon" class="form-control" placeholder="Telefon numaranızı girin"> <br> <br>
                        <select name="sinif" id="sinif" class="form-control">
                            <option value="">Sınıf Seçiniz</option>
                            <option value="9-Bilişim">9-Bilişim</option>
                            <option value="10-Bilişim">10-Bilişim</option>
                            <option value="11-Bilişim">11-Bilişim</option>
                            <option value="12-Bilişim">12-Bilişim</option>
                        </select> <br> <br>
                        <input type="text" name="dTarihi" id="dTarihi" class="form-control"> <br>
                        <input type="submit" value="Gönder" class="btn btn-danger">
                        </form>
                    </div>


                    <div class="col-md-8">
                            <h1>Üye Listesi</h1>
                            <table border=1 width="100%">
                                <thead>
                                    <tr>
                                        <th>İsim</th>
                                        <th>Soyİsim</th>
                                        <th>Numara</th>
                                        <th>Telefon</th>
                                        <th>Sınıfı</th>
                                        <th>Doğum Tarihi</th>
                                        <th>Güncelle</th>
                                        <th>Sil</th>
                                    </tr>
                                </thead>

                        <?php
                            $sec = "SELECT * FROM students";
                            
                            $ogrenciler = $conn->query($sec)->fetch_all();


                            foreach($ogrenciler as $o): ?>

                                <tr>
                          
                                    <td><?= $o[1]; ?></td>
                                    <td><?= $o[2]; ?></td>
                                    <td><?= $o[3]; ?></td>
                                    <td><?= $o[4]; ?></td>
                                    <td><?= $o[5]; ?></td>
                                    <td><?= $o[6]; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="guncelle<?= $o[0] ?>" onclick="guncelle(<?= $o[0] ?>)">Güncelle</button>
                                    </td>
                                    <td>
                                        <form action="sil.php" method="post">
                                            <input type="hidden" name="studentId" value="<?= $o[0] ?>" >
                                            <input type="submit" value="Sil" class="btn btn-danger btn-sm" name="sil">
                                        </form>

                                    </td>

                                </tr>


                        <?php  endforeach; ?>

                         </table>

                    </div>
        </div>

</div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
    <script>
        $('#dTarihi').datepicker({
            format: "yyyy-mm-dd"
        });

        $("#deneme").html("Merhaba");
    </script>

    <script>
       function guncelle(id)
       {
        $.ajax({
            type: "POST",
            url: 'veriGetir.php',
            data: {
                "studentId" : id
            },
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                
                $("#isim").val(jsonData.studentName);
                $("#soyisim").val(jsonData.studentSurname);
                $("#numara").val(jsonData.studentNumber);
                $("#telefon").val(jsonData.phone);
                $("#sinif").val(jsonData.classroom);
                $("#dTarihi").val(jsonData.birthday);
              
           }
       });
       }
    </script>

</body>
</html>