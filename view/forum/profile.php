<?php
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>
    <h1> Welcome to your profile <?=  App\Session::getUser()->getUsername() ?> !</h1>
    <!-- <button><a hreef="#">Change password</a></button> -->

        <?php
            // if(App\Session::isAdmin()){
                // echo "<button>Name another admin</button>";
                // echo "<button>Edit rules</button>";
            // }
        ?>
    <h2>Your topics :</h2>

    <?php

    if(!isset($topics)){
        
        ?>
            <p>0 topic posted</p>

        <?php

    } else {

        foreach($topics as $topic){
        ?>

           <p><?= $topic->getName() ?></p>

        <?php

        }
    }
    ?>
    <h3>Your posts :</h3>

    <?php

        if(!isset($posts)){
    ?>
            <p>0 topic posted</p>

    <?php
    } else {

        foreach($posts as $post){
    ?>
           <p><?= $post->getContent() ?></p>
    <?php
        }
    }
    ?>