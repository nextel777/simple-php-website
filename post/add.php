<?php
include_once '../core/Feed.php';


$feed = new Feed();

if(isset($_POST['sumbit'])){
    if (!empty($title) && isset($_POST['description']) ){
        echo 'form is empty';
    }else{
            $feed->createPost();
        }
    }



?>

<form action="" method="post">

    <h1>Create post:</h1>

    <label for="">Title <input type="text" name="title" required></label>
    <br>
    <br>

    <label for="">description <textarea rows="10" cols="45"  name="description"></textarea></label>
    <br>
    <br>

    <button type="submit" name="sumbit">create post</button>


</form>
