<?php

require_once 'library/mysqli.php';

if (isset($_SESSION['username'])){
    header('Location: /index.php');
}else{
        if(isset($_POST['entry'])){
            $email = $link->real_escape_string($_POST['login']);
            $password = $link->real_escape_string($_POST['password']);



            $sql = $link->query("SELECT * FROM users WHERE email='$email'");
            $row = $sql->fetch_array();


            if($row['password']==md5($password)){
                session_start();
                $_SESSION['user'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: /dashboard.php');


            }else{
                $err = "<p style='color: red'>Wrong Username or Password</p>";
                echo $err;
                ?>

                <?php
            }
        }
     }

