<?php
  require "header.php";
  include "includes/contactform.inc.php";
 ?>

    <div class="container">
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
		      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
	      	<textarea name="message" class="form-control" ><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
	      </div>
	      <br>
        <div class="mb-5">
          <button type="submit" name="submit" class="btn btn-outline-dark my-2 my-sm-0 mr-3 btn-block">Send </button>
          </form>
        </div>

    </div>
    <?php
      require "footer.php";

     ?>
