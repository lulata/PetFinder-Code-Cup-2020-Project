<?php
require "header.php";
  require_once('includes/dbh.inc.php');
  require_once('lib/pdo_db.php');
  require_once('models/Transaction.php');

  // Instantiate Transaction
  $transaction = new Transaction();

  // Get Transaction
  $transactions = $transaction->getTransactions();
?>


  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="customers.php" class="btn btn-outline-dark btn-lg  mb-3">Customer</a>
      <a href="transactions.php" class="btn btn-outline-dark btn-lg  mb-3">Transactions</a>
    </div>
    <hr>
    <h2>Transactions</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Transaction ID</th>
          <th>Customer</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($transactions as $t): ?>
          <tr>
            <td><?php echo $t->id; ?></td>
            <td><?php echo $t->customer_id; ?></td>
            <td><?php echo sprintf('%.2f', $t->amount / 100); ?> <?php echo strtoupper($t->currency); ?></td>
            <td><?php echo $t->created_at; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <p><a href="donate.php" class="btn btn-outline-dark mr-2 ">Donate Page</a></p>
  </div>
</body>
</html>
<?php
require "footer.php";
?>
