<?php
require_once 'library/mysqli.php';
require_once 'FormValidation.php';

$validation = new formValidation();

session_start();
if (isset($_SESSION['username'])){
    header('Location: /index.php');
}else{




if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['age']) ) {


    $username = $_POST['username'];
    $resultUsername = $validation->username($username);
    if ($resultUsername == 0){
        $username_err = 'username not valid';
    }


    $email = $_POST['email'];
    $resultEmail = $validation->email($email);
    if ($resultEmail == 0){
        $email_err ='email not valid';
    }


    $password = $_POST['password'];
    $resultPassword =  $validation->password($password);
    if ($resultPassword == 0){
        $pass_err = 'is not valid';
    }

    $result = $resultUsername + $resultEmail + $resultPassword;


    $age = $_POST['age'];
    $regdate = date('Y-m-d H:i:s');



    if ($result === 3) {

        if ($link->query("INSERT INTO users(username,email,password, age, registered) " .
            "VALUES('" . $username . "','" . $email . "','" . md5($password) . "','" . $age . "','" . $regdate . "')")) {

            $msg = 'Congratulation you have successfully registered.';
            echo $msg;
            header("refresh:5;url=/login.php");

        } else {
            $msg = 'Error while registering you...';
        }
//        echo $msg;

    }

}

}


