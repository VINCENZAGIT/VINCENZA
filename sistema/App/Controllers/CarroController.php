<?php
namespace App\Controllers;

use App\Models\Carro;
use App\Repositories\CarroRepository;
use App\Repositories\ClienteRepository;

class CarroController {
    private $carroRepository;
    private $clienteRepository;

    public function __construct() {
        $this->carroRepository = new CarroRepository();
        $this->clienteRepository = new ClienteRepository();
    }

    public function index() {
        $carros = $this->carroRepository->findAll();
        include '../app/views/carros/listar.php';
    }

    public function show($id) {
        $carro = $this->carroRepository->findById($id);
        $clientes = $this->clienteRepository->findAll();
        
        if ($carro) {
            include '../app/views/carros/editar.php';
        } else {
            header("Location: /sistema/carros");
        }
    }

    public function create() {
        $clientes = $this->clienteRepository->findAll();
        include '../app/views/carros/criar.php';
    }

    public function store() {
        $carro = new Carro();
        $carro->setClienteId($_POST['cliente_id']);
        $carro->setMarca($_POST['marca']);
        $carro->setModelo($_POST['modelo']);
        $carro->setAno($_POST['ano']);
        $carro->setPlaca($_POST['placa']);

        if ($this->carroRepository->save($carro)) {
            header("Location: /sistema/carros");
        } else {
            echo "Erro ao salvar carro.";
        }
    }

    public function update($id) {
        $carro = $this->carroRepository->findById($id);
        
        if ($carro) {
            $carro->setClienteId($_POST['cliente_id']);
            $carro->setMarca($_POST['marca']);
            $carro->setModelo($_POST['modelo']);
            $carro->setAno($_POST['ano']);
            $carro->setPlaca($_POST['placa']);

            if ($this->carroRepository->save($carro)) {
                header("Location: /sistema/carros");
            } else {
                echo "Erro ao atualizar carro.";
            }
        } else {
            header("Location: /sistema/carros");
        }
    }

    public function delete($id) {
        if ($this->carroRepository->delete($id)) {
            header("Location: /sistema/carros");
        } else {
            echo "Erro ao excluir carro.";
        }
    }

    public function porCliente($cliente_id) {
        $carros = $this->carroRepository->findByClienteId($cliente_id);
        $cliente = $this->clienteRepository->findById($cliente_id);
        
        if ($cliente) {
            include '../app/views/carros/por_cliente.php';
        } else {
            header("Location: /sistema/clientes");
        }
    }
}