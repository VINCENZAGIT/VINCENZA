<?php
namespace App\Repositories;

use App\Models\Carro;
use App\Config\Database;

class CarroRepository {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function findAll() {
        $query = "SELECT c.*, cl.nome as cliente_nome FROM carros c 
                  INNER JOIN clientes cl ON c.cliente_id = cl.id 
                  ORDER BY c.marca, c.modelo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $carros = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $carro = new Carro();
            $carro->setId($row['id']);
            $carro->setClienteId($row['cliente_id']);
            $carro->setMarca($row['marca']);
            $carro->setModelo($row['modelo']);
            $carro->setAno($row['ano']);
            $carro->setPlaca($row['placa']);
            $carros[] = $carro;
        }

        return $carros;
    }

    public function findById($id) {
        $query = "SELECT c.*, cl.nome as cliente_nome FROM carros c 
                  INNER JOIN clientes cl ON c.cliente_id = cl.id 
                  WHERE c.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $carro = new Carro();
            $carro->setId($row['id']);
            $carro->setClienteId($row['cliente_id']);
            $carro->setMarca($row['marca']);
            $carro->setModelo($row['modelo']);
            $carro->setAno($row['ano']);
            $carro->setPlaca($row['placa']);
            return $carro;
        }

        return null;
    }

    public function findByClienteId($cliente_id) {
        $query = "SELECT * FROM carros WHERE cliente_id = :cliente_id ORDER BY marca, modelo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->execute();

        $carros = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $carro = new Carro();
            $carro->setId($row['id']);
            $carro->setClienteId($row['cliente_id']);
            $carro->setMarca($row['marca']);
            $carro->setModelo($row['modelo']);
            $carro->setAno($row['ano']);
            $carro->setPlaca($row['placa']);
            $carros[] = $carro;
        }

        return $carros;
    }

    public function save(Carro $carro) {
        if ($carro->getId()) {
            $query = "UPDATE carros SET cliente_id = :cliente_id, marca = :marca, 
                      modelo = :modelo, ano = :ano, placa = :placa WHERE id = :id";
        } else {
            $query = "INSERT INTO carros (cliente_id, marca, modelo, ano, placa) 
                      VALUES (:cliente_id, :marca, :modelo, :ano, :placa)";
        }

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":cliente_id", $carro->getClienteId());
        $stmt->bindParam(":marca", $carro->getMarca());
        $stmt->bindParam(":modelo", $carro->getModelo());
        $stmt->bindParam(":ano", $carro->getAno());
        $stmt->bindParam(":placa", $carro->getPlaca());

        if ($carro->getId()) {
            $stmt->bindParam(":id", $carro->getId());
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM carros WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}