<?php

include_once 'core/login.php';

if (isset($_SESSION['username'])){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'dashboard.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

?>

<form action="" method="post">
    <h1>LOGIN</h1>
    <label for="">
       login <input type="text" name="login">
        <span>* <?php if(isset($email_err) ){ echo $email_err;  }?></span>
        <br>
       password <input type="password" name="password" placeholder="password">
        <span>* <?php if(isset($pass_err) ){ echo $pass_err;  }?></span>
    </label>
    <br>
    <button type="submit" name="entry">login</button>
</form>

<a href="reg.php">do not have account?</a>
