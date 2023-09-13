<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class HomeController extends AbstractController implements ControllerInterface{

        public function index(){

        }

        public function listUsers(){
            // die();
            $this->restrictTo("ROLE_ADMIN");

            $userManager = new UserManager();
            
            $users =  $userManager->findAll(['registerDate', 'DESC']);

            return [
                "view" => VIEW_DIR."security/listUsers.php",
                "data" => [
                    "users" => $users
                ]
            ];
        }
    }