<div class="col-4  p-4 ">
  <div class="card shadow border border-4 border-success">
    <div class="card-header bg-success fs-5 ">
      Servisci Kaydet
    </div>
    <div class="card-body">

      <form action="index.php" method="post">
        <div class="form-group shadow-sm">
          <label for="exampleInputisim">İsim Soyisim</label>
          <input type="text" class="form-control" id="isim" placeholder="İsim Soyisim Girişi" name="isim">
          <!-- <small id="emailHelp" class="form-text text-muted"> Servis yetkilisinin adı ve soyadını giriniz</small> -->
        </div>
        <br>
        <div class="form-group shadow-sm">
          <label for="exampleInputplaka">Araç Plakası</label>
          <input type="text" class="form-control" id="plaka" name="plaka" placeholder="Araç Plaka Girişi">
        </div>
        <br>
        <div class="form-group shadow-sm">
          <label for="exampleInputcihaz">Android Cihaz Mac Adresi</label>
          <input type="text" class="form-control" id="macAdres" name="macAdres" placeholder="Cihaz Mac Adres">
        </div> <br>
        <input type="submit" value="Kayıt Et" class="btn btn-success btn-md" name="servisKayit">
      </form>


    </div>
  </div>
</div>