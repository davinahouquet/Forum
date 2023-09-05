<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>

<h1>Categories</h1>

<?php
foreach($categories as $category ){

    ?>
    <p><?=$category->getCategoryName()?></p>
    <?php
}


  
