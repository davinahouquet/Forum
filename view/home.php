<?php
    $topics = $result['data']['topics'];
?>
    <h1>WELCOME !</h1>
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

<?php
    }

?>
<h2>Our lasts topics :</h2>
<?php

    foreach($topics as $topic){
    
?>
        <h3><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?= $topic->getName() ?></a></h3>
        <p><?= $topic->getQuestion() ?></p>
        <p><?= $topic->getCreationDate() ?></p>
        <p><i><?= $topic->getUser() ?></i></p>

<?php
    }

