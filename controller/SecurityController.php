<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface{

        public function index(){
          
        }
        
        public function registration(){
            
            $userManager = new UserManager();

                return [
                        "view" => VIEW_DIR."security/registration.php", //Interaction avec la vue
                         "data" => [
                            "registration" => $userManager->signIn()
                        ]
                ];
        }

    }