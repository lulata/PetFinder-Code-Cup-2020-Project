<?php
require "headermk.php";

  require_once('includes/dbh.inc.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');

  // Instantiate Customer
  $customer = new Customer();

  // Get Customer
  $customers = $customer->getCustomers();
?>

<body>
  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="customersmk.php" class="btn btn-outline-dark btn-lg  mb-3">Муштерии</a>
      <a href="transactionsmk.php" class="btn btn-outline-dark btn-lg  mb-3">Трансакции</a>
    </div>
    <hr>
    <h2>Муштерии</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Муштериски код</th>
          <th>Име</th>
          <th>Емаил</th>
          <th>Датум</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($customers as $c): ?>
          <tr>
            <td><?php echo $c->id; ?></td>
            <td><?php echo $c->first_name; ?> <?php echo $c->last_name; ?></td>
            <td><?php echo $c->email; ?></td>
            <td><?php echo $c->created_at; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <p><a href="donatemk.php" class="btn btn-outline-dark mr-2 ">Врати се назад на страницата за донации</a></p>
  </div>
</body>

<?php
require "footermk.php";
?>
