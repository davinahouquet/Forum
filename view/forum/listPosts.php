<?php
$posts = $result["data"]['posts']; //récupère les données envoyées par le controller
$topic = $posts->current()->getTopic();
// var_dump($topic);die;
?>

<h1><?= $topic->getName()?></h1>
<h2><?= $topic->getQuestion()?></h2>

<div class="posts-container">
<?php

    foreach($posts as $post){
        ?>
            <p><?=$post->getContent()?></a></p>
            <p><?=$post->getCreationDate()?></p>
            <p><?=$post->getUser()->getUsername()?></a></p>
        <?php
    }

    ?>
</div>
<button>+ADD POST</button>

<form enctype="multipart/data" action="index.php?ctrl=post&action=addPost&id=<?=$id?>" method="post">

    <label for="question"></label>
    <textarea name="content" id="content"></textarea>

    <input type="submit" name="submitPost">

</form>
