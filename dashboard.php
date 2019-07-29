<?php

include_once 'core/func.php';

if(!isset($_SESSION["user"]))
{
   echo 'hacking attempt';
    exit;
}
?>


username <?php echo $username ?>
<br>
user id <?php echo $user_id ?>
<br>
email <?php echo $email ?>
<br>
age <?php echo  $age ?>
<br>
date reg <?php echo $date_reg ?>

<br>

<a href="logout.php">LOGOUT</a>
