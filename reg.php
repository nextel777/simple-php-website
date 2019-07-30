<?php
include_once 'core/registration.php';

?>


<form action="" method="post">

    <h3>REGISTRATION</h3>

    Username: <input type="text" name="username" placeholder="username" required> </input>
    <span>* <?php if(isset($username_err) ){ echo $username_err;  }?></span>
    <br>
    <br>
   Age: <input type="text" name="age" placeholder="age" required > </input>
    <br>
    <br>
    Email: <input type="email" name="email" placeholder="email"  > </input>
    <span>* <?php if(isset($email_err) ){ echo $email_err;  }?></span>
    <br>
    <br>
   Password: <input type="password" id="password" name="password" placeholder="password" required>
    <span>* <?php if(isset($pass_err) ){ echo $pass_err;  }?></span>
    <br>
    Repeat password: <input type="password" id="confirm_password"name="repassword" placeholder="password" required>
    <br>
    <br>
    <button type="submit"> register!</button>
</form>


<?php

