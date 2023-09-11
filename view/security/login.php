<?php

?>

    <h1>Login</h1>

    <form enctype=mutlitpart/form-data action="index.php?ctrl=security&action=login" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <input type="submit" name="submitLogin">

    </form>

    <?php 
    
    // var_dump($_SESSION["username"]);
    // var_dump($_SESSION["user"]);