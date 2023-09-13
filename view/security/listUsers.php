<?php $users = $result["data"]['users'];



    foreach($users as $user){

?>
        <p><b>Username : <?= $user->getUsername()?></b></p>
        <p>Email : <?= $user->getemail()?></p>
        <p><i>Register Date : <?= $user->getRegisterDate()?></i></p>

        <button style="background :red"><a href="">Ban</a></button>
        <button style="background :red"><a href="">Delete</a></button>
<?php
    }
