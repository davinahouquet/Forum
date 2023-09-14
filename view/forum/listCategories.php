<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>
    <h1>Categories</h1>
<?php

    foreach($categories as $category){
?>
    <p><a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?=$category->getCategoryName()?></a></p>

    <?php

if(App\Session::isAdmin()){
?>

    <button style="background :rgb(203, 8, 40)"><a href="index.php?ctrl=category&action=deleteCategory&id=<?= $category->getId() ?>">X</a></button>

<?php
}
    }
        if(App\Session::isAdmin()){
?>
        <button style="background :rgb(113, 213, 232)">+ADD CATEGORY</button>

        <p>Only admins can add categories ☺</p>
        
        <form enctype="multipart/data" action="index.php?ctrl=category&action=addCategory" method="post">

            <label for="category">Category</label>
            <input type="text" name="category">

            <input type="submit" name="submitCategory">

        </form>
<?php
        }

?>
<p>(Only admins can add categories ☺)</p>
