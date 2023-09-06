<?php
$posts = $result["data"]['posts']; //récupère les données envoyées par le controller


?>



<?php
foreach($posts as $post){
    ?>
    
    

    <p><?=$post->getContent()?></p>
    <p><?=$post->getCreationDate()?></p>

    <?php
}
