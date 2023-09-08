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
            
            if(isset($_POST["submitRegistration"])){

                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAILL, SPECIAL_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($username && $email && $password){

                    $userManager = new UserManager();

                    if(!$userManager->findOneByEmail($email)){
                        if(!$userManager->findOneByUser($username)){
                            if($password == $confirmPassword){
                                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                                
                                $userManager->add(["username" => $username, "email" =>$email, "password" => $passwordHash]);
                                header("Location: index.php?ctrl=security&action=login");
                            }
                        }
                    }
                }
            }
            return [
                    "view" => VIEW_DIR."security/registration.php", //Interaction avec la vue
                     "data" => [
                        "registration" => $userManager->registration()
                    ]
            ];
        }

    }