<?php

class db {

    private $host = 'localhost';
    private $db = 'restful_php_api';
    private $user = 'root';
    private $password = '';
    private $conn;

    public function connect () {
        $conn = $this->conn;
        $conn = null;

        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=UTF8";
            $conn = new PDO($dsn, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }

        return $conn;
    }
}
?>

