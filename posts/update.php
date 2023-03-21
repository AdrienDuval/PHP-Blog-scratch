<?php
require_once "../includes/header.php";
require_once "../config/config.php";

if (isset($_GET['update_post_id'])) {
    $post_update_id = $_GET['update_post_id'];
    $query = "SELECT * FROM posts WHERE postID = '$post_update_id'";
    $result = $conn->query($query);
    $rows = array();
    $row = $result->fetch_object();

} else {
    echo "Please select the post you want to edit or the post you want to edit is not found";
}
?>

<form method="POST" enctype="multipart/form-data" action="update_function.php?post_id=<?php echo $post_update_id ?>" >
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="post_title" id="form2Example1" class="form-control"  value="<?php echo $row->title ?>" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="post_subtitle" id="form2Example1" class="form-control" placeholder="subtitle"  value="<?php echo $row->subtitle ?>"/>
    </div>

    <div class="form-outline mb-4">
        <textarea  class="form-control" id="exampleFormControlTextarea1" name="post_body" rows="10" placeholder="body"><?php echo $row->body ?></textarea>
    </div>
    <div class="image-preview">
        <img src="http://localhost/clean_post/posts/images/<?php echo $row->image;?>" alt="<?php echo $row->image;?>" width="200" height="100">
    </div>
    <div class="form-outline mb-4">
        <input type="file" name="post_image_link" id="form2Example1" class="form-control" placeholder="image" />
    </div>


    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

</form>


<?php
require_once "../includes/footer.php";
?>