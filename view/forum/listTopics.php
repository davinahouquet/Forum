<?php
    $topics = $result["data"]['topics'];

    //Formulaire d'ajout de topic
    if(isset($_SESSION['user'])){
?>
        <h3><a href="index.php?ctrl=topic&action=addTopic">+ ADD TOPIC</a></h3>

        <form action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="name">Name</label>
            <input type="text" name="name" id="name">

            <label for="question">Question</label>
            <textarea name="question" id="question"></textarea>

            <input type="submit" name="submitTopic">
            
        </form>

    <?php
    }
        foreach($topics as $topic){
            
            ?>
            <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
            <p><?=$topic->getQuestion()?></p>
            <p><?=$topic->getCreationDate()?></p>

            <?php
                // if($_SESSION['user'] == $topic->getUser()){
                // if(isset($_SESSION['user'])){
            ?>
                <button><a href="index.php?ctrl=topic&action=updateTopic&id=<?=  $topic->getId() ?>">Update</a></button>
                <button><a href="index.php?ctrl=topic&action=deleteTopic&id=<?=  $topic->getId() ?>">Delete</a></button>
            <?php

        // }
}