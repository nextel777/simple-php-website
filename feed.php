<?php

include_once 'core/Feed.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['user'])){
    die ("hacking attempt");
}

if (isset($_SESSION['success'])){

    echo $_SESSION['success'];
    unset($_SESSION['success']);
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
        echo '<div class="edit"><a href="/post/edit.php?id=' . $post_data['id'] . '">edit<a></div>';
    }
    ?>

    <div class=""><h3>Comments</h3></div>
    <?php
    $created_at = date('Y-m-d H-i');

    $comments = $feed->getCommentsByPostId($id);
    if (isset($_POST['sumbit_reply'])){
        $feed->replyByCommentID($id);
    }if(!isset($_POST['sumbit_reply'])) {
            if (isset($_POST['sumbit'])){
                $feed->createComment($id, $created_at);
            }
        }
    }

    foreach ($comments as $items) { ?>

        <?php $username = $feed->getUsernameById($items['user_id']) ?>

        <div class="author"><h4>posted by <?php echo $username['username'] ?></h4></div>
        <div class="content"><p>message: <?php echo $items["message"]; ?></p></div>
        <div class="date">date <?php echo $items["created_at"]; ?></div>
        <a href="?id=<?php echo $id ?>&comment=<?php echo $items['id'] ?>">reply</a>
        <br>

        <?php  if (isset($_GET['comment']) and $_GET['comment'] === $items['id']) { ?>

            <br>

            <form action="" method="post" name="reply">
                <label for="">reply to <?php echo $username['username'] ?>:</label>
                <br>

                <input type="hidden" name="comment_id" value="<?php echo $items['id'] ?>" />
                <br>
                <label for=""><br> <textarea name="reply_message" id="" cols="30" rows="5"
                                             placeholder="comment.."></textarea></label>
                <br>
                <button type="submit" name="sumbit_reply">submit</button> <a href="?id=<?php echo $id ?>">cancel</a>
            </form>

        <?php
        }
    }
    if (!isset($_GET['comment'])){ ?>

        <br>

    <form action="" method="post">
        <label for="">Leave a comment:</label>
        <br
        <br>
        <label for=""><br> <textarea name="message" id="" cols="30" rows="5" placeholder="comment.."></textarea></label>
        <br>
        <button type="submit" name="sumbit">submit</button>
    </form>

        <?php

}
?>


