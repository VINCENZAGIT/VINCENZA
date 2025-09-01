<?php
// Autoload simples para carregar classes
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/app/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Iniciar sessão
session_start();

// Verificar se usuário está logado (para áreas protegidas)
function verificarAutenticacao() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: /sistema/login.php");
        exit();
    }
}

// Roteamento básico
$path = $_SERVER['REQUEST_URI'];
$path = str_replace('/sistema', '', $path);
$path = parse_url($path, PHP_URL_PATH);
$path_segments = explode('/', trim($path, '/'));

$resource = $path_segments[0] ?? 'dashboard';
$action = $path_segments[1] ?? 'index';
$id = $path_segments[2] ?? null;

// Rotas públicas
$public_routes = ['login', 'autenticar', 'logout'];

if (!in_array($resource, $public_routes)) {
    verificarAutenticacao();
}

// Roteamento
switch ($resource) {
    case 'clientes':
        $controller = new App\Controllers\ClienteController();
        break;
    case 'carros':
        $controller = new App\Controllers\CarroController();
        break;
    case 'usuarios':
        $controller = new App\Controllers\UsuarioController();
        break;
    case 'login':
        include 'app/views/auth/login.php';
        exit;
    case 'autenticar':
        // Lógica de autenticação
        break;
    case 'logout':
        session_destroy();
        header("Location: /sistema/login.php");
        exit;
    case 'dashboard':
    default:
        include 'app/views/dashboard.php';
        exit;
}

// Executar ação no controller
switch ($action) {
    case 'criar':
        $controller->create();
        break;
    case 'editar':
        if ($id) {
            $controller->show($id);
        } else {
            $controller->index();
        }
        break;
    case 'salvar':
        if ($id) {
            $controller->update($id);
        } else {
            $controller->store();
        }
        break;
    case 'excluir':
        if ($id) {
            $controller->delete($id);
        } else {
            $controller->index();
        }
        break;
    default:
        $controller->index();
        break;
}