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

            $topic =  $topicManager->findOneById($id);

            if($topic) {
                return [
                    "metaDescription" => "Posts List order by Topics",
                        "view" => VIEW_DIR."forum/listPosts.php",
                         "data" => [
                            "posts" => $postManager->postsByTopic($id),
                            "topic" => $topic
                        ]
                ];
            } else {
                $msg = "This topic doesn't exist !";
                Session::addFlash('error', $msg);
                $this->redirectTo('forum');
            }
        }

        public function addPost($id){

            $postManager = new PostManager();

            $userId = Session::getUser()->getId();
            $userBan = Session::getUser()->getBan();

            if(isset($_POST['submitPost'])){
                
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){

                    if($userBan == "1"){
                        $msg = "You can't post, you are banned";
                        Session::addFlash('error', $msg);
                        
                        $this->redirectTo('posts', 'listPostsByTopics&id='.$id.'');
                        exit;

                    } else {
                       
                        $postManager->add(["content" => $content, "topic_id" => $id, "user_id" => $userId]);
                       
                        $msg = "Post added";
                        Session::addFlash('success', $msg);

                        header("Location: index.php?ctrl=post&action=listPostsByTopics&id=$id");
                    }


                }

                return [
                    "view" => VIEW_DIR. "forum/listPosts.php"
                ];

            }
        }

        public function updatePost($id){

            $postManager = new PostManager();
            
            
            if(isset($_POST['submitUpdatePost'])){
                
                $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($content){

                    $postManager->updatePost($id, $content);

                    $msg = "Post updated !";
                    Session::addFlash('success', $msg);
                    
                    $this->redirectTo('forum');
                    
                }
            }
                
                return [
                    "view" => VIEW_DIR."forum/updatePost.php",
                    "data" => [
                        "post" => $postManager->findOneById($id),
                        
                    ]
            ];

        }

        public function deletePost($id){

            $postManager = new PostManager();

            $postManager->delete($id);

            $msg = "Your post has been deleted";
            Session::addFlash('error', $msg);

            $this->redirectTo('forum');
            // $this->redirectTo('post', 'listPostsByTopics', $id);
        }


        
    }