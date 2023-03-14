<?php

require_once "../config/config.php";

function emptyInputSignup($name, $email, $pwd)
{
    $result;
    if (empty($name) || empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
;
function uiDExists($conn, $name, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stm = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stm, $sql)) {
        header("Location: http://localhost/clean_post/auth/register.php?error=usernametaken");
        exit();
    }

    mysqli_stmt_bind_param($stm, "ss", $name, $email);
    mysqli_stmt_execute($stm);

    $resultData = mysqli_stmt_get_result($stm);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stm);
}


function CreateUser($conn, $name, $email, $pwd)
{
    $sql = "INSERT INTO users (email, username, mypassword) VALUES (?, ?, ?);";
    $stm = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stm, $sql)) {
        header("Location: http://localhost/clean_post/auth/register.php?error=usernametaken");
        exit();
    }
    $hasedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stm, "sss", $email, $name, $hasedPwd);
    mysqli_stmt_execute($stm);
    mysqli_stmt_close($stm);
    header("Location: http://localhost/clean_post/auth/login.php?error=none");
    exit();
}
function emptyInputLogin($email, $pwd)
{
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
;

function loginUser($conn, $email, $pwd)
{
    if ($valid) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }


    $uidExist = uiDExists($conn, $email, $email);
    if ($uidExist === false) {
        header("Location: http://localhost/clean_post/auth/login.php?error=WrongLogin");
        exit();
    }
    $pwdHashed = $uidExist["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: http://localhost/clean_post/auth/login.php?error=WrongLogin");
        exit();
    } elseif ($checkPwd === true) {
        session_start();
        $_SESSION['id'] = $uidExist["id"];
        $_SESSION['email'] = $uidExist["email"];
        header("location: http://localhost/clean_post/index.php?error=login");
    }
}