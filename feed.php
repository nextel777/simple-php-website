<?php

include_once 'core/Feed.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['user'])){
    die ("hacking attempt");
}


$feed = new Feed();


if (!isset($_GET['id'])){
    $feed->getPosts();
}else {

    $id = $_GET['id'];
    $feed->getPostByID($_GET['id']);

    $post_data = $feed->getPostById($id); ?>


    <h2><?php echo $post_data['title'] ?></h2>
    <div class="content"><p><?php echo $post_data['description'] ?></p></div>
    <div class="date">date <?php echo $post_data['date'] ?></div>
    <div class="author">posted by <?php echo $post_data['username'] ?></div>
    <?php if ($_SESSION['username'] === $post_data['username']) {
        echo '<div class="edit"><a href="/post/edit.php?id=' . $post_data['id'] . '">edit</div>';
    }
}