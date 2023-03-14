<?php

session_start();
session_unset();
session_destroy();
header("location: http://localhost/clean_post/index.php");
