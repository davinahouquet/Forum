<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PostManager;
    // use Model\Managers\TopicManager;

    class PostController extends AbstractController implements ControllerInterface{

        public function index(){
          
            
        }
        
        public function listPostsByTopics($id){
            
            $postManager = new PostManager();

                return [
                        "view" => VIEW_DIR."forum/listPosts.php", //Interagiction avec la vue
                         "data" => [
                            "posts" => $postManager->postsByTopic($id)
                        ]
                ];
        }

        public function detailPosts($id){

            $postManager = new PostManager();

            return [
                "view" => VIEW_DIR."forum/detailPost.php",
                "data" => [
                    "post" => $postManager->detailPost($id)
                ]
            ];
        }
    }