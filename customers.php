<?php
require "header.php";

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
      <a href="customers.php" class="btn btn-outline-dark btn-lg  mb-3">Customers</a>
      <a href="transactions.php" class="btn btn-outline-dark btn-lg  mb-3">Transactions</a>
    </div>
    <hr>
    <h2>Customers</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Customer ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
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
    <p><a href="donate.php" class="btn btn-outline-dark mr-2 ">Donate Page</a></p>
  </div>
</body>

<?php
require "footer.php";
?>
