<?php
session_start();

require_once 'library/mysqli.php';

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $res=$link->query("SELECT * FROM users WHERE username='$username'");
    $row=$res->fetch_array();

    $user_id = $row['id'];
    $email = $row['email'];
    $age = $row['age'];
    $date_reg = $row['registered'];

}else{
    exit;
}




