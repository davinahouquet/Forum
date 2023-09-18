<?php
    $topics = $result["data"]['topics'];
    $categorie = $result["data"]['categorie'];
?>

<h1><?=$categorie->getCategoryName()?></h1>
<h2>Post related</h2>

<?php
    //Formulaire d'ajout de topic
    if(isset($_SESSION['user'])){

        if($topics == null){

            echo "0 topic yet";
        ?>
        <div class="form-add">

            <form action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">

            <label for="name">Name</label>
            <input type="text" name="name" id="name">

            <label for="question">Question</label>
            <textarea name="question" id="question"></textarea>

            <input type="submit" name="submitTopic">
            
        </form>

        </div>
        <?php
        } else {

?>

<div class="form-add">
    <h3>Add a topic</h3>
    
            <form action="index.php?ctrl=topic&action=addTopic&id=<?= $id ?>" method="post" enctype="multipart/form-data">
    
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
    
                <label for="question">Question</label>
                <textarea name="question" id="question"></textarea>
    
                <input type="submit" name="submitTopic">
                
            </form>

        </div>

    <?php
    }
}
if($topics == null){
    echo " ";
} else {

    foreach($topics as $topic){
        ?>
        <h2><a href="index.php?ctrl=post&action=listPostsByTopics&id=<?= $topic->getId() ?>"><?=$topic->getName()?></a></h2>
        <p><?=$topic->getQuestion()?></p>
        <p><?=$topic->getCreationDate()?></p>

        <?php
        if(App\Session::isAdmin()){
        ?>
            <button><a href="index.php?ctrl=topic&action=deleteTopic&id=<?=  $topic->getId() ?>">Delete</a></button>
<?php
            if($topic->getClosed() !== 1){
?>
                <button><a href="index.php?ctrl=topic&action=closeTopic&id=<?=  $topic->getId() ?>"  id="closeTopic">Close Topic</a></button>
<?php
            } else {
                echo "Topic closed";
 ?>
                <button><a href="index.php?ctrl=topic&action=openTopic&id=<?=  $topic->getId() ?>"  id="closeTopic">Open Topic</a></button>
<?php
            }
       
        } elseif(App\Session::getUser() == $topic->getUser()){
?>
            <button><a href="index.php?ctrl=topic&action=updateTopic&id=<?=  $topic->getId() ?>">Update</a></button>
<?php
            if($topic->getClosed() !== 1){
?>
                <button><a href="index.php?ctrl=topic&action=closeTopic&id=<?=  $topic->getId() ?>">Close Topic</a></button>
<?php
            } else {
                echo "Topic closed";
            }
?>
            <button><a href="index.php?ctrl=topic&action=deleteTopic&id=<?=  $topic->getId() ?>">Delete</a></button>

        <?php
        } else {
            ?>
            <button>Report this topic</button>
            <?php
        }
    }
}
?>