<?php

$topics = $result["data"]['topics']; //récupère les données envoyées par le controller
    
?>


<?php
foreach($topics as $topic ){
    
    ?>
    <h1><?=$topic->getName()?></h1>
    <p><?=$topic->getTitle()?></p>
    <p><?=$topic->getCreationDate()?></p>
    <?php
}
