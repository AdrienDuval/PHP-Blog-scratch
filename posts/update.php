<?php
require_once "http://localhost/clean_post/includes/header.php";
?>

<form method="POST" action="">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="email" id="form2Example1" class="form-control" placeholder="title" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="email" id="form2Example1" class="form-control" placeholder="subtitle" />
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="email" id="form2Example1" class="form-control" placeholder="body" />
    </div>


    <div class="form-outline mb-4">
        <input type="file" name="email" id="form2Example1" class="form-control" placeholder="image" />
    </div>


    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


</form>


<?php
require_once "http://localhost/clean_post/includes/footer.php";
?>