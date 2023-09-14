<?php $users = $result['data']['users'];?>

    <h1>Users :</h1>
<?php

    foreach($users as $user){

?>
        <p>Username :<b> <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p>Register Date : <i><?= $user->getRegisterDate()?></i></p>

        <button style="background :rgb(113, 213, 232)"><a href="index.php?ctrl=user&action=listTopicsAndPostsByUser&id=<?= $user->getId()?>">See topics and posts</a></button>
        <button style="background :rgb(203, 8, 40)"><a href="index.php?ctrl=admin&action=ban&id=<?= $user->getId() ?>">Ban</a></button>

        <!-- Mettre une condition, si banni afficher ce bouton -->
        <button style="background :rgb(19, 131, 102)"><a href="index.php?ctrl=admin&action=deban&id=<?= $user->getId() ?>">Deban</a></button>
<?php
    }
