<?php
  require "headermk.php";
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>


<body>
  <div class="container mt-4">
    <h2>Ви Благодариме За <?php echo $product; ?></h2>
    <hr>
    <p>Вашиот трансакциски код е  <?php echo $tid; ?></p>
    <p>Вашата донација помогна на многу миленичина во засолништата</p>
    <p><a href="donatemk.php" class="btn btn-outline-dark mt-2">Врати се назад</a></p>
  </div>

<?php
  require "footermk.php";
  ?>
