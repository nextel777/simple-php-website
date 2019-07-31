<?php
require_once '../core/Feed.php';



$feed = new Feed();

$id = $_GET['id'];

$feed->getPost($id);
//$post_data =$feed->getPost($id);

if(isset($_POST['title']) && isset($_POST['description'])){
    $feed->editPost($id);
    $post_data =$feed->getPost($id);
}else{
    $post_data =$feed->getPost($id);
}
?>

<form action="" method="post">
    <h1>Edit post:</h1>
    <label for="">Title <input type="text" name="title" size="45" value="<?php echo $post_data['title']?>" ></label>
    <br>
    <br>
    <label for="">description <textarea rows="10" cols="45" name="description"><?php echo $post_data['description']?></textarea></label>
    <br>
    <br>
    <button name="submit"  type="submit">edit post</button>
</form>