<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;

    class TopicController extends AbstractController implements ControllerInterface{

        public function index(){
          
            
        }
        
        public function listTopicsByCategory($id){
            
            $topicManager = new TopicManager();
            
            // return [
                //     "view" => VIEW_DIR."forum/listTopics.php", //Comment le controller interagit avec la vue
                //     "data" => [
                //         "topics" => $topicManager->findAll(["creationdate", "ASC"]) //la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application)
                //     ]
                // ];

                return [
                        "view" => VIEW_DIR."forum/listTopics.php", //Interagiction avec la vue
                         "data" => [
                            "topics" => $topicManager->topicByCategory($id)
                        ]
                ];
        }

    }