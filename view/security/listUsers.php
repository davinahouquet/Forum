<?php $users = $result["data"]['users'];?>

    <h1>Users :</h1>
<?php

    foreach($users as $user){

?>
        <p><b>Username : <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p><i>Register Date : <?= $user->getRegisterDate()?></i></p>

        <button style="background :rgb(113, 213, 232)"><a href="index.php?ctrl=user&action=listPostsAndTopicsByUser&id=<?= $user->getId()?>">See topics and posts</a></button>
        <button style="background :rgb(203, 8, 40)"><a href="index.php?ctrl=user&action=ban&id=<?= $user->getId() ?>">Ban</a></button>
        <button style="background :red"><a href="">Delete</a></button>
<?php
    }
