<?php

?>

<div class="connexion">
    <h1>Login</h1>
    <form enctype=mutlitpart/form-data action="index.php?ctrl=security&action=login" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <input type="submit" name="submitLogin">

    </form>
    <p>You don't have an account ? <a href="index.php?ctrl=security&action=registration">Join us !</a></p>
</div>
    <?php 
    
    // var_dump($_SESSION["username"]);
    // var_dump($_SESSION["user"]);