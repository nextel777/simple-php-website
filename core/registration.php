<?php
require_once 'library/mysqli.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['age']) ) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $regdate = date('Y-m-d H:i:s');

    if(mysqli_query($link, "INSERT INTO users(username,email,password, age, registered) " .
        "VALUES('".$username."','".$email."','".md5($password)."','".$age."','".$regdate."')")){

        $msg = 'Congratulation you have successfully registered.';
	header( "refresh:5;url=/login.php" );
        mysqli_close($link);

    }else
    {
        $msg = 'Error while registering you...';
        mysqli_close($link);
    }
    echo $msg;

}else{
    exit('Error, please recheck all inputs');
}
