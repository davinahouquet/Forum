<?php

$topics = $result["data"]['topics'];

?>


<h3><a href="index.php?ctrl=topic&action=updateTopic&id=<?=$id?>">UPDATE TOPIC</a></h3>

        <form action="index.php?ctrl=topic&action=updateTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">

        
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?=$topics->getName()?>">

            <label for="question">Question</label>
            <textarea name="question" id="question"><?= $topics->getQuestion() ?></textarea>

            <input type="submit" name="updateTopic">
            
        </form>