<?php
require_once "../includes/header.php";
require_once "../includes/functions.php";
require_once "../config/config.php";



if (isset($_SESSION['user_id'])) {
    if (isset($_GET['update_user_id'])) {
        $url_user_id = $_SESSION['update_user_id'];
        $current_user_id =  $_SESSION['user_id'];

        $query = "SELECT * FROM users WHERE id = '$current_user_id'";
        $result = $conn->query($query);
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        foreach ($rows as $row) {
            $username = $row->username;
            $user_email = $row->email;
        }
    } else {
        header("location: http://localhost/clean_post/");
    }
}
?>
<form method="POST" action="update_profile.func.php">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" value="<?php echo  $user_email ?>" />

    </div>

    <div class="form-outline mb-4">
        <input type="" name="username" id="form2Example1" class="form-control" value="<?php echo  $username ?>" />

    </div>
    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

</form>

<?php require_once "../includes/footer.php" ?>