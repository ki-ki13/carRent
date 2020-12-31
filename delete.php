<?php require_once("auth.php"); 
      include 'connect.php';
      // session_start();

      
      $id = $_GET['id'];
      $sql3 = "DELETE FROM penyewaan WHERE id_scooter = '$id'";
      $stmt3 = $db->prepare($sql3);
      $delete = $stmt3->execute();

      if($delete){
            $status = "avalaible";
            $sql4 = "UPDATE scooter SET status = '$status' WHERE id_scooter = '$id'";
            $stmt4 = $db->prepare($sql4);
            $cstatus = $stmt4->execute();

            header("location:list.php"); 
}
?>


