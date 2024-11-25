<?php

    class Database {
        private $host = DB_HOST;
        private $dbname = DB_NAME;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
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
