<?php

?>

    <h1>Registration</h1>

    <form enctype=mutlitpart/form-data action="index.php?ctrl=security&action=registration" method="post">
        
        <label for="username">Username</label>
        <input type="text" name="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="confirmPassword">Confirm your password</label>
        <input type="password" name="confirmPassword" required>

        <input type="submit" name="submitRegistration">

    </form>

    <p>Already have an account ? <a href="index.php?ctrl=security&action=login">Log in</a> !</p>