<?php
namespace App\Controllers;

use App\Models\Usuario;
use App\Repositories\UsuarioRepository;

class UsuarioController {
    private $usuarioRepository;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function index() {
        $usuarios = $this->usuarioRepository->findAll();
        include '../app/views/usuarios/listar.php';
    }

    public function show($id) {
        $usuario = $this->usuarioRepository->findById($id);
        if ($usuario) {
            include '../app/views/usuarios/editar.php';
        } else {
            header("Location: /sistema/usuarios");
        }
    }

    public function create() {
        include '../app/views/usuarios/criar.php';
    }

    public function store() {
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        if ($this->usuarioRepository->save($usuario)) {
            header("Location: /sistema/usuarios");
        } else {
            echo "Erro ao salvar usuário.";
        }
    }

    public function update($id) {
        $usuario = $this->usuarioRepository->findById($id);
        if ($usuario) {
            $usuario->setNome($_POST['nome']);
            $usuario->setEmail($_POST['email']);
            
            if (!empty($_POST['senha'])) {
                $usuario->setSenha($_POST['senha']);
            }

            if ($this->usuarioRepository->save($usuario)) {
                header("Location: /sistema/usuarios");
            } else {
                echo "Erro ao atualizar usuário.";
            }
        } else {
            header("Location: /sistema/usuarios");
        }
    }

    public function delete($id) {
        if ($this->usuarioRepository->delete($id)) {
            header("Location: /sistema/usuarios");
        } else {
            echo "Erro ao excluir usuário.";
        }
    }
}