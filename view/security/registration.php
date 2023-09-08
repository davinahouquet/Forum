<?php

?>

    <h1>Registration</h1>

    <form enctype=mutlitpart/form-data action="index.php?ctrl=user&action=signIn" method="post">
        
        <label for="username">Username</label>
        <input type="text" name="username">

        <label for="password">Password</label>
        <input type="password" name="password">

        <label for="password">Confirm your password</label>
        <input type="password" name="password">

        <input type="submit" name="submitRegistration">

    </form>