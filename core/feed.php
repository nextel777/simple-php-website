<?php

require_once 'library/mysqli.php';



if (!$_GET['id']){
    $result =  $link->query('select * from posts  left join users on posts.user_id = users.id;');

    while ($posts_array = $result->fetch_array()) {

        echo '<div class="post-'.$posts_array['id'].'">
           <a href="feed.php?id='.$posts_array['id'].'"><h2>' . $posts_array['title'] .'</h2></a>
           <div class="content"><p>'. $posts_array['description'].'</p></div>
           <div class="date">date '. $posts_array['date'].'</div>
           <div class="author">posted by '.$posts_array['username'].'</div>
           ';
    }


}

$post_id = $_GET['id'];


$GETPostByID = $link->query('select * from posts  left join users on posts.user_id = users.id WHERE `posts`.`id` ='.$post_id.'  ;');

//var_dump($query);


while ($query = $GETPostByID->fetch_array()) {


    echo '<div class="post-'.$query['id'].'">
           <h2>' . $query['title'] .'</h2>
           <div class="content"><p>'. $query['description'].'</p></div>
           <div class="date">date '. $query['date'].'</div>
           <div class="author">posted by '.$query['username'].'</div>
           ';
}





