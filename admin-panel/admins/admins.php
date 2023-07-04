<?php
require "../layouts/header.php";
require_once "../../config/config.php";

if (!isset($_SESSION["adminname"])) {
  header("location: http://localhost/clean_post/admin-panel/admins/login-admins.php");
  exit;
}
$query = "SELECT * FROM admins LIMIT 5";
$result = $conn->query($query);
$rows = array();
while ($row = $result->fetch_object()) {
  $rows[] = $row;
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="http://localhost/clean_post/admin-panel/admins/create-admins.html" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <th scope="row"> <?php echo $row->id; ?></th>
                <td><?php echo $row->adminname; ?></td>
                <td><?php echo $row->email; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php require "../layouts/footer.php" ?>