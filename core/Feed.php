<?php

include_once ('library/mysqli.php');

 session_start();

if(!isset($_SESSION["user"]) && !isset($_SESSION["username"]))
{
    die ("hacking attempt");

}

class Feed{

    public function createPost(){

        global $link;

            $title = $link->real_escape_string($_POST['title']);
            $description = $link->real_escape_string($_POST['description']);
            $author = $_SESSION['username'];
            $post_date  = date('Y-m-d H:i:s');

            if($link->query("INSERT INTO posts(title,description,date, user_id)"  .
                "VALUES('" . $title . "','" . $description . "','" . $post_date . "','" . $author . "')")){
                $post_link = $link->insert_id;
                $msg = 'Post created successfully <a href="feed.php?id='.$post_link.'">see post</a>';

            }else{
                $msg = 'Oops! something went wrong';
                print_r($link->error);
            }


            if (isset($msg)){ echo $msg;}

    }
    public function getPost($id){
        global $link;

        $result = $link->query('select * from posts WHERE posts.id ='.$id.';');

        $posts_array = $result->fetch_array();


        return $posts_array;



    }

    public function editPost($id){
        global $link;

        $id = $link->real_escape_string($id);
        $title = $link->real_escape_string($_POST['title']);
        $description = $link->real_escape_string($_POST['description']);
//        $author = $_SESSION['username'];
//        $post_date  = date('Y-m-d H:i:s');

        if($link->query("UPDATE posts SET title='".$title."', description='".$description."' where id=$id ")){

            $msg = 'Post  successfully updated <a href="/feed.php?id='.$id.'">see post</a>';
            print_r($link->error);

        }else{
            $msg = 'Oops! something went wrong';
            print_r($link->error);
        }


        if (isset($msg)){ echo $msg;}

    }


    public function getPostById($id){

        global $link;

        $result = $link->query('select * from posts  left join users on posts.user_id = users.id WHERE `posts`.`id` ='.$id.'  ;');

        $posts_array = $result->fetch_array();

        return $posts_array;




    }

    public function getPosts(){

        global $link;

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

}






