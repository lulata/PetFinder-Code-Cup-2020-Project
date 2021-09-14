<?php
  session_start();

  if (isset($_SESSION['userid'])) {
       echo '<!DOCTYPE html>
       <html lang="en" dir="ltr">
         <head>
           <meta charset="utf-8">
             <link rel="stylesheet" href="css/style.css">
              <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
              <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
               <link rel="shortcut icon" type="image/png" href="img/cat.png">
               <script src="https://kit.fontawesome.com/98decdfc42.js" crossorigin="anonymous"></script>
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

           <title>Find A Pet</title>
         </head>
         <body>
           <header>


             <nav class="navbar navbar-light bg-light fixed-top  navbar-expand-sm  ">
               <div class="container">
                 <a class="navbar-brand" href="index.php">
                   <img src="img/cat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                   Find A Pet
                 </a>
                 <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarCollapse">
<ul class="navbar-nav mr-auto">
                  <li class="nav-item  ">
                    <a class="nav-link active  font-weight-bold" href="index.php">Home </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="donate.php">Donate </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="upload.php">Upload A Pet  </a>
                    </li>
                  </ul>
                 </div>
                 <form class="form-inline ">
                    <a href="slideshow.html"  class="btn btn-outline-dark mr-2 ">Slideshow <i class="fas fa-chalkboard-teacher"></i></a>
                   <a href="indexmk.php"  class="btn btn-outline-dark mr-2 ">Macedonian Version <i class="far fa-flag"></i></a>


                 </form>
                 <form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="post">
                   <button class="btn btn-outline-dark my-2 my-sm-0 mr-3" type="submit" name="logout-submit">Log Out <i class="fas fa-sign-out-alt"></i></button>
                 </form>
               </div>
             </nav>
             <!-- Header with brand -->
             <header class="text-center  mt-5 mb-4 p-3">
               <a href="index.php"><img src="img/logous.png" border="0" id="logo" alt="Petfinder Logo, Adopt a homeless pet" /></a>
             </header>
             </nav>
           </header>
           ';
     }else {
       echo '  <!DOCTYPE html>
       <html lang="en" dir="ltr">
         <head>
           <meta charset="utf-8">
             <link rel="stylesheet" href="css/style.css">
              <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
              <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
               <link rel="shortcut icon" type="image/png" href="img/cat.png">

           <title>Find A Pet</title>
         </head>
         <body>
           <header>
             <nav class="navbar navbar-light bg-light fixed-top">
               <div class="container">
                 <a class="navbar-brand" href="index.php">
                   <img src="img/cat.png" width="30" height="30" class="d-inline-block align-top" alt="">
                   Find A Pet
                 </a>
                 <form class="form-inline">

                   <a href="indexmk.php"  class="btn btn-outline-dark ">Macedonian Version </i></a>
                 </form>
               </div>
             </nav>
             <!-- Header with brand -->
             <header class="text-center mb-4  p-3">
               <a href="index.php"><img src="img/logous.png" border="0" id="logo" alt="Petfinder Logo, Adopt a homeless pet" /></a>
             </header>
             </nav>
           </header>';
     }
?>
