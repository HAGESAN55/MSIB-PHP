<?php 
  require_once "lingkaran.php";
  require_once "persegiPanjang.php";
  require_once "segitiga.php";

  $bd1 = new Lingkaran(7);
  $bd2 = new persegiPanjang(10, 5);
  $bd3 = new Segitiga(5, 10);
  $bd4 = new Lingkaran(10);
  $bd5 = new persegiPanjang(6, 17);
  $bd6 = new Segitiga(25, 50);
  $bd7 = new Lingkaran(14);

  $bidang = [$bd1, $bd2, $bd3, $bd4, $bd5, $bd6, $bd7];

  $nav = array('No', 'Nama Bidang', 'Keterangan', 'Luas', 'Keliling');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 5 - PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <?php 
            foreach($nav as $n) {
          ?>
          <th><?= $n ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php 
          $no = 1;
          foreach($bidang as $data)
          {
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data->namaBidang() ?></td>
          <td><?= $data->Keterangan() ?></td>
          <td><?= $data->bidangLuas() ?></td>
          <td><?= $data->bidangKeliling() ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
</body>
</html>