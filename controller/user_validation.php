<?php 
session_start();
include_once '../database/env.php';

$email            = trim($_REQUEST['email'] ?? '');
$user             = trim($_REQUEST['username'] ?? ''); 
$password         = $_REQUEST['psk'] ?? '';
$confirm_password = $_REQUEST['conf_pass'] ?? '';
$errors           = [];


if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = "A valid E-mail is required";
}

if (strlen($user) < 3) {
    $errors['username_error'] = "Please write at least 3 characters";
}

if (strlen($password) < 8) {
    $errors['password_error'] = "Password must be at least 8 characters long";
}

if ($password !== $confirm_password) {
    $errors['confirm_pass_error'] = "Passwords do not match";
}


if (count($errors) > 0) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['old_data'] = $_REQUEST; 
    header('Location: ../signup.php');
    exit();
}


$pass_hash = password_hash($password, PASSWORD_BCRYPT);
$query = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $email, $user, $pass_hash);
    $response = mysqli_stmt_execute($stmt);

    if ($response) {
        unset($_SESSION['old_data']);
        $_SESSION['success_msg'] = "Registration successful!";
        header("Location: ../signin.php");
        exit();
    } else {
        
        if (mysqli_errno($connection) == 1062) {
            $errors['email_error'] = "* This Email or Username is already taken";
        } else {
            $errors['db_error'] = "* Registration failed. Please try again.";
        }
        
        $_SESSION['form_errors'] = $errors;
        header("Location: ../signup.php");
        exit();
    }
} else {
    die("Database error. Please check your connection.");
}