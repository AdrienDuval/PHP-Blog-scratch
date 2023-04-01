<?php
require_once "../includes/navbar.php";
require_once "../config/config.php";
if (isset($_GET['cat_id'])) {
    $catID = $_GET['cat_id'];
    //Post data base query 
    $query = "SELECT * FROM posts WHERE post_cat = '$catID'";
    $result = $conn->query($query);
    $rows = array();
    while ($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    //category database query 
    $catquyery = "SELECT * FROM categories";
    $catresult = $conn->query($catquyery);
    $catRows = array();
    while ($catRow = $catresult->fetch_object()) {
        $catRows[] = $catRow;
    }
    // print_r($catRows);

    foreach ($catRows as $catRow) {
        if ($catRow->catID === $catID) {
            $the_post_cat = $catRow->category_name;
        }
    }
} else {
    header("location: http://localhost/clean_post");
}



?>
<header class="masthead" style="background-image: url('http://localhost/clean_post/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo $the_post_cat ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="row gx-4 gx-lg-5 justify-content-center">
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
</div>

<?php
require_once "../includes/footer.php";
?>