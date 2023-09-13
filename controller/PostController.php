<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PostManager;
    use Model\Managers\TopicManager;

    class PostController extends AbstractController implements ControllerInterface{

        public function index(){
          
            
        }
        
        public function listPostsByTopics($id){
            
            $postManager = new PostManager();
            $topicManager = new TopicManager();

                return [
                        "view" => VIEW_DIR."forum/listPosts.php", //Interagiction avec la vue
                         "data" => [
                            "posts" => $postManager->postsByTopic($id),
                            "topic" => $topicManager->findOneById($id)
                        ]
                ];
        }

        public function addPost($id){

            $postManager = new PostManager();

            if(isset($_POST['submitPost'])){
                
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){

                    $postManager->add(["content" => $content, "topic_id" => $id, "user_id" => 11]);
                    // $postManager->add(["content" => $content, "topic_id" => $id, "user_id" => $this->getUser()->getId()]);
                    header("Location: index.php?ctrl=post&action=listPostsByTopics&id=$id");

                }

                return [
                    "view" => VIEW_DIR. "forum/listPosts.php"
                ];

            }
        }

        public function updatePost($id){

            $postManager = new PostManager();
            
            // $topicManager = new TopicManager();
            
            if(isset($_POST['submitUpdatePost'])){
                // var_dump($_POST); die;
                // var_dump($content);
                
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){

                    $postManager->updatePost($id, $content);
                    // $postManager->add(["content" => $content, "topic_id" => $id, "user_id" => $this->getUser()->getId()]);
                    $this->redirectTo('forum');
                    // header("Location: index.php?ctrl=post&action=listPostsByTopics&id=$id");

                }
            }
                
                return [
                    "view" => VIEW_DIR."forum/updatePost.php", //Interaction avec la vue
                    "data" => [
                        "post" => $postManager->findOneById($id),
                        // "topic" => $topicManager->findOneById($id)
                    ]
            ];

        }

        public function deletePost($id){

            $postManager = new PostManager();

            $postManager->delete($id);

            $this->redirectTo('forum');
        }
    }