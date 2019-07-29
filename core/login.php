<?php

require_once 'library/mysqli.php';

if (isset($_SESSION['username'])){

    header('Location: /index.php');

}else{
        if(isset($_POST['entry'])){
            $email = mysqli_escape_string($link, $_POST['login']);
            $password = mysqli_escape_string($link, $_POST['password']);
            $res=mysqli_query($link, "SELECT * FROM users WHERE email='$email'");
            $row=mysqli_fetch_array($res);

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

