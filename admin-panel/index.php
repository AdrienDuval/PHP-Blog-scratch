<?php
require "../admin-panel/layouts/header.php";

if (!isset($_SESSION["adminname"])) {
  header("location: http://localhost/clean_post/admin-panel/admins/login-admins.php");
  exit;
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
        <p class="card-text">number of posts: 8</p>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>

        <p class="card-text">number of categories: 4</p>

        <?php
        if (isset($_SESSION['adminname'])) {
          echo $_SESSION['adminname'];
        }
        ?>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: 3</p>

      </div>
    </div>
  </div>
</div>
<!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
<?php require "../admin-panel/layouts/footer.php" ?>