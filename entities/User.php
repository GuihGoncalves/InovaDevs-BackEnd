<?php
    namespace Entities;

    class User {
        private $user_id;
        private $name;
        private $cpf;
        private $phone;
        private $email;
        private $password;
        private $user_type;

        public function getUser_id() { 
            return $this->user_id; 
        }
        
        public function setUser_id($user_id) { 
            $this->user_id = $user_id; 
        }

        public function getName() { 
            return $this->name; 
        }
        
        public function setName($name) { 
            $this->name = $name; 
        }

        public function getCpf() { 
            return $this->cpf; 
        }
        public function setCpf($cpf) { 
            $this->cpf = $cpf; 
        }

        public function getPhone() { 
            return $this->phone; 
        }

        public function setPhone($phone) { 
            $this->phone = $phone; 
        }

        public function getEmail() { 
            return $this->email; 
        }

        public function setEmail($email) { 
            $this->email = $email; 
        }

        public function getPassword() { 
            return $this->password; 
        }
        public function setPassword($password) { 
            $this->password = $password; 
        }

        public function getUser_type() { 
            return $this->user_type; 
        }
        public function setUser_type($user_type) { 
            $this->user_type = $user_type; 
        }
    }
?>
