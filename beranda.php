<?php require_once("auth.php"); 
      include 'connect.php';?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
    <link rel = "stylesheet" href="css/beranda1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>ScooterRent</title>
  </head>
  <body>
      <div class="atas-beranda">
            <div class="sambutan">
                <p>Welcome, <?php echo $_SESSION["user"]["nama"]?></p>
                <h1>Pilih scooter favoritmu!</h1>
            </div>
            <div class="logout">
                <a class="logout-button" href="logout.php">Logout</a>
            </div>
      </div>
      <div class="beranda-page">
            <div class="scooter-sewa">
                <a href="list.php"> Scooter-ku </a>
            </div>
            <div class="row">
            <?php 
              $ambil = $db ->query("SELECT * FROM scooter WHERE status = 'avalaible' ");
              while($perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)){?>
                <div class="product">
                    <a href="book.php?id=<?php echo $perproduk['id_scooter'];?>">
                        <img class="product-img" src="poto/<?php echo $perproduk['foto'];?>">
                        <div class="keterangan">
                            <p><?php echo $perproduk['nama_scooter'];?></p>
                            <p>Rp. <?php echo number_format($perproduk['harga']);?></p>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    <!-- <div class ="container-fluid px-5 mt-5">
    <a href ="list.php" class= "btn btn-primary">Scooter Sewa</a>
    <div class ="row">
      <--?php 
        // $ambil = $db ->query("SELECT * FROM scooter WHERE status = 'avalaible' ");
        // while($perproduk = $ambil -> fetch(PDO::FETCH_ASSOC)){?>
          <div class ="col-sm-3">
            <div class = "thumbnail">
              <img src ="poto/<--?php echo $perproduk['foto'];?>" class="img-fluid" >
              <div class ="caption">
                <h3><--?php echo $perproduk['nama_scooter'];?></h3>
                <h5>Rp. <--?php echo number_format($perproduk['harga']);?></h5>
                  <a href ="book.php?id=<--?php echo $perproduk['id_scooter'];?>" class ="btn btn-primary float-right">sewa</a>
              </div>
            </div>
          </div>
        <--?php }?>
      
    </div>
  </div> -->
  <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS-->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
        
  </body>
</html>