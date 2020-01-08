<?php
session_start();
 if(!isset($_SESSION['register_username'])){
    header('location:user.php');
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
        <h1 class="divn">Welcome <?php echo $_SESSION['register_username'];?></h1>
    <ul>
        <li><a href="dashboard.php">HOME</a></li>
        <li><a href="about2.php">ABOUT</a></li>
        <li><a href="#">LIST</a>
                <ul>
              <li><a href="list_member.php">Member</a></li>
                <li><a href="list_shift.php">shift</a></li>
                <li><a href="list_attandance.php">Attandance</a></li>
                <li><a href="list_trainer.php">Trainer</a></li>
                <li><a href="list_package.php">Package</a></li>
                <li><a href="list_admin.php">Admin</a></li>
                </ul>
        </li>
        <li><a href="contact.php">CONTACT US</a></li>
        <li><a><a href="logout1.php">LOGOUT</a></a></li>
    </ul>
</div>
</div>
    <div class="footer">
        <div id="clock"></div>
    </div>
    </body>
</html>