<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container"> <br>
            <div class="row">
                <h2>Üye Kayıt Formu</h2>
                <div class="col-md-4">
                    <form action="upload.php"  method="post" enctype="multipart/form-data">
                        <input type="text" name="username" class="form-control" id="" placeholder="Enter Username"><br>
                        <input type="text" name="country" class="form-control" id="" placeholder="Enter Country"><br>
                        <input type="text" name="email" class="form-control" id="" placeholder="Enter email"><br>
                        <input type="file" name="resim" class="form-control" id="">
                        <br>
                        <input type="submit" value="Kaydet" class="form-control btn btn-warning btn-sm">
                    </form>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>