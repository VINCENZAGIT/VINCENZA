<?php
namespace App\Repositories;

use App\Models\Usuario;
use App\Config\Database;

class UsuarioRepository {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function findAll() {
        $query = "SELECT id, nome, email FROM usuarios ORDER BY nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $usuarios = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setNome($row['nome']);
            $usuario->setEmail($row['email']);
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function findById($id) {
        $query = "SELECT id, nome, email FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setNome($row['nome']);
            $usuario->setEmail($row['email']);
            return $usuario;
        }

        return null;
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $usuario = new Usuario();
            $usuario->setId($row['id']);
            $usuario->setNome($row['nome']);
            $usuario->setEmail($row['email']);
            $usuario->setSenha($row['senha']);
            return $usuario;
        }

        return null;
    }

    public function save(Usuario $usuario) {
        if ($usuario->getId()) {
            $query = "UPDATE usuarios SET nome = :nome, email = :email";
            
            if (!empty($usuario->getSenha())) {
                $query .= ", senha = :senha";
            }
            
            $query .= " WHERE id = :id";
        } else {
            $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        }

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":email", $usuario->getEmail());

        if ($usuario->getId()) {
            if (!empty($usuario->getSenha())) {
                $stmt->bindParam(":senha", $usuario->getSenha());
            }
            $stmt->bindParam(":id", $usuario->getId());
        } else {
            $stmt->bindParam(":senha", $usuario->getSenha());
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}