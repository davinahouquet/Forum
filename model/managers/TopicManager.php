<?php //Tous les Managers (dossier Model) hériteront de la classe Manager (dossier App) pour bénéficier des méthodes pré-établies : findAll, findOneById, ...
    
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){

            parent::connect();
        }

        public function topicByCategory($id){

            parent::connect();

            $sql = "SELECT * FROM ".$this->tableName." WHERE category_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ['id'=>$id]),
                $this->className
            );
        }


        // public function listTopicsHome(){

        //     parent::connect();

        //     $sql = "SELECT * from".$this->tableName." ORDER BY creationDate DESC";

        //     return $this->getMultipleResults(
        //         DAO::select($sql),
        //         $this->className
        //     );
        // }
        
        // public function addTopic(){

        //     parent::connect();

        //     $sql = "INSERT INTO". $this->tableName ."(id_topic, closed, NAME, title, creationDate, category_id, user_id) VALUES ('8', '0', 'Test', 'Test', '2023-09-08', '1', '1')";

        //     return $this->getMultipleResults(
        //         DAO::select($sql, ['id'=>$id]),
        //         $this->className
        //     );

        // }
        
    }