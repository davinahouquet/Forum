<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $content;
        private $creationDate;
        private $user;
        private $topic;

        public function __construct($data){         
            $this->hydrate($data);        
        }
        
        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }
        
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;
            
            return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getContent()
        {
            return $this->content;
        }
        
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setContent($content)
        {
            $this->content = $content;
            
            return $this;
        }

        public function getCreationDate(){
            $formattedDate = $this->creationDate->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setCreationDate($date){
            $this->creationDate = new \DateTime($date);
            return $this;
        }

        public function getUser(){
    
            return $this;
        }

        public function setUser($user){

            $this->user = $user;

            return $this;
        }

        public function getTopic(){
    
            return $this->topic;
        }

        public function setTopic($topic){

            $this->topic = $topic;

            return $this;
        }
    }
