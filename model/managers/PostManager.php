<?php
    
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){

            parent::connect();
        }

        public function postsByTopic($id){

            parent::connect();

            $sql = "SELECT * FROM ".$this->tableName." WHERE topic_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql, ['id'=>$id]),
                $this->className
            );
        }

        public function detailPost($id){

            parent::connect();

            $sql = "SELECT * FROM ".$this->tableName." WHERE topic_id = :id";

            return $this->findOneById(
                DAO::select($sql, ['id'=>$id]),
                $this->className
            );
        }
    }