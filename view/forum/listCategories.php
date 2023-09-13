<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>

<h1>Categories</h1>
<?php

foreach($categories as $category){
    ?>
    <p><a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?=$category->getCategoryName()?></a></p>
    <?php
}

    if(isset($_SESSION['user']) && $_SESSION['user'] == 'ROLE_ADMIN'){
?>
    <button>+ADD CATEGORY</button>

    <form enctype="multipart/data" action="index.php?ctrl=post&action=addCategory&id=<?=$id?>" method="post">

        <label for="category">Category</label>
        <input name="category">

        <input type="submit" name="submitCategory">

    </form>
<?php
    }
