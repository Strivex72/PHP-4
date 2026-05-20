<?php
session_start();
include_once "../database/env.php";


$job_type = $_REQUEST['job_type'];
$moto = $_REQUEST['moto'];
$title = $_REQUEST['title'];
$short_desc = $_REQUEST['short_desc'];
$cta = $_REQUEST['cta'];
$cta_link = $_REQUEST['cta_link'];
$experience = $_REQUEST['experience'];
$projects = $_REQUEST['projects'];
$clients = $_REQUEST['clients'];



$cv = $_FILES['cv'];
$image = $_FILES['image'];

$errors = [];


if($cv['size'] > 0){
    $cvExt = strtolower(pathinfo($cv['name'], PATHINFO_EXTENSION));
    $validCvExts = ['pdf', 'docx', 'doc'];
    if(!in_array($cvExt, $validCvExts)){
        $errors['cv_error'] = "CV must be a PDF, DOCX, or DOC file.";
    }
}

if($image['size'] > 0){
    $imageExt = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $validImageExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if(!in_array($imageExt, $validImageExts)){
        $errors['image_error'] = "Image must be a valid graphic format.";
    } else if(($image['size'] / 1024) > 2048){ 
        $errors['image_error'] = "Image size must be less than 2MB.";
    }
}


if(count($errors) > 0){
    $_SESSION['form_errors'] = $errors;
    header("Location: ../dashboard.php");
    exit();
}


$existingQuery = "SELECT cv, image FROM banners WHERE id = 1";
$existingResult = mysqli_query($connection, $existingQuery);
$oldData = mysqli_fetch_assoc($existingResult);

if(!file_exists("../uploads/")) {
    mkdir("../uploads/", 0777, true);
}


$cvFileName = $oldData['cv']; 
if($cv['size'] > 0){
    
    if(!empty($oldData['cv']) && file_exists("../uploads/" . $oldData['cv'])){
        unlink("../uploads/" . $oldData['cv']);
    }
    $cvFileName = "CV_" . uniqid() . "." . pathinfo($cv['name'], PATHINFO_EXTENSION);
    move_uploaded_file($cv['tmp_name'], "../uploads/" . $cvFileName);
}


$imageFileName = $oldData['image']; 
if($image['size'] > 0){
    s
    if(!empty($oldData['image']) && file_exists("../uploads/" . $oldData['image'])){
        unlink("../uploads/" . $oldData['image']);
    }
    $imageFileName = "IMG_" . uniqid() . "." . pathinfo($image['name'], PATHINFO_EXTENSION);
    move_uploaded_file($image['tmp_name'], "../uploads/" . $imageFileName);
}

$updateQuery = "UPDATE banners SET 
    job_type = '$job_type', 
    moto = '$moto', 
    title = '$title', 
    short_desc = '$short_desc', 
    cta = '$cta', 
    cta_link = '$cta_link', 
    experience = '$experience', 
    projects = '$projects', 
    clients = '$clients',
    cv = '$cvFileName',
    image = '$imageFileName'
    WHERE id = 1";

$result = mysqli_query($connection, $updateQuery);

if($result){
    header("Location: ../dashboard.php?update_success=1");
} else {
    die("Query Failed: " . mysqli_error($connection));
}
