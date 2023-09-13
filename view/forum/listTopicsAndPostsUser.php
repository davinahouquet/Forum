<?php 
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>

    <h2>Topics created by this user </h2>

    <div class="topicsByUser">

        <?php

        if($topics == NULL){
            echo "0 topic yet";
        } else {
            foreach($topics as $topic){
                echo "<p>".$topic->getName()."</p>";
                echo "<p>".$topic->getCreationDate()."</p>";
                echo "<p>".$topic->getUser()."</p>";
            }
        }
?>

    </div>
    <h3>Posts created by this user</h3>

    <div class="postsByUser">

        <?php

        if($posts == NULL){
        ?>
            <p>This user hasn't posted yet</p>

        <?php
        } else {
            foreach($posts as $post){
                echo "<p>".$post->getContent()."</p>";
                echo "<p>".$post->getCreationDate()."</p>";
                echo "<p>".$post->getUser()."</p>";
            }
        }
            ?>
    <button><a href='index.php?ctrl=admin&action=listUsers'>Back to users</a></button>
    </div>
