<?php
require "headermk.php"
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
             <h1>Пронајдете Милениче</h1>
             <p class="lead" >Добредојдовте</p>
               <p>
                  Пронајдете Милениче е страница која ви овозможува да препарате за милиничина во определените општинини и ви ги нуди
                  сите милиничина кои се во засолниште во таа општина која ја одбравте кои ги имаме во нашата база.Секое милиниче заслужува да биде
                  среќно.
               </p>
           </div>
           <br>
           <div class="btn-group" role="group" aria-label="Basic example">
           <a href="indexmk.php" class="btn btn-outline-dark btn-lg  mb-3">Побарајте Милениче <i class="fab fa-searchengin"></i></a>
           <a href="contactmk.php" class="btn btn-outline-dark btn-lg mb-3">Контактирајте не <i class="far fa-paper-plane"> </i></a>
           </div>
           <br>
             <div class="btn-group" role="group" aria-label="Basic example">
           <a href="donatemk.php" class="btn btn-outline-dark btn-lg">Донирајте <i class="fas fa-donate"></i> </a>
           <a href="uploadmk.php" class="btn btn-outline-dark btn-lg">Прикачете слика од вашето милениче <i class="fas fa-upload"></i></a>
           </div>
           <a href="slideshowmk.html"  class="btn btn-outline-dark mt-4 btn-lg">Презентација <i class="fas fa-chalkboard-teacher"></i></a>
         </div>
       </div>
     </div>';
   }
     else {
       header("location: indexmk.php");
     }
?>
<?php
require "footermk.php"
?>
