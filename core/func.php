<?php
session_start();

require_once 'library/mysqli.php';


$username = $_SESSION['username'];


$res=mysqli_query($link, "SELECT * FROM users WHERE username='$username'");
$row=mysqli_fetch_array($res);


$user_id = $row['id'];
$email = $row['email'];
$age = $row['age'];
$date_reg = $row['registered'];


