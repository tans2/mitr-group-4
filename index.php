<?php include('./assets/inc/header.php'); ?>


<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
  <div class="card-body">
  	<form id="login" method="POST" action="loginAuth.php">
      <label for="uname"><b>Username</b></label><br>
      <input type="text" placeholder="Enter RIN" name="rin" required><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" required><br>
      <br>
      <button type="submit" name="submit">Login</button>
      <button type="reset" name="reset">Reset</button>
    </form>
  </div>
</div>


<?php include('./assets/inc/footer.php'); ?>
