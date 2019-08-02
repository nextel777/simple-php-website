<?php

require_once ('UserSession.php');
require_once ('library/mysqli.php');


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
                $msg = 'Post created successfully <a href="/feed.php?id='.$post_link.'"> see this post</a>';
                $_SESSION['success'] = $msg;
                header("Location:/edit.php?id=$post_link");

            }else{
                $err = 'Oops! something went wrong';
                print_r($link->error);
            }



            if (isset($err)){ echo $err;}

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

        if($link->query("UPDATE posts SET title='".$title."', description='".$description."' where id=$id ")){

            $success = 'Post  successfully updated <a href="/feed.php?id='.$id.'">see post</a>';
            header("Refresh:1");
            $_SESSION['success'] = $success;
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


    public function createComment($id, $created_at){
        global $link;


        $user_id = $_SESSION['user'];
        $message = $link->real_escape_string($_POST['message']);



        if($result = $link->query("INSERT INTO comments(user_id, post_id, message, created_at)" .
            "VALUES('".$user_id."', '".$id."', '".$message."', '".$created_at."'  )")){

          $_SESSION['success'] =  $msg = 'comment created successfully';
            Header('Location: '.$_SERVER['PHP_SELF']);

        }else{
            $msg = 'Oops! something went wrong';
            print_r($link->error);
        }




    }

    public function getCommentsByPostId($id){
        global $link;


        $result = $link->query('select * from comments where post_id ='.$id.'');


                return $result;
        }

        public function getUsernameById($uid){
        global $link;


        $result = $link->query('select username from users where id ='. $uid .'');
        $row = $result->fetch_array();


            return $row;
        }

        public function replyByCommentID($id){

            global $link;




            $user_id = $_SESSION['user'];
            $parent_id = $_POST['comment_id'];
            $message = $link->real_escape_string($_POST['reply_message']);




            if($result = $link->query("INSERT INTO comments(user_id, post_id, message, parent_id )" .
                "VALUES('".$user_id."', '".$id."', '".$message."', '".$parent_id."')")){

                $_SESSION['success'] =  $msg = 'comment created successfully';
                Header('Location: '.$_SERVER['PHP_SELF']);

            }else{
                $msg = 'Oops! something went wrong';
                print_r($link->error);
            }



        }


    }






