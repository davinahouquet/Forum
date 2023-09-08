<?php

$topics = $result["data"]['topics']; //récupère les données envoyées par le controller
    
?>

<button><a href="index.php?ctrl=topic&action=addTopic">+ ADD TOPIC</a></button>

<form action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">

    <label for="name">Name</label>
    <input type="text" name="name" id="name">

    <label for="question">Question</label>
    <textarea name="question" id="question"></textarea>

    <input type="submit" name="submitTopic">
    
</form>


<?php
foreach($topics as $topic ){
    
    ?>
    <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
    <p><?=$topic->getQuestion()?></p>
    <p><?=$topic->getCreationDate()?></p>
    <?php
}
?>
