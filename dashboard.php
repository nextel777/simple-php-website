<?php



include_once 'core/func.php';

if(!isset($_SESSION["user"]))
{
    die ("hacking attempt");

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
<br>

<a href="feed.php">news</a>
<br>
<a href="post/add.php">create a new post</a>
<br>
<a href="logout.php">LOGOUT</a>

