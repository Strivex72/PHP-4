<?php
session_start();
include_once "../database/env.php";

$job_type   = $_REQUEST['job_type'];
$moto       = $_REQUEST['moto'];
$title      = $_REQUEST['title'];
$short_desc = $_REQUEST['short_desc'];
$cta        = $_REQUEST['cta'];
$cta_link   = $_REQUEST['cta_link'];
$experience = $_REQUEST['experience'];
$projects   = $_REQUEST['projects'];
$clients    = $_REQUEST['clients'];

$cv         = $_FILES['cv'];
$image      = $_FILES['image'];

$errors = [];


if($cv['size'] > 0){
    $cvPath = pathinfo($cv['name']);
    $cvExt = strtolower($cvPath['extension']);
    $validCvExts = ['pdf', 'docx', 'doc'];
    
    if(!in_array($cvExt, $validCvExts)){
        $errors['cv_error'] = "CV must be a PDF, DOCX, or DOC file.";
    }
}

if($image['size'] > 0){
    $imagePath = pathinfo($image['name']);
    $imageExt = strtolower($imagePath['extension']);
    $validImageExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    if(!in_array($imageExt, $validImageExts)){
        $errors['image_error'] = "Image must be a JPG, JPEG, PNG, WEBP or GIF file.";
    } else if(($image['size'] / 1024) > 2048){ 
        $errors['image_error'] = "Image size must be less than 2MB.";
    }
}

// Handling Redirection if Errors Exist
if(count($errors) > 0){
    $_SESSION['form_errors'] = $errors;
    header("Location: ../dashboard.php");
    exit();
} else {
    if(!file_exists("../uploads/")) {
        mkdir("../uploads/", 0777, true);
    }

    
    $cvNewName = null;
    if($cv['size'] > 0){
        $cvNewName = "CV_" . uniqid() . "." . pathinfo($cv['name'], PATHINFO_EXTENSION);
        move_uploaded_file($cv['tmp_name'], "../uploads/" . $cvNewName);
    }

    
    $imageNewName = null;
    if($image['size'] > 0){
        $imageNewName = "IMG_" . uniqid() . "." . pathinfo($image['name'], PATHINFO_EXTENSION);
        move_uploaded_file($image['tmp_name'], "../uploads/" . $imageNewName);
    }

   
    $query = "UPDATE banners SET 
        job_type = '$job_type', 
        moto = '$moto', 
        title = '$title', 
        short_desc = '$short_desc', 
        cta = '$cta', 
        cta_link = '$cta_link', 
        experience = '$experience', 
        projects = '$projects', 
        clients = '$clients'" . 
        ($cvNewName ? ", cv = '$cvNewName'" : "") . 
        ($imageNewName ? ", image = '$imageNewName'" : "") . 
        " WHERE id = 1";

    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: ../dashboard.php?success=1");
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}