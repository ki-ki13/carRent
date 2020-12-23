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
    <link rel="stylesheet" href="css/style.css">

    <title>Booking</title>
  </head>
  <body>
 
    <div class = container-fluid>
      <h3>Detail Sewa</h3>
      <div class = container>
        <div class="row">
        <?php 
        foreach($_SESSION['simpan'] as $id_scooter => $jumlah){ 
          $ambil = $db ->query("SELECT * FROM scooter WHERE id_scooter=$id_scooter");
          $perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)?>
          <div class ="col-sm-4">
            <img class="img-fluid rounded" style ="weight=300px;" src="poto/<?php echo $perproduk ['foto'];?>">
            <h4 class="float-left"><?php echo $perproduk['nama_scooter']?></h4>
            <h5 class="float-left">Rp. <?php echo $perproduk['harga']?></h5>
          </div>
          
              
          <div class = "col-sm-6">
            <form method="POST">
            <div class="form-group">
                <label for="waktu">Lama Penyewaan</label>
                <input type="number" min="0" max="4" class="form-control" name="waktu" placeholder="lama_penyewaan">
            </div>
            <div class="form-group">
                <label for="tanggal_penyewaan">Tanggal Penyewaan</label>
                <input type="date" class="form-control" name="tanggal_penyewaan" placeholder="Tanggal Penyewaan">
            </div>
            <button type="submit" class="btn btn-primary" name="okay">Continue</button>
            </form>
          </div>
            <?php
            if(isset($_POST['okay'])){
              $waktu = $_POST['waktu'];
              $tanggal_penyewaan = $_POST['tanggal_penyewaan'];
              $_SESSION['time']=$waktu;
              $_SESSION['date']=$tanggal_penyewaan;  

            }
                    echo "<pre>";
                    print_r($_SESSION);
                    echo "</pre>";
            //     echo "<script>location='list.php';</script>";
              } ?>
           
        </div>
      </div>
    </div>



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