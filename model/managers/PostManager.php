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

        public function updatePost($id, $content){
            // var_dump($id);
            // var_dump($content); die;
            $sql = "UPDATE post
                    SET content = :content
                    WHERE id_post = :id";
                    
            DAO::select($sql, [
                'content'=>$content,
                'id'=>$id,
            ]);
            
        }

        public function listPostsByUser($id){
            
            parent::connect();

            $sql = "SELECT * FROM ". $this->tableName." WHERE user_id = :id ORDER BY creationDate DESC";
            
            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]),
                $this->className
            );
        }
    
    }