<?php
    $topics = $result['data']['topics'];

?>

    <div class="welcome">
        
        <h1>WELCOME!</h1>

        <div class="connexion">

            <?php

                if(!isset($_SESSION['user'])){
            ?>
                        <h2>Login</h2>
                            
                        <form enctype=mutlitpart/form-data action="index.php?ctrl=security&action=login" method="post">
                            
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                                
                            <label for="password">Password</label>
                            <input type="password" name="password" required>
                            
                            <input type="submit" name="submitLogin">
                        </form>
                        <p>
                            You don't have an account ? <b><a href="index.php?ctrl=security&action=registration" class="home-connexion">SIGN IN</b></a>
                        </p>
        </div>
                        <?php
                } else {
                    echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
                }
                
                ?>
    </div>

<h2 class="h2-home">Our lasts topics :</h2>

<div class="topics-container">
    <?php
    foreach($topics as $topic){
        ?>
        <div class="topic">
            <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
                <p><?=$topic->getQuestion()?></p>
                <p><?=$topic->getCreationDate()?></p>
            
                <?php
            //Si c'est un admin qui est connecté...
            if(App\Session::isAdmin()){
            ?>
                <button><a href="index.php?ctrl=topic&action=deleteTopic&id=<?=  $topic->getId() ?>">Delete</a></button>
                <?php
                if($topic->getClosed() !== 1){
                    ?>
                    <button><a href="index.php?ctrl=topic&action=closeTopic&id=<?=  $topic->getId() ?>"  id="closeTopic">Close Topic</a></button>
                    <?php
                } else {
                    echo "Topic closed";
                    ?>
                    <button><a href="index.php?ctrl=topic&action=openTopic&id=<?=  $topic->getId() ?>"  id="closeTopic">Open Topic</a></button>
            <?php
                }
        
            //Ou si c'est l'auteur du topic qui est connecté...
            } elseif(App\Session::getUser() == $topic->getUser()){
                ?>
                <button><a href="index.php?ctrl=topic&action=updateTopic&id=<?=  $topic->getId() ?>">Update</a></button>
                <?php
                if($topic->getClosed() !== 1){
                    ?>
                    <button><a href="index.php?ctrl=topic&action=closeTopic&id=<?=  $topic->getId() ?>">Close Topic</a></button>
                    <?php
                } else {
                    echo "Topic closed";
                }
            ?>
                <button><a href="index.php?ctrl=topic&action=deleteTopic&id=<?=  $topic->getId() ?>">Delete</a></button>
                
                <?php
            //Sinon...
            } else {
                ?>
                <button>Report this topic</button>
        <!-- </div> -->

            <?php
            }
            ?>
            </div>
<!-- </div> -->
<?php
    }
?>
</div>
