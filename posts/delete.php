<?php
// Require the configuration file
require_once "../config/config.php";

// Check if there is a post to delete
if(isset($_GET['delete_post_id'])) {

    // Get the post id from the URL parameter and store it in a variable
    $post_to_delete = $_GET['delete_post_id'];

    $select = "SELECT * FROM posts WHERE postID='$post_to_delete'";
    $result = $conn->query($select);
    $rows = array();
    $row =  $result->fetch_object();
    $userID = $_SESSION['user_id'];
    $postUserID = $row->user_id; 
    if ($userID !== $postUserID) {
        header("location: http://localhost/clean_post");
        exit();
    } 
    // print_r($row);
    unlink("images/" . $row->image . "");
    // exit();git ds

    // Create a SQL query to delete the post with the matching id
    $sql = "DELETE FROM posts WHERE postID='$post_to_delete'";

    // Check if the query was executed successfully
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, redirect to the "clean_post" page with the deleted post id as a parameter in the URL
        header("location: http://localhost/clean_post?post_deleted_id=$post_to_delete");
        exit();
    } else {
        // If the query was not successful, print an error message
        echo "Error deleting record: " . $conn->error;
    }
 

} else {
    // If there is no post to delete, print "not set"
    echo 'not set';
}
?>
