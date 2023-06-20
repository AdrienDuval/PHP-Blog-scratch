<?php
require "../admin-panel/layouts/header.php";
require_once "../config/config.php";

if (!isset($_SESSION["adminname"])) {
  header("location: http://localhost/clean_post/admin-panel/admins/login-admins.php");
  exit;
}
// Define an array of table names and their respective aliases
$tables = array(
  "admins" => "admin_numbers",
  "posts" => "post_numbers",
  "categories" => "cats_numbers"
);

// Initialize an empty array to store the results
$results = array();

// Loop through the tables
foreach ($tables as $table => $alias) {
  // Execute the query and fetch the result
  $query = "SELECT COUNT(*) AS $alias FROM $table";
  $result = $conn->query($query);
  
  // Fetch the row and store it in the results array
  while ($row = $result->fetch_object()) {
      $results[$table] = $row->$alias;
  }
}

?>

<div class="row">
  <?php if (isset($_GET['success'])) : ?>
    <div class="col-md-12">
      <div class="card alert-success">
        <div class="card-body">
          <?php if ($_GET['success'] == 'loginsuccess') : ?>
            <div class="ctn ">Hello, <strong><?php echo $_SESSION["adminname"] ?></strong> </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Posts</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of Posts
          <?php echo $results["posts"] ?>
        </p>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>

        <p class="card-text">number of categories: 
        <?php echo $results["categories"] ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of Admins: 
        <?php echo $results["admins"] ?>
        </p>

      </div>
    </div>
  </div>
</div>

<?php require "../admin-panel/layouts/footer.php" ?>