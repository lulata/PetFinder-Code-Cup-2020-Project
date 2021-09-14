<?php
  require "headermk.php";
 ?>
<div class="container">

</div>
 <section class=".gallery-links">
   <div class="container">
     <h2 class="text-center">Објавете Милениче</h2>
     <?php
     if (isset($_GET['upload'])) {
       if ($_GET['upload'] == "empty") {
         echo "<p class='alert alert-danger text-center'>Потполни ги сите полиња!</p>";
       }elseif ($_GET['upload'] == "big") {
         echo "<p class='alert alert-danger text-center'>Вашиот документ е поголем од дозволенето!</p>";
       }elseif ($_GET['upload'] == "error") {
         echo "<p class='alert alert-danger text-center'>Нешто тргна наопаку обидете се уште еднаш!</p>";
       }elseif ($_GET['upload'] == "notsupported") {
         echo "<p class='alert alert-danger text-center'>Не го подржуваме тој тип на документ.</p>";
       }elseif ($_GET['upload'] == "success" ) {
         echo "<p class='alert alert-success text-center'>Упсешно го објавивте документот!</p>";
       }elseif ($_GET['upload'] == "failed") {
         echo "<p class='alert alert-danger text-center'>Настана грешка при бришењето ве молиме обидете се повторно!</p>";
       }elseif ($_GET['upload'] == "successdel" ) {
         echo "<p class='alert alert-success text-center'>Успешно бришење!</p>";
       }
     }
      ?>
     <div class="gallery-container">
       <?php
       include_once 'includes/dbh.inc.php';

       $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "SQL statement failed";
       } else {
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);

         while ($row = mysqli_fetch_assoc($result)) {
           echo '<a href="#">
             <div style="background-image:url(gallery/'.$row['imgFullNameGallery'].');"></div>
             <h3>'.$row["titleGallery"].'</h3>
             <p>'.$row["descGallery"].'</p>

             <form action="includes/deletemk.inc.php" method="POST" >
             <input type="hidden"  name="name" value="'.$row['imgFullNameGallery'].'">
             <input type="hidden"  name="id" value="'.$row['idGallery'].'">
             <button class="btn btn-outline-danger btn-small mt-2 "  type="submit" name="submit"> Бриши</button>
             </form>
           </a>';
         }
       }


       ?>
     </div>



     <div class=" mb-5 pt-5">


     <?php
     if (isset($_SESSION['userid'])) {
       echo '<div class="gallery-upload">
       <form action="includes/galleryuploadmk.inc.php" method="post" enctype="multipart/form-data">
            <input class="form-control mb-2" type="text" name="filename" placeholder="Име на документ">
           <input class="form-control mb-2" type="text" name="filetitle" placeholder="Наслов на документот">
           <input class="form-control mb-2" type="text" name="filedesc" placeholder="Опис на документот">
           <small class="form-text text-muted">Моментално подржуваме jpg, jpeg, png, pdf.</small>
           <input class="form-control-file mb-2" type="file" name="file" >
           <button class="btn btn-outline-dark my-2 my-sm-0 btn-block mb-3 " type="submit" name="submit">Објави</button>
         </form>
         <div class="mt-3">

       </div>
       </div>
     </div>';
     }

   ?>

   </div>
 </section>

 <?php
   require "footermk.php";
  ?>
