<?php

$topics = $result["data"]['topics']; //récupère les données envoyées par le controller
    
?>


<?php
foreach($topics as $topic ){
    
    ?>
    <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
    <p><?=$topic->getTitle()?></p>
    <p><?=$topic->getCreationDate()?></p>
    <?php
}
