<?php

if (isset($_POST['submit'])) {
  include 'dbh.inc.php';

  $id= $_POST['id'];
  $imageName = $_POST['name'];

  $file = "../gallery/".$imageName;


  if (!unlink($file)) {
    header('Location: ../upload.php?upload=failed');
  } else {
    $sql = "DELETE FROM gallery WHERE idGallery = $id";
    mysqli_query($conn,$sql);
    header('Location: ../upload.php?upload=successdel');
  }

}

 ?>
