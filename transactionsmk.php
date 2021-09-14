<?php
require "headermk.php";
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
      <a href="customersmk.php" class="btn btn-outline-dark btn-lg  mb-3">Муштерии</a>
      <a href="transactionsmk.php" class="btn btn-outline-dark btn-lg  mb-3">Трансакции</a>
    </div>
    <hr>
    <h2>Трансакции</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Трансакциски код</th>
          <th>Муштериски код</th>
          <th>Сума</th>
          <th>Датум</th>
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
    <p><a href="donatemk.php" class="btn btn-outline-dark mr-2 ">Врати се назад на страницата за донации</a></p>
  </div>
</body>
</html>
<?php
require "footermk.php";
?>
