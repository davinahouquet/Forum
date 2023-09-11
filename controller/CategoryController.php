<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategoryManager;
    
    class CategoryController extends AbstractController implements ControllerInterface{

        public function index(){
         
        }       

        public function listCategories(){

            $categoryManager = new CategoryManager();
    
            return [
                "view" => VIEW_DIR."forum/listCategories.php", //Comment le controller interagit avec la vue
                "data" => [
                    "categories" =>  $categoryManager->findAll(["categoryName", "ASC"]) //la méthode "findAll" est une méthode générique qui provient de l'AbstractController (dont hérite chaque controller de l'application, il ne faut pas la modifier) Seuls sont à modifier les attributs dans le tableau en fonction des besoins.
                ]
            ];   
        }

        public function addCategory(){

            $categoryManager = new CategoryManager();

            // if($_SESSION['user'] == 'admin'){
                // if($this->isAdmin()){
            if($_SESSION['user']->isAdmin()){

                if(isset($_POST['submitCategory'])){
                    
                    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                    if($category){
                        
                        $categoryManager->add(["categoryName" => $category]);

                        $this->redirectTo("topic", "listTopicsByCategory", $id);
                        // header("Location: index.php?ctrl=topic&action=listTopicsByCategory&id=$id");
                    }
                    return [
                        "view" => VIEW_DIR. "forum/listCategory.php"
                    ];
                }

            }
        }
    }
