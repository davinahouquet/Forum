<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategoryManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php", //Comment le controller interagit avec la vue
                "data" => [
                    "topics" => $topicManager->findAll(["creationdate", "DESC"]) //la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application)
                ]
            ];
        
        }

        public function listCategories(){
          

            $categoryManager = new CategoryManager();
 
             return [
                 "view" => VIEW_DIR."forum/listCategories.php", //Comment le controller interagit avec la vue
                 "data" => [
                     "categories" =>  $categoryManager->findAll(["categoryName", "DESC"]) //la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application)
                 ]
             ];
         
         }

        

    }
