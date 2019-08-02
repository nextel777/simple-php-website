<?php

require_once 'library/mysqli.php';
include_once 'core/FormValidation.php';



$validation = new formValidation();

if (isset($_SESSION['username'])){
    header('Location: /index.php');
}else {
    if (isset($_POST['entry'])) {

        $email = $link->real_escape_string($_POST['login']);

        $resultEmail = $validation->email($email);


        if ($resultEmail == 0) {
            $email_err = 'email not valid';
        }


        $password = $link->real_escape_string($_POST['password']);
        $resultPassword = $validation->password($password);
        if ($resultPassword == 0) {
            $pass_err = 'is not valid';
        }


        $sql = $link->query("SELECT * FROM users WHERE email='$email'");
        $row = $sql->fetch_array();


        if ($row['password'] == md5($password)) {
            session_start();
            $_SESSION['user'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: /dashboard.php');


        } else {
            $_POST = array();
            $err = "<p style='color: red'>Wrong Username or Password</p>";
            echo $err;
            ?>

            <?php
        }
    }
}

