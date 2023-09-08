<?php
$posts = $result["data"]['posts']; //récupère les données envoyées par le controller
$topic = $posts->current()->getTopic();
// var_dump($topic);die;
?>

<h1><?= $topic->getName()?></h1>
<h2><?= $topic->getTitle()?></h2>

<div class="posts-container">
<?php

    foreach($posts as $post){
        ?>
            <a href="index.php?ctrl=post&action=detailPost&id=<?= $post->getId() ?>" class="a-post">
                <p><?=$post->getContent()?></a></p>
                <p><?=$post->getCreationDate()?></p>
            </a>
        <?php
    }

    ?>
</div>
