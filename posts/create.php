<?php
require_once "../includes/header.php";
require_once "../config/config.php";

if (isset($_POST['submit'])) {
  if($_POST['title'] == '' || $_POST['subtitle'] == '' || $_POST['body'] == '' ) {
    echo "Fille all the  inputs fields";
  } else {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $image = $_FILES['image']['name'];
    $dir = 'images/' . basename($image);

    $insert = "INSERT INTO posts (title, subtitle, body, image, user_id, username) VALUES (?, ?, ?, ?, ?, ?);";
    $stm = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stm, $insert)) {
        header("Location: http://localhost/clean_post/post/create.php?error=usernametaken");
        exit();
    }
    mysqli_stmt_bind_param($stm, "ssssss", $title, $subtitle, $body, $image, $user_id, $username);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("location: http://localhost/clean_post/index.php");
    }
    mysqli_stmt_execute($stm);
    mysqli_stmt_close($stm);
    header("Location: http://localhost/clean_post/auth/login.php?error=none");
    exit();
  }
}
?>

<form method="POST" action="create.php" enctype="multipart/form-data">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" />
    </div>

    <div class="form-outline mb-4">
        <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"></textarea>
    </div>


    <div class="form-outline mb-4">
        <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
    </div>


    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


</form>



<?php
require_once "../includes/footer.php";
?>