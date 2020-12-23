<?php
    session_start();
    //dapat id scooter
    $id_scooter = $_GET['id'];
    
    //jika sudah disewa
    if(isset($_SESSION['simpan'][$id_scooter])){
        $_SESSION['simpan'][$id_scooter] = 1;
    }
    //jika belum dianggap menyewa 1 scooter
    // else{
    //     $_SESSION['simpan'][$id_scooter] = 1;
    // }
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    echo "<script>location='book.php';</script>";
?>