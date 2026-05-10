<?php
session_start();
include_once '../database/env.php';

$email    = trim($_REQUEST['email'] ?? '');
$password = $_REQUEST['psk'] ?? '';
$errors   = [];

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = "Invalid E-mail format";
}


if (empty($password)) {
    $errors['password_error'] = "Password is required";
}

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    header("Location: ../signin.php");
    exit();
}


$query = "SELECT * FROM users WHERE email = ? OR username = ?";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $email, $email);
    mysqli_stmt_execute($stmt);
    $result_set = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result_set) === 1) {
        $user = mysqli_fetch_assoc($result_set);
        
     
        if (password_verify($password, $user['password'])) {
            unset($user['password']); 
            $_SESSION['authenticate'] = $user;
            header("Location: ../dashboard.php");
            exit();
        }
    }
}

$errors['login_error'] = "Email or Password is incorrect";
$_SESSION['form_errors'] = $errors;
header("Location: ../signin.php");
exit();