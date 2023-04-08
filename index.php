<?php
require_once "./includes/header.php";
require_once "./config/config.php";

$query = "SELECT * FROM posts";
$result = $conn->query($query);
$rows = array();
while ($row = $result->fetch_object()) {
    $rows[] = $row;
}
require_once "./includes/show_post_cat_query.php";
// print_r($catRows);

// foreach ($catRows as $catRow) {
//     echo $catRow->category_name . "<br>";
// }

?>

<div class="row gx-4 gx-lg-5 justify-content-center">

    <div class="col-md-10 col-lg-8 col-xl-7">
        <?php
        if (isset($_SESSION['username'])) {
            echo '<p class="alert alert-success"> hello ' . $_SESSION['username'] . ' ID is ' . $_SESSION['user_id'] . "</p>";
        } else {
            echo "login to see your name";
        }
        ?>
    </div>

    <div class="col-md-10 col-lg-8 col-xl-7">


        <?php foreach ($rows as $row) : ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="http://localhost/clean_post/posts/post.php?post_id=<?php echo $row->postID;; ?>">
                    <h2 class="post-title"><?php echo $row->title; ?></h2>
                    <h3 class="post-subtitle"><?php echo $row->subtitle; ?></h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!"><?php echo $row->username ?></a>
                    <?php echo date('M', strtotime($row->create_at)) . ',' . date('d', strtotime($row->create_at)) . ' ' . date('Y', strtotime($row->create_at)); ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
        <?php endforeach; ?>

    </div>
    <h3 class="h3">Categories</h3>
    <?php foreach ($catRows as $catRow) { ?>
        <div class="alert alert-dark" role="alert">
            <a href="http://localhost/clean_post/categories/category.php?cat_id=<?php echo $catRow->catID; ?>"><?php echo $catRow->category_name; ?></a>
        </div>
    <?php } ?>
</div>

<?php
require_once "./includes/footer.php";
?>