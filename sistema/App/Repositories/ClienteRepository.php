<?php
namespace App\Repositories;

use App\Models\Cliente;
use App\Config\Database;

class ClienteRepository {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function findAll() {
        $query = "SELECT * FROM clientes ORDER BY nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clientes = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cliente = new Cliente();
            $cliente->setId($row['id']);
            $cliente->setNome($row['nome']);
            $cliente->setEmail($row['email']);
            $cliente->setTelefone($row['telefone']);
            $cliente->setEndereco($row['endereco']);
            $clientes[] = $cliente;
        }

        return $clientes;
    }

    public function findById($id) {
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $cliente = new Cliente();
            $cliente->setId($row['id']);
            $cliente->setNome($row['nome']);
            $cliente->setEmail($row['email']);
            $cliente->setTelefone($row['telefone']);
            $cliente->setEndereco($row['endereco']);
            return $cliente;
        }

        return null;
    }

    public function save(Cliente $cliente) {
        if ($cliente->getId()) {
            $query = "UPDATE clientes SET nome = :nome, email = :email, 
                      telefone = :telefone, endereco = :endereco WHERE id = :id";
        } else {
            $query = "INSERT INTO clientes (nome, email, telefone, endereco) 
                      VALUES (:nome, :email, :telefone, :endereco)";
        }

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $cliente->getNome());
        $stmt->bindParam(":email", $cliente->getEmail());
        $stmt->bindParam(":telefone", $cliente->getTelefone());
        $stmt->bindParam(":endereco", $cliente->getEndereco());

        if ($cliente->getId()) {
            $stmt->bindParam(":id", $cliente->getId());
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}