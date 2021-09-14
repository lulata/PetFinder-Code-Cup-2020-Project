<?php
require "header.php"
?>

<?php
 if (isset($_SESSION['userid'])) {
   echo '<div class="container">
       <div class="row">
         <div class="col-md-6 col-sm-6">
           <div class="showcase-left">
             <img src="img/cat.png">
           </div>
         </div>
         <div class="col-md-6 col-sm-6">
           <div class="showcase-right">
             <h1>Find A Pet</h1>
             <p class="lead" >Hello and Welcome</p>
               <p>
                 Find A Pet is a website that lets you search your area using your ZIP Code and offers all of the pets that are in
                 the shelters at our database so you can go and try to find the best one for you.Every pet deserves to be happy.
               </p>
           </div>
           <br>
           <div class="btn-group" role="group" aria-label="Basic example">
           <a href="index.php" class="btn btn-outline-dark btn-lg  mb-3">Search For The Pets <i class="fab fa-searchengin"></i></a>
           <a href="contact.php" class="btn btn-outline-dark btn-lg mb-3">Contact Us <i class="far fa-paper-plane"> </i></a>
           </div>
           <br>
             <div class="btn-group" role="group" aria-label="Basic example">
           <a href="donate.php" class="btn btn-outline-dark btn-lg">Donate <i class="fas fa-donate"></i> </a>
           <a href="pics.html" class="btn btn-outline-dark btn-lg">Upload A Picture Of Your Pet  <i class="fas fa-upload"></i></a>
           </div>
             <a href="slideshow.html"  class="btn btn-outline-dark mt-4 btn-lg">Slideshow <i class="fas fa-chalkboard-teacher"></i></a>
         </div>
       </div>
     </div>';
   }
     else {
       header("location: index.php");
     }
?>
<?php
require "footer.php"
?>
