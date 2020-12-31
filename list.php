<?php require_once("auth.php"); 
      include 'connect.php';
      // session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel = "stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Scooter-ku</title>
  </head>
  <body>
  <div class="atas-table">
            <h1>Scooter-Ku</h1>
  </div>
  <div class ="tabel">
  <table class="table-hover">
    <thead>
      <tr>
        <th scope="col">Scooter</th>
        <th scope="col">Tanggal Penyewaan</th>
        <th scope="col">Lama Penyewaan</th>
        <th scope="col">Total Biaya</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $id_pelanggan = $_SESSION["user"]["id_pelanggan"];
      $ambil = $db ->query("SELECT * FROM penyewaan WHERE id_pelanggan = '$id_pelanggan' ");
          while($perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)){?>
      <tr>
        <td>Scooter<?php echo $perproduk['id_scooter']?></td>
        <td><?php echo $perproduk['tanggal_penyewaan']?></td>
        <td><?php echo $perproduk['waktu']?></td>
        <td><?php echo $perproduk['total_harga']?></td>
        <td>
        <a class="btn-delete" href="delete.php?id=<?php echo $perproduk['id_scooter']; ?>" role="button">Kembalikan</a>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
<a href ="beranda.php" class= "btn-beranda">Kembali ke beranda</a>

 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
  </html>