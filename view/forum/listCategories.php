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
        if(App\Session::isAdmin()){
?>
        <button>+ADD CATEGORY</button>

        <p>Only admins can add categories ☺</p>
        
        <form enctype="multipart/data" action="index.php?ctrl=post&action=addCategory" method="post">

            <label for="category">Category</label>
            <input type="text" name="category">

            <input type="submit" name="submitCategory">

        </form>
<?php
        }
