<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;

    class UserController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }
        
        public function userProfile($id){

            return [
                "view" => VIEW_DIR. "forum/profile.php",
            ];
        }


        public function listTopicsAndPostsByUser($id){
            return [
                "view" => VIEW_DIR."forum/listTopicsAndPostsUser.php"
                ];
        }

        //Lister les topics d'un utilisateur
        public function listTopicsByUser($id){

            $topicManager = new TopicManager;
            
            return [
                "view" => VIEW_DIR."forum/listTopicsAndPostsUser.php", //Interaction avec la vue
                "data" => [
                    "topics" => $topicManager->listTopicsByUser($id)
                    ]
                ];
        }
            
        //Lister les posts d'un utilisateur
        public function listPostsByUser($id){
                
            $postManager = new PostManager;

            return [
                "view" => VIEW_DIR."listTopicsAndPostsUser.php",
                "data" => [
                    "posts" =>$postManager->listPostsByUser($id)
                    ]
            ];

        }
}