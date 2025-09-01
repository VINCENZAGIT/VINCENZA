<?php
namespace App\Config;

$this->conn = new \PDO(
    "mysql:host=" . $this->host . ";port=3307;dbname=" . $this->db_name, // a porta do meu sql é 3307 ok raul
    $this->username,
    $this->password
);

class Database {
    private $host = "localhost";   // Servidor do MySQL (normalmente "localhost")
    private $db_name = "vincenza";  // Nome do banco de dados que você criou
    private $username = "root";    // Usuário do MySQL (geralmente "root" no XAMPP/WAMP)
    private $password = "mobilelegends@";        // Senha do MySQL (no XAMPP geralmente é vazio; no Laragon também; no MySQL Workbench pode ser "root")

    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new \PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
