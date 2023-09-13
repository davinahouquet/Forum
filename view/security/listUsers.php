<?php $users = $result["data"]['users'];



    foreach($users as $user){
        echo $user->getUsername();
    }