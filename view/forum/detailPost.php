<?php
$post = $result["data"]['post'];
$posts = $post->current()->getTopic();
// var_dump($posts);die;
?>
<h1><?= $posts->getName()?></h1>
<h2><?= $posts->getTitle()?></h2>

<div class="posts-container">
<?php

    foreach($post as $posted){
        ?>
            <p><?=$posted->getContent()?></a></p>
            <p><?=$posted->getCreationDate()?></p>
        <?php
    }

    ?>
</div>
