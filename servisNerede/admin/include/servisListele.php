  <?php 
  
      $sorgu = $conn->prepare('SELECT * FROM servisler s 
      ORDER BY tarih DESC');
    
      $sorgu->execute();
      $servis = $sorgu->fetchAll(PDO::FETCH_ASSOC);


  ?>
  <div class="col-8 p-1 shadow">

    <table class="table table-bordered table-stripped">
      <thead>
        <tr>
          <th>id</th>
          <th>İsim Soyisim</th>
          <th>Araç Plakası</th>
          <th>MAC Adresi</th>
          <th>Son Enlem</th>
          <th>Son Boylam</th>
          <th>Son Resim</th>
          <th>Son Veri Tarihi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($servis as $s): ?>
        <tr>
          <td><?= $s['servisId'] ?></td>
          <td><?= $s['isim'] ?></td>
          <td><?= $s['plaka'] ?></td>
          <td><?= $s['macAdres'] ?></td>
          <td><?= $s['la'] ?></td>
          <td><?= $s['lo'] ?></td>
          <td><?= $s['foto'] ?></td>
          <td><?= $s['tarih'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>