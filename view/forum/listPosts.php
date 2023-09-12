<?php
$posts = $result['data']['posts']; //récupère les données envoyées par le controller
// $topic = $posts->current()->getTopic();
// var_dump($topic);die;
$topic = $result['data']['topic'];
?>

<h1><?= $topic->getName()?></h1>
<h2><?= $topic->getQuestion()?></h2>

<div class="posts-container">
<?php
 if($posts == null){
    echo "<p>0 POST</p>";
 } else {
     foreach($posts as $post){
         ?>
             <p><?=$post->getContent()?></a></p>
             <p><?=$post->getCreationDate()?></p>
             <p><?=$post->getUser()->getUsername()?></a></p>
             <?php
                if(isset($_SESSION['user'])){
            ?>
                <button><a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>">Delete</a></button>
         <?php
     }
}

?>
</div>

<?php

    if(isset($_SESSION['user'])){
?>
    <button>+ADD POST</button>

    <form enctype="multipart/data" action="index.php?ctrl=post&action=addPost&id=<?=$id?>" method="post">

        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>

        <input type="submit" name="submitPost">

    </form>
<?php
    }
 }