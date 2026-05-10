<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foyjur Rafee</title>
    <link rel="icon" href="../images/web logo.png">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.2.1/hamburgers.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="./css/slick.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>
    <!-- ----------------------------------------------------------------------- -->
    <!--                                 Header                                  -->
    <header>
        <nav class="navbar navbar-expand-lg" >
            <div class="container">
                <a class="navbar-brand d-flex navbarr" href="#">
                    <img src="./images/web logo.png" alt="" class="img-fluid">
                    <div class="logoStyle d-none d-lg-block">
                        <h2>Foyjur Rafee</h2>
                        <p>Full Stack Developer</p>
                    </div>
                </a>
                <button class="navbar-toggle hamburger hamburger--squeeze d-lg-none d-md-block d-block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#expertise">Expertise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php/#work">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#experience">Journey</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./signin.php">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <button onclick="window.location.href='#contact'">Let's Talk <iconify-icon icon="streamline:mail-send-email-message"></iconify-icon></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    