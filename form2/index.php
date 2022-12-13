<?php
require_once "db.php";

if (isset($_POST['sil'])) :
    $sil = "DELETE FROM students WHERE studentId= " . $_POST['studentId'] . " ";
    $conn->query($sil);
endif;

$sql = "SELECT * FROM ulke";

$ulkeler = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);





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
                        <input type="hidden" name="studentId" id="studentId" disabled>
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
                        <select name="ulkeId" id="ulkeId" class="form-control">
                            <option value="">Ülke Seçiniz</option>
                            <?php foreach ($ulkeler as $u) { ?>
                                <option value="<?= $u['ulkeId'] ?>"><?= $u['ulkeAdi'] ?></option>
                            <?php } ?>

                        </select>
                        <br>
                        <select name="sehirId" id="sehirId" class="form-control d-none"></select>

                        <br>
                        <input type="text" name="dTarihi" id="dTarihi" placeholder="Doğum Tarihini Seçin" class="form-control"> <br>
                        <input type="submit" name="kayit" value="Gönder" class="btn btn-danger">
                        <div id="guncelleButon"></div>
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
                                <th>Ülke</th>
                                <th>Şehir</th>
                                <th>Güncelle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>

                        <?php
                        $sec = "SELECT s.* , u.country , i.sehirAdi FROM students s 
                        LEFT JOIN ulke u on u.ulkeId = s.ulkeId
                        LEFT JOIN iller i on i.sehirId = s.sehirId ";

                        $ogrenciler = $conn->query($sec)->fetch_all();


                        foreach ($ogrenciler as $o) : ?>

                            <tr>

                                <td><?= $o[1]; ?></td>
                                <td><?= $o[2]; ?></td>
                                <td><?= $o[3]; ?></td>
                                <td><?= $o[4]; ?></td>
                                <td><?= $o[5]; ?></td>
                                <td><?= $o[6]; ?></td>
                                <td><?= $o[9]; ?></td>
                                <td><?= $o[10]; ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm" id="guncelle<?= $o[0] ?>" onclick="guncelle(<?= $o[0] ?>)">Güncelle</button>
                                </td>
                                <td>
                                    <form action="sil.php" method="post">
                                        <input type="hidden" name="studentId" value="<?= $o[0] ?>">
                                        <input type="submit" value="Sil" class="btn btn-danger btn-sm" name="sil">
                                    </form>

                                </td>

                            </tr>


                        <?php endforeach; ?>

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
        function guncelle(id) {
            $.ajax({
                type: "POST",
                url: 'veriGetir.php',
                data: {
                    "studentId": id
                },
                dataType: "JSON",
                success: function(response) {


                    $("#isim").val(response.studentName);
                    $("#soyisim").val(response.studentSurname);
                    $("#numara").val(response.studentNumber);
                    $("#telefon").val(response.phone);
                    $("#sinif").val(response.classroom);
                    $("#dTarihi").val(response.birthday);

                }
            });
            $("#studentId").val(id);
            $("#studentId").prop("disabled", false);
            $("#guncelleButon").html("<input type='submit' name='guncelle' value='Güncelle' class='btn btn-info'>");
        }


        $("#ulkeId").on("change", function() {
            var ulkeId = $("#ulkeId").val();
            $.ajax({
                type: "POST",
                url: 'veriGetir.php',
                data: {
                    "ulkeId": ulkeId
                },
                dataType: "JSON",
                success: function(response) {

                    $("#sehirId").removeClass("d-none");
                    $("#sehirId").empty();
                    $("#sehirId").append("<option value''> Şehir Seçiniz </option>");
                    $.each(response, function(i, val) {
                        $("#sehirId").append("<option value=" + val.sehirId + ">  " + val.sehirAdi + " </option>")
                    })

                }
            });

        })
    </script>

</body>

</html>