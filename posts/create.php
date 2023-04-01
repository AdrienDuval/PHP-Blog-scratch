<?php
require_once "../includes/header.php";
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    if ($_POST['title'] == '' || $_POST['subtitle'] == '' || $_POST['body'] == '') {
        echo "Fille all the  inputs fields";
    } else {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $post_cat = $_POST['post_cat'];
        $image = $_FILES['image']['name'];
        $dir = 'images/' . basename($image);

        $insert = "INSERT INTO posts (title, subtitle, body, image, user_id, username, post_cat) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stm = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stm, $insert)) {
            header("Location: http://localhost/clean_post/post/create.php?error=usernametaken");
            exit();
        }
        mysqli_stmt_bind_param($stm, "sssssss", $title, $subtitle, $body, $image, $user_id, $username, $post_cat);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
            header("location: http://localhost/clean_post/index.php");
        }
        mysqli_stmt_execute($stm);
        mysqli_stmt_close($stm);
        header("Location: http://localhost/clean_post/auth/login.php?error=none");
        exit();
    }
}

// category query 
$catquyery = "SELECT * FROM categories";
$catresult = $conn->query($catquyery);
$catRows = array();
while ($catRow = $catresult->fetch_object()) {
    $catRows[] = $catRow;
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
        <select name="post_cat" class="form-select" aria-label="Default select example">
            <option selected>Select post category</option>
            <?php foreach ($catRows as $cat) { ?>
                <option value="<?php echo $cat->catID ?>"><?php echo $cat->category_name ?></option>
            <?php } ?>

        </select>
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