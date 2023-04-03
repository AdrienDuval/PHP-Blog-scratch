<?php
require_once "../includes/header.php";
require_once "../config/config.php";

if (isset($_POST['submit'])) {


    $user_email = $_POST['email'];
    $user_name = $_POST['username'];
    $current_user_id =  $_SESSION['user_id'];

    if ($user_email == "" || $user_name == "") {
        echo "Fill all the inputs";
    } else {
        $update_user = "UPDATE users SET email = ?, username = ? WHERE id = '$current_user_id'";

        $stm = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stm, $update_user)) {
            exit();
        }
        mysqli_stmt_bind_param($stm, "ss", $user_email, $user_name,);
        mysqli_stmt_execute($stm);
        mysqli_stmt_close($stm);
        header("Location: http://localhost/clean_post/auth/profile.php");
        exit();
    }
} else {
    echo "Not submitted";
}
?>

<?php
require_once "../includes/footer.php";
?>
