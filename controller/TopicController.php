<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;

    class TopicController extends AbstractController implements ControllerInterface{

        public function index(){
            
        }
        
        public function listTopicsByCategory($id){
            

            if (isset($_POST['submitTopic'])){

                header("Location: index.php?ctrl=topic&action=addTopic");
                //Rediriger si une action est effectuée
            }

            //Donc on ira pas jusqu'au contenu en dessous

            $topicManager = new TopicManager();

                return [
                        "view" => VIEW_DIR."forum/listTopics.php", //Interaction avec la vue
                         "data" => [
                            "topics" => $topicManager->topicByCategory($id)
                        ]
                ];
        }

        public function addTopic($id){

            $topicManager = new TopicManager();

            if(isset($_SESSION['user'])){
                
                if(isset($_POST['submitTopic'])){
                    
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                    if($name && $question){
                        // $topicManager->add(["id_topic" => $id, "closed" => $closed, "NAME" => $name, "title" =>$title, "creationDate" => $creationDate, "category_id" => $category, "user_id" => $user()]);
                        $topicManager->add(["name" => $name, "question" =>$question, "category_id" => $id, "user_id" => 11]);
                        header("Location: index.php?ctrl=topic&action=listTopicsByCategory&id=$id");
                    }
                        // Pas besoin de l'id_topic puisque c'est en auto increment dans la base de données, l'id en cours est celui de la categorie, creationDate a déjà une valeur par défaut
                    return [
                        "view" => VIEW_DIR. "forum/listTopics.php"
                    ];
                }

            }
            
        }

        public function updateTopic($id){

            $topicManager = new TopicManager();

            if(isset($_POST['updateTopic'])){

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $question = filter_input(INPUT_POST, "question", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// var_dump($_POST);die;
                if($name && $question){

                    $topicManager->updateTopic($id);
// var_dump($_POST);die;
                    $this->redirectTo('forum');
                } else {
                    echo "error";
                    $this->redirectTo('forum');
                }
            }
                return [
                        "view" => VIEW_DIR."forum/updateTopic.php", //Interaction avec la vue
                        "data" => [
                            "topics" => $topicManager->findOneById($id)
                        ]
                ];
        }

        public function deleteTopic($id){

            $topicManager = new TopicManager();

            $topicManager->delete($id);

            $this->redirectTo('forum');
        }
    }