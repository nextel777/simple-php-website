<?php
session_start();

include_once 'library/mysqli.php';

if(isset($_POST['title']) && isset($_POST['description'])){

    $title = $link->real_escape_string($_POST['title']);
    $description = $link->real_escape_string($_POST['description']);
    $author = $_SESSION['user'];
    $post_date  = date('Y-m-d H:i:s');


    if($link->query("INSERT INTO posts(title,description,date, user_id)"  .
        "VALUES('" . $title . "','" . $description . "','" . $post_date . "','" . $author . "')")){
        $msg = 'Post created successfully';

    }else{
        $msg = 'Oops! something went wrong';
        print_r($link->error);
    }


    if (isset($msg)){ echo $msg;}



}