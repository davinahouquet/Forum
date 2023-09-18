<?php

$categories = $result["data"]['categories']; //récupère les données envoyées par le controller
    
?>
    <h1>Categories</h1>
    
    <?php
        
        foreach($categories as $category){
            ?>
    <div class="categories">
            <p><b><a href="index.php?ctrl=topic&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?=$category->getCategoryName()?></a></b></p>
            <!-- <p>Nb posts</p> -->

        <?php
            if(!isset($_SESSION['user'])){
                ?>
                </div>
                <?php
            } else {
            if(App\Session::isAdmin()){
                ?>
            
                <button style="background :rgb(203, 8, 40)"><a href="index.php?ctrl=category&action=deleteCategory&id=<?= $category->getId() ?>">Delete X</a></button>
            </div>
                <?php

            }
        ?>
            
            <?php

}
}
if(App\Session::isAdmin()){
    ?>
    <!-- </div> -->
    <!-- <div class="category-form-container"> -->
            <button id="showCategoryFormButton">+ADD CATEGORY</button>
            <br><p>(Only admins can add categories ☺)</p>

            <div class="category-form" id="categoryForm" style="display: none;">
                
                <form enctype="multipart/data" action="index.php?ctrl=category&action=addCategory" method="post">
        
                    <label for="category">Category</label>
                    <input type="text" name="category">
        
                    <input type="submit" name="submitCategory">
        
                </form>
<!-- </div> -->
    <?php
            }
    ?>
            <!-- </div> -->
    <!-- </div> -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var showCategoryFormButton = document.getElementById('showCategoryFormButton');
            var categoryForm = document.getElementById('categoryForm');

            if (showCategoryFormButton && categoryForm) {
                showCategoryFormButton.addEventListener('click', function () {
                    // Afficher le formulaire en changeant le style display
                    categoryForm.style.display = 'block';
                });
            }
        });
    </script>
