<?php
namespace App\Controllers;

use App\Models\Cliente;
use App\Repositories\ClienteRepository;

class ClienteController {
    private $clienteRepository;

    public function __construct() {
        $this->clienteRepository = new ClienteRepository();
    }

    public function index() {
        $clientes = $this->clienteRepository->findAll();
        include '../app/views/clientes/listar.php';
    }

    public function show($id) {
        $cliente = $this->clienteRepository->findById($id);
        if ($cliente) {
            include '../app/views/clientes/editar.php';
        } else {
            header("Location: /sistema/clientes");
        }
    }

    public function create() {
        include '../app/views/clientes/criar.php';
    }

    public function store() {
        $cliente = new Cliente();
        $cliente->setNome($_POST['nome']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        if ($this->clienteRepository->save($cliente)) {
            header("Location: /sistema/clientes");
        } else {
            echo "Erro ao salvar cliente.";
        }
    }

    public function update($id) {
        $cliente = $this->clienteRepository->findById($id);
        if ($cliente) {
            $cliente->setNome($_POST['nome']);
            $cliente->setEmail($_POST['email']);
            $cliente->setTelefone($_POST['telefone']);
            $cliente->setEndereco($_POST['endereco']);

            if ($this->clienteRepository->save($cliente)) {
                header("Location: /sistema/clientes");
            } else {
                echo "Erro ao atualizar cliente.";
            }
        } else {
            header("Location: /sistema/clientes");
        }
    }

    public function delete($id) {
        if ($this->clienteRepository->delete($id)) {
            header("Location: /sistema/clientes");
        } else {
            echo "Erro ao excluir cliente.";
        }
    }
}