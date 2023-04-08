<?php
require_once "../includes/header.php";
require_once "../includes/functions.php";
require_once "../config/config.php";


//Note displaying the password on the website is not a good practice if the users fogets the password they can reset it using the email and user name 
if (isset($_SESSION['user_id'])) {

    $url_user_id = $_SESSION['user_id'];
    $current_user_id =  $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE id = '$current_user_id'";
    $result = $conn->query($query);
    $rows = array();
    while ($row = $result->fetch_object()) {
        $rows[] = $row;
    }
}
?>



<div class="row gx-4 gx-lg-5 justify-content-center">
    <?php
    foreach ($rows as $row) { ?>
        <?php if ($current_user_id == $url_user_id) { ?>
            <span><strong>Your Email: </strong> <?php echo $row->email ?></span><br>
            <span><strong>Your Username: </strong> <?php echo $row->username ?></span><br>
            <span><strong>Your user ID: </strong> <?php echo $row->id ?></span><br>
            <a href="http://localhost/clean_post/auth/update_profil.php?update_user_id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-warning text-center mt-4">Update</a>

        <?php } else {
            echo "Error, you don't have the acces to this page dummy";
        } ?>
    <?php } ?>

</div>

<?php require_once "../includes/footer.php" ?>