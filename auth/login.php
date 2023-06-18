<?php
require_once "../includes/header.php";
require_once "../includes/functions.php";
require_once "../config/config.php";

if (isset($_SESSION['username'])) {
  header("location: http://localhost/clean_post/index.php");
}
?>
<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if (emptyInputLogin($email, $pwd) !== false) {
    header("Location: http://localhost/clean_post/auth/login.php?error=emptyinput");
    exit();
  }

  $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
  $row = $login->fetch_assoc();
  echo mysqli_num_rows($login);

  if (mysqli_num_rows($login)) {
    if (password_verify($pwd, $row['mypassword'])) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['user_id'] = $row['id'];
      header("Location: http://localhost/clean_post/index.php?success=loginsuccess");
    } else {
      header("Location: http://localhost/clean_post/auth/login.php?error=wrongpassword");
    }
  } else {
    header("Location: http://localhost/clean_post/auth/login.php?error=usernotfound");
  }
}
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'wrongpassword') {
?>
    <p class="alert alert-danger"><?php echo "Wrong Password"; ?></p>
  <?php
  } elseif ($_GET['error'] == 'usernotfound') {
  ?>
    <p class="alert alert-danger"> <?php echo "User Not Found "; ?></p>
  <?php
  } elseif ($_GET['error'] == 'emptyinput') {
  ?>
    <p class="alert alert-danger"> <?php echo "Fill out all the inputs "; ?></p>
<?php
  }
}
?>
<form method="POST" action="login.php" autocomplete="off">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" autocomplete="off" />
  </div>


  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" autocomplete="off" />

  </div>



  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>a new member? Create an acount<a href="register.php"> Register</a></p>



  </div>
</form>

<?php require_once "../includes/footer.php" ?>