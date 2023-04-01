<?php
$catquyery = "SELECT * FROM categories";
$catresult = $conn->query($catquyery);
$catRows = array();
while ($catRow = $catresult->fetch_object()) {
    $catRows[] = $catRow;
}
