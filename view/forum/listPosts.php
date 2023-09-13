<?php
        $posts = $result['data']['posts'];
        $topic = $result['data']['topic'];
?>
        <h1><?= $topic->getName()?></h1>
        <h2><?= $topic->getQuestion()?></h2>

<div class="posts-container">

<?php
        if($posts == null){
                echo "<p>0 POST</p>";
        } else {

        foreach($posts as $post){
?>
        <p><?=$post->getContent()?></a></p>
        <p><?=$post->getCreationDate()?></p>
        <p><?=$post->getUser()->getUsername()?></a></p>
<?php
        if(isset($_SESSION['user'])){
                
                if(App\Session::getUser() == $post->getUser()){
                        // var_dump($_SESSION['user']);die;
?>
                        <button><a href="index.php?ctrl=post&action=updatePost&id=<?=  $post->getId() ?>">Update</a></button>
                        <button><a href="index.php?ctrl=post&action=deletePost&id=<?=  $post->getId() ?>">Delete</a></button>
<?php
                } else {
                        ?><button>Report this post</button><?php
                }
        }
}
}
?>

</div>

<?php
        if(isset($_SESSION['user'])){
?>              
                <button>+ADD POST</button>

                <form enctype="multipart/data" action="index.php?ctrl=post&action=addPost&id=<?=$id?>" method="post">

                        <label for="content">Content</label>
                        <textarea name="content" id="content"></textarea>

                <input type="submit" name="submitPost">

        </form>
<?php
        }
        