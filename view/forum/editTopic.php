<?php
?>

<h1>Edit a new topic</h1>

<form action="index.php?ctrl=topic&action=addTopic" method="post" enctype="multipart/form-data">

    <label for="name">Name</label>
    <input type="text" name="name">

    <label for="title">Title</label>
    <input type="text" name="title">

    <input type="submit" name="submitTopic">
    
</form>