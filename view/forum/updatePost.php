<?php
//Modifier un post
    $post = $result["data"]['post'];
    // $topic = $result['data']['topic'];
    // var_dump($post);
?>

    <h3><a href="index.php?ctrl=topic&action=updatePost&id=<?=$id?>">UPDATE POST</a></h3>

<!-- Non du topic -->

<!-- Question -->

<!-- Afficher le contenu de l'ancien post -->
    <div class="lastPost">

        <p><?= $post->getContent() ?></p>

    </div>

        <form action="index.php?ctrl=post&action=updatePost&id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="content">Content</label>
            <textarea name="content" id="content"><?= $post->getContent() ?></textarea>

            <input type="submit" name="submitUpdatePost">
            
        </form>