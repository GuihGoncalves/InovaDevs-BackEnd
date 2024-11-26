<?php

class Database {
    private $host = 'dpg-cslvm98gph6c73aanj0g-a.oregon-postgres.render.com';
    private $dbname = 'inovadevs_db';
    private $user = 'guilherme';
    private $password = 'QZ1KgXDFpoBiECN3TzNljHFhEB8wVtwR';
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

/*class Database {
    private $host;
    private $db;
    private $user;
    private $password;
    public $conn;

    public function __construct() {
        $this->host = getenv('DB_HOST');
        $this->db = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("pgsql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "--------------------------------------------------------------------------------
-------------------------------- ERRO NA CONEXÃO -------------------------------
--------------------------------------------------------------------------------\n\n" . $exception->getMessage();
        }

        return $this->conn;
    }
}*/
?>
