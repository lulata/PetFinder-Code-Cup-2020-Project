<?php
  require "header.php";
 ?>
<link rel="stylesheet" href="css/gallery.css">

<div class="container">

</div>
 <section class=".gallery-links">
   <div class="container">
     <h2 class="text-center">Upload Your Pet</h2>
     <?php
     if (isset($_GET['upload'])) {
       if ($_GET['upload'] == "empty") {
         echo "<p class='alert alert-danger text-center'>FIll in all Fields!</p>";
       }elseif ($_GET['upload'] == "big") {
         echo "<p class='alert alert-danger text-center'>Your File is to large to be uploaded!</p>";
       }elseif ($_GET['upload'] == "error") {
         echo "<p class='alert alert-danger text-center'>An Error happend try again!</p>";
       }elseif ($_GET['upload'] == "notsupported") {
         echo "<p class='alert alert-danger text-center'>Sorry we don't support this file</p>";
       }elseif ($_GET['upload'] == "success" ) {
         echo "<p class='alert alert-success text-center'>Upload Success!</p>";
       }elseif ($_GET['upload'] == "failed") {
         echo "<p class='alert alert-danger text-center'>Delete error try again!</p>";
       }elseif ($_GET['upload'] == "successdel" ) {
         echo "<p class='alert alert-success text-center'>Delete Success!</p>";
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
           echo '<a href="#" >
             <div class="gallery-img"   style="background-image:url(gallery/'.$row['imgFullNameGallery'].');"></div>
             <h3>'.$row["titleGallery"].'</h3>
             <p>'.$row["descGallery"].'</p>

             <form action="includes/delete.inc.php" method="POST" >
              <input type="hidden"  name="name" value="'.$row['imgFullNameGallery'].'">
              <input type="hidden"  name="id" value="'.$row['idGallery'].'">

             <button class="btn btn-outline-danger btn-small mt-2 "  type="submit" name="submit"> Delete</button>
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
       <form action="includes/galleryupload.inc.php" method="post" enctype="multipart/form-data">
            <input class="form-control mb-2" type="text" name="filename" placeholder="File Name">
           <input class="form-control mb-2" type="text" name="filetitle" placeholder="Image Title">
           <input class="form-control mb-2" type="text" name="filedesc" placeholder="File Description">
           <small class="form-text text-muted">We only support jpg, jpeg, png, pdf at this moment.</small>
           <input class="form-control-file mb-2" type="file" name="file" >
           <button class="btn btn-outline-dark my-2 my-sm-0 btn-block mb-3 " type="submit" name="submit">Upload</button>
         </form>
         <div class="mt-3">

       </div>
       </div>
     </div>';
     }

   ?>

   </div>
 </section>
 <script src="javascript/gallery.js"></script>

 <?php
   require "footer.php";
  ?>
