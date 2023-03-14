
<?php
require_once "../includes/header.php";
require_once "../includes/functions.php";
require_once "../config/config.php";
if (isset($_SESSION['username'])) {
  header("location: http://localhost/clean_post/index.php");
}
?>   
<?php
if(isset($_POST['submit'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $pwd = $_POST['password'];

  if(emptyInputSignup($name, $email, $pwd) !== false) {
    echo "fill all the inputs";
    exit();
  } 
  if (uiDExists($conn, $name, $email) !== false) {
    header("Location: http://localhost/clean_post/auth/register.php?error=usernametaken");
    exit(); 
  }
  CreateUser($conn, $name, $email, $pwd);
}
?>
            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require_once "../includes/footer.php" ?>
      