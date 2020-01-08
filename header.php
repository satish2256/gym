<?php
session_start();
 if(!isset($_SESSION['admin_username'])){
    header('location:login.php');
 } 
require_once"object.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="css/index1.css">
</head>
<body>
    <div>
    <div class="menu">
        <h1 class="divn">Welcome <?php echo $_SESSION['admin_username'];?></h1>
    <ul>
        <li><a href="welcome.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="#">ADD</a>
                <ul>
                <li><a href="create_member.php">Member</a></li>
                <li><a href="create_shift.php">Shift</a></li>
                <li><a href="create_Attandance.php">Attandance</a></li>
                <li><a href="create_trainer.php">Trainer</a></li>
                <li><a href="create_package.php">Package</a></li>
                <li><a href="create_admin.php">Admin</a></li>

                </ul>
        </li>
        <li><a href="#">LIST</a>
                <ul>
              <li><a href="list_member.php">Member</a></li>
                <li><a href="list_shift.php">shift</a></li>
                <li><a href="list_attandance.php">Attandance</a></li>
                <li><a href="list_trainer.php">Trainer</a></li>
                <li><a href="list_package.php">Package</a></li>
                <li><a href="list_admin.php">Admin</a></li>
                <li><a href="list_contact.php">Contact</a></li>
                <li><a href="list_register.php">Register</a></li>
                </ul>
        </li>
        <li><a href="contact.php">CONTACT US</a></li>
        <li><a><a href="logout.php">LOGOUT</a></a></li>
    </ul>
</div>
</div>