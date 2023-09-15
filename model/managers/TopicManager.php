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

        public function topicsByCategory($id){

            parent::connect();

            $sql = "SELECT * FROM ".$this->tableName." WHERE category_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ['id'=>$id]),
                $this->className
            );
        }

        public function updateTopic($id, $name, $question){

            parent::connect();

            $sql = "UPDATE topic 
                    SET name = :name, question = :question
                    WHERE id_topic = :id";

                DAO::update($sql, [
                    'id'=>$id,
                    'name'=>$name,
                    'question'=> $question,
                ]);
        }

        public function listTopicsHome(){

            parent::connect();

            $sql = "SELECT * from ".$this->tableName." ORDER BY creationDate DESC";

            return $this->getMultipleResults(
                DAO::select($sql),
                $this->className
            );
        }
        
        public function listTopicsByUser($id){

            parent::connect();

            $sql = "SELECT * FROM ". $this->tableName." WHERE user_id = :id ORDER BY creationDate DESC";
            
            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]),
                $this->className
            );
        }

        public function closeTopic($id){

            parent::connect();

            $sql = "UPDATE ". $this->tableName." SET closed = '1' WHERE id_topic = :id";

            DAO::update($sql, ['id'=>$id]);
        }
        
        public function deleteTopic($id){

            parent::connect();

            $sql = "DELETE FROM post WHERE topic_id = :id";

            DAO::delete($sql, ['id'=>$id]);
        }
    }