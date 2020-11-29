<?php
    require_once("connect.php");
    
    if(isset($_POST['register'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
        $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

        $sql = "INSERT INTO pelanggan (email, password, username, nama, alamat, no_telp) 
            VALUES (:email, :password, :username, :nama, :alamat, :no_telp)";
        $stmt = $db->prepare($sql);

        // bind parameter ke query
        $params = array(
            ":email" => $email,
            ":password" => $password,
            ":username" => $username,
            ":nama" => $nama,
            ":alamat" => $alamat,
            ":no_telp" => $no_telp  
        );
         // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);
        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if($saved) header("Location: login.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <h3><a href="index.php">Homepage</a></h3>

    <form action="" method="POST">
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" name="email" placeholder="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="username">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="nama">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="alamat">
    </div>
    <div class="form-group">
        <label for="no_telp">No.Telp</label>
        <input type="text" class="form-control" name="no_telp" placeholder="08xxxx">
    </div>
    <button type="submit" class="btn btn-primary" name="register">Register</button>
    </form>

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