<?php

$topics = $result["data"]['topics']; //récupère les données envoyées par le controller
    
?>

<h1>Topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <p><?=$topic->getTitle()?></p>
    <?php
}
