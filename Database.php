<?php
    class Database {
        private $host = getenv('DB_HOST');
        private $db = getenv('DB_NAME');
        private $user = getenv('DB_USER');
        private $password = getenv('DB_PASSWORD');
        public $conn;

        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("pgsql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "--------------------------------------------------------------------------------
-------------------------------- ERRO NA CONEXÃO -------------------------------
--------------------------------------------------------------------------------\n\n". $exception->getMessage();
            }

            return $this->conn;
        }
    }
?>
