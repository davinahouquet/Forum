<?php
    $topics = $result['data']['topics'];
?>
    <h1> Welcome to your profile <?=  App\Session::getUser()->getUsername() ?> !</h1>


    <h2>Your topics :</h2>

    <?php
        foreach($topics as $topic){
            echo $topic->getName();
        }
    ?>
    <h3>Your posts :</h3>