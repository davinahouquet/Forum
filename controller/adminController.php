<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class HomeController extends AbstractController implements ControllerInterface{

        public function index(){

        }

        public function users(){
            $this->restrictTo("ROLE_USER");

            $userManager = new UserManager();
            
            $users =  $userManager->findAll(['registerDate', 'DESC']);

            return [
                "view" => VIEW_DIR."security/users.php",
                "data" => [
                    "users" => $users
                ]
            ];
        }
    }