<?php
    $topics = $result['data']['topics'];
    $posts = $result['data']['posts'];
?>
    <h1> Welcome to your profile <?=  App\Session::getUser()->getUsername() ?> !</h1>

        <?php
            if(App\Session::isAdmin()){
                echo "<button>Name another admin</button>";
                echo "<button>Edit rules</button>";
            }
        ?>
    <h2>Your topics :</h2>

    <?php
        foreach($topics as $topic){
    ?>
           <p><?= $topic->getName() ?></p>
    <?php
        }
    ?>
    <h3>Your posts :</h3>

    <?php
        foreach($posts as $post){
    ?>
           <p><?= $post->getContent() ?></p>
    <?php
        }
    ?>