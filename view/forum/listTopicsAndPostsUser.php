<?php $topics = $result["data"]['topics']; ?>

    <h2>Topics created by -Username-</h2>
<?php 
    foreach($topics as $topic){
        echo $topic->getName();
    }
?>
<h3>Posts created by -Username-</h3>