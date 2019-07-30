<?php

require_once 'library/mysqli.php';


$result =  $link->query('select * from posts  left join users on posts.user_id = users.id;');
//$posts_array = $result->fetch_array();
//var_dump($posts_array);


while ($posts_array = $result->fetch_array()) {

   echo '<div class="post-'.$posts_array['id'].'">
           <h2>' . $posts_array['title'] .'</h2>
           <div class="content"><p>'. $posts_array['description'].'</p></div>
           <div class="date">date '. $posts_array['date'].'</div>
           <div class="author">posted by '.$posts_array['username'].'</div>
           ';
}









