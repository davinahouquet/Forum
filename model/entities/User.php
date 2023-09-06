<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $username;
        private $role;
        private $email;
        private $password;
        private $registerDate;

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
        public function getUsername()
        {
            return $this->username;
        }
        
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
            $this->username = $username;
            
            return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getRole()
        {
            return $this->role;
        }
        
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setRole($role)
        {
            $this->role = $role;
            
            return $this;
        }

        public function getEmail(){
    
            return $this;
        }

        public function setEmail($email){

            $this->email = $email;

            return $this;
        }

        public function getPassword(){
    
            return $this;
        }

        public function setPassword($password){

            $this->password = $password;

            return $this;
        }

        public function getRegisterDate(){
    
            return $this;
        }

        public function setRegisterDate($registerDate){

            $this->registerDate = $registerDate;

            return $this;
        }
    }
