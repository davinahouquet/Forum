<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class UserController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }
        
        public function userProfile($id){


// SELECT * FROM post
// where user_id = 11
// ORDER BY creationDate DESC

            return [
                "view" => VIEW_DIR. "forum/profile.php",
            ];
        }
        // public function isUserConnected($id){

        //     $userManager = new UserManager();
        //     $topicManager = new TopicManager();

        //     if($_SESSION['user'] !== $topic['user'])

        //     return [
        //         "view" => VIEW_DIR."security/updatePost.php", //Interaction avec la vue
        // ];

        // }
    }
    