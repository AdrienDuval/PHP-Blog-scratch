<?php
require_once "../includes/header.php";  
require_once "../config/config.php";

if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
}
if (isset($_POST['submit'])) {


    $post_title = $_POST['post_title'];
    $post_subtitle = $_POST['post_subtitle'];
    $post_body = $_POST['post_body'];
    $post_image_link = $_FILES['post_image_link']['name'];
    $dir = 'images/' . basename($post_image_link);

    if($post_title == "" || $post_subtitle == "" || $post_body == "" || $post_image_link == "" ) {
        echo "Fill all the inputs";
    } else {
        $update = "UPDATE posts SET title = ?, subtitle = ?, body = ?, image = ? WHERE postID = '$post_id'";

        $stm = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stm, $update)) {
            exit();
        }
        mysqli_stmt_bind_param($stm, "ssss", $post_title, $post_subtitle, $post_body, $post_image_link);
        move_uploaded_file($_FILES['post_image_link']['tmp_name'], $dir);
        mysqli_stmt_execute($stm);
        mysqli_stmt_close($stm);
        header("Location: http://localhost/clean_post/posts/post.php?post_id=$post_id");
        exit();
    }

   
} else {
    echo "Not submitted";
}
?>

<?php
require_once "../includes/footer.php";
?>
