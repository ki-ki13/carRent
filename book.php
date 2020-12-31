<?php require_once("auth.php"); 
      include 'connect.php';
      //session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link rel = "stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Scooter Details</title>
  </head>
  <body>
  <div class="kembali-beranda">
            <a href="beranda.php">Kembali ke Beranda</a> 
        </div>
        <div class="details-page">
        <?php
          $id_scooter = $_GET['id'];
          $ambil = $db ->query("SELECT * FROM scooter WHERE id_scooter= $id_scooter");
          $perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)?>
            <div class="kiri-detail">
                <img src="poto/<?php echo $perproduk ['foto'];?>">
                <div class="ket-details">
                    <p><?php echo $perproduk['nama_scooter']?></p>
                    <p>Rp. <?php echo $perproduk['harga']?></p>
                </div>
            </div>
            <div class="kanan-detail">
                <h3>Details</h3>
                <form action="" method="POST">
                    <div class="form">
                        <input type="number" min="0" max="4" class="form-waktu" name="lama_penyewaan" placeholder="lama penyewaan">
                    </div>
                    <div class="form">
                        <input type="date" class="form-tgl" name="tanggal_penyewaan" placeholder="tanggal penyewaan">
                    </div>
                    <div class="konfirm-harga">
                        <button type="submit" class="btn-confirm" name="confirm">Konfirmasi</button>
                        <!-- php-script -->
                        <?php
                          if(isset($_POST['confirm'])){
                              $id_pelanggan = $_SESSION["user"]["id_pelanggan"];
                              $status = "rent";
                              $tgl = $_POST['tanggal_penyewaan'];
                              $waktu = $_POST['lama_penyewaan'];
                              $harga = $perproduk['harga'];
                              $total_harga = $harga * $waktu;?>
                        <p>Rp. <?php echo $total_harga?></p>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn-sewa" name="okay">Sewa</button>
                    <!-- php-script -->
                    <?php 
                      if(isset($_POST['okay'])){
                        $mysqlDate = date("Y-m-d",strtotime($tgl));
                        $sql = "INSERT INTO penyewaan (id_pelanggan,tanggal_penyewaan,waktu,id_scooter,total_harga) 
                        VALUES ('$id_pelanggan', '$tgl' , '$waktu' , '$id_scooter' , '$total_harga')";
                        $stmt = $db->prepare($sql);
                        $saved = $stmt->execute();
                       
                        if($saved) { 
                          //echo "succes";
                          echo "<script>location='list.php';</script>";
                          $sql2 = "UPDATE scooter SET status = '$status' WHERE id_scooter = '$id_scooter'";
                          $stmt2 = $db->prepare($sql2);
                          $saved2 = $stmt2->execute();
                        }
                      }
                          ?>
                </form>
            </div>
        </div>
  <!-- <div class="main">
  <h1>Scooter Details</h1>
  <div class="container">
    <div class="row">
    <--?php
        $id_scooter = $_GET['id'];
        $ambil = $db ->query("SELECT * FROM scooter WHERE id_scooter= $id_scooter");
        $perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)?>
      <div class="col-sm-6">
      <img class="img-fluid rounded" style ="weight=300px;" src="poto/<--?php echo $perproduk ['foto'];?>">
      <h4 class="float-left"><--?php echo $perproduk['nama_scooter']?></h4>
      <h5 class="float-left">Rp. <--?php echo $perproduk['harga']?></h5>
      </div>
      <div class="col-sm-6">
        <form method="POST">
            <div class="form-group">
                <label for="lama_penyewaan">Lama Penyewaan</label>
                <input type="number" min="0" max="4" class="form-control" name="lama_penyewaan" placeholder="lama penyewaan">
            </div>
            <div class="form-group">
                <label for="tanggal_penyewaan">Tanggal Penyewaan</label>
                <input type="date" class="form-control" name="tanggal_penyewaan" placeholder="tanggal penyewaan">
            </div>
            <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
            <button type="submit" class="btn btn-primary" name="okay">Sewa</button>
        </form>
        <a href ="beranda.php" class= "btn btn-primary">Kembali ke beranda</a>

        <--?php
            if(isset($_POST['confirm'])){
                $id_pelanggan = $_SESSION["user"]["id_pelanggan"];
                $status = "rent";
                $tgl = $_POST['tanggal_penyewaan'];
                $waktu = $_POST['lama_penyewaan'];
                $harga = $perproduk['harga'];
                $total_harga = $harga * $waktu;?> 
                <p>Total Harga = Rp. <--?php echo $total_harga?></p>
            <--?php }

            if(isset($_POST['okay'])){
              $mysqlDate = date("Y-m-d",strtotime($tgl));
              $sql = "INSERT INTO penyewaan (id_pelanggan,tanggal_penyewaan,waktu,id_scooter,total_harga) 
              VALUES ('$id_pelanggan', '$tgl' , '$waktu' , '$id_scooter' , '$total_harga')";
              $stmt = $db->prepare($sql);
              $saved = $stmt->execute();


              if($saved) { 
                //echo "succes";
                echo "<script>location='list.php';</script>";
                $sql2 = "UPDATE scooter SET status = '$status' WHERE id_scooter = '$id_scooter'";
                $stmt2 = $db->prepare($sql2);
                $saved2 = $stmt2->execute();
              }
            }
                ?>
      </div>
  </div>
  </div> -->



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