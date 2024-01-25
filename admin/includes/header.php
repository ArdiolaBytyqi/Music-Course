<?php
session_start();

if (!isset($_SESSION['roles']) || $_SESSION['roles'] != 2) {
    echo "<script>window.location.href = '../index.php';</script>";
    exit();
} else

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Music | Admin</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="../assets/images/llogo1.png" alt="">
        </div>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="about-us.php">About us</a>
            </li>
            <li>
                <a href="contact-us.php">Contact us</a>
            </li>
            <li>
                <a href="paketat.php">Paketat</a>
            </li>
        </ul>
    </div>

    <div class="navbar">
        <div class="nav">
            <?php
        if (isset($_SESSION['user_id'])) {

            ?>
                <div class="login">
                    <ul>
                        <li>
                            <a href="#"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            <?php
        }
            ?>
        </div>
    </div>
<div class="main">
    <div class="sidebar_block">
    </div>
    <div class="content">
        
